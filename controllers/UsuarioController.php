<?php

require 'core/Controller.php';
require 'core/interfaces/Crud.php';
require 'core/helpers/Mail.php';

class UsuarioController extends Controller implements Crud
{
    const FOLDER_VIEW = 'usuario';

    public function __construct()
    {
        parent::__construct(self::FOLDER_VIEW);
    }

    public function index()
    {
        $dataToRenderInView = array
        (
            'urlCreateUser' => View::generateUrl('usuario','create')
        );

        $this->render('index',$dataToRenderInView);
    }
    
    public function create()
    {
        $dataToRender = array
        (
            'errors' => '',
            'email' => View::setValueInputText('inputEmail'),
            'usuario' => View::setValueInputText('inputNombre'),
            'password1' => View::setValueInputText('inputPassword'),
            'password2' => View::setValueInputText('inputPassword2'),
            'urlSaveUser' => View::generateUrl('usuario','save')
        );

        $this->render('create',$dataToRender);
    }
    
    public function save()
    {
        $this->preventRefresh('usuario','create');

        $usuario = new Usuario();
        $validator = new Validator();
        $errors = array();
        $successMessage = "";

        $usuario->user = View::sanitize($_POST['inputNombre']);
        $usuario->email = View::sanitize($_POST['inputEmail']);
        $usuario->password = View::sanitize($_POST['inputPassword']);
        $passwordRepeat = View::sanitize($_POST['inputPassword2']);
        
        $dataToValidate = array(
            'email' => $usuario->email,
            'required' => $usuario->user,
            'password' => $usuario->password
        );
        $validator->validate($dataToValidate);

        if ($validator->isValid()) 
        {
            if (count($usuario->getByField('user',$usuario->user)) > 0)
            {
                array_push($errors,USER_EXISTS); 
            }

            if (count($usuario->getByField('email',$usuario->email)) > 0)
            {
                array_push($errors,EMAIL_EXISTS);
            }

            if ($passwordRepeat != $usuario->password)
            {
                array_push($errors,PASSWORD_NOT_EQUALS);
            }
        } 
        else 
        {
            $errors = $validator->getErrors(); 
        }

        if (empty($errors)) 
        {
            $token = $this->generateToken();

            $data = array(
                'user' => $usuario->user,
                'password' => password_hash($usuario->password, PASSWORD_DEFAULT),
                'email' => $usuario->email,
                'activated_token' => $token
            );

            if ($usuario->insert($data) > 0 && $this->sendConfirmationActivateUserAccount($usuario,$token)) 
            {
                $successMessage = USER_ACCOUNT_CREATED;
            }
        }

        $dataToRender = array(
            'errors' => $errors,
            'email' => View::setValueInputText('inputEmail'),
            'usuario' => View::setValueInputText('inputNombre'),
            'password1' => View::setValueInputText('inputPassword'),
            'password2' => View::setValueInputText('inputPassword2'),
            'urlSaveUser' => View::generateUrl('usuario', 'save'),
            'success' => $successMessage
        );

        $this->render('create', $dataToRender);
    }
    
    public function edit()
    {

    }

    public function update()
    {

    }
    
    public function delete()
    {

    }

    public function activate()
    {
        if (isset($_GET['token']) && !empty($_GET['token']))
        {
            $usuario = new Usuario();
            $row = $usuario->getByField('activated_token',$_GET['token']);
            $usuario->id = $row[0]->id;
            $usuario->activated_token = $row[0]->activated_token;

            if ($_GET['token'] == $usuario->activated_token)
            {
                $data = array
                (
                    'id' => $usuario->id,
                    'activated' => 1
                );

                if ($usuario->update($data))
                {
                    $data = array(
                        'message' => ACCOUNT_VERIFICATION_SUCCESS
                    );
            
                    $this->render('index', $data);
                }
            }
        }
    }

    private function sendConfirmationActivateUserAccount($usuario,$token)
    {
        $activationLink = URL_DOMAIN . View::generateUrl('usuario','activate') . "&token=" . $token;
        
        $body = "
            <p>Hola " . $usuario->user . "</p>
            <p>Pulsa <a href=\"$activationLink\">aquí</a> para verificar tu cuenta de correo.</p>
        ";

        $mail = new Mail($usuario->email,SUBJECT_ACCOUNT_EMAIL_VERIFICATION,$body);
        return $mail->send();
    }

    private function generateToken()
    {
        return bin2hex(openssl_random_pseudo_bytes(16));
    }
}

?>