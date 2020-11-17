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
            'urlSaveUser' => View::generateUrl('usuario','save')
        );

        $this->render('create',$dataToRender);
    }
    
    public function save()
    {
        $usuario = new Usuario();
        $usuario->user = $_POST['inputNombre'];
        $usuario->email = $_POST['inputEmail'];
        $usuario->password = $_POST['inputPassword'];

        $dataToValidate = array
        (
            'email' => $usuario->email,
            'required' => $usuario->user,
            'password' => $usuario->password
        );

        $errors = "";
        $validator = new Validator();
        $validator->validate($dataToValidate);

        if ($validator->isValid())
        {
            $data = array
            (
                'user' => $usuario->user,
                'password' => password_hash($usuario->password,PASSWORD_DEFAULT),
                'email' => $usuario->email
            );
    
            $usuario->insert($data);
        }
        else
        {
            $errors = $validator->printErrors();
        }

        $dataToRender = array
        (
            'errors' => $errors,
            'urlSaveUser' => View::generateUrl('usuario','save')
        );

        $this->render('create',$dataToRender);
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