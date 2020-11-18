<?php

require 'core/Controller.php';
require 'core/interfaces/Crud.php';

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

            if (empty($errors))
            {
                $data = array(
                    'user' => $usuario->user,
                    'password' => password_hash($usuario->password, PASSWORD_DEFAULT),
                    'email' => $usuario->email
                );
                $usuario->insert($data);
            }
        } 
        else 
        {
            $errors = array_merge($errors,$validator->getErrors()); 
        }

        $dataToRender = array(
            'errors' => $errors,
            'email' => View::setValueInputText('inputEmail'),
            'usuario' => View::setValueInputText('inputNombre'),
            'password1' => View::setValueInputText('inputPassword'),
            'password2' => View::setValueInputText('inputPassword2'),
            'urlSaveUser' => View::generateUrl('usuario', 'save')
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

}

?>