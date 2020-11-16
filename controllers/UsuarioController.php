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
        $dataToRenderInView = array
        (
            'urlSaveUser' => View::generateUrl('usuario','save')
        );

        $this->render('create',$dataToRenderInView);
    }
    
    public function save()
    {
        $usuario = new Usuario();
        $usuario->user = $_POST['inputNombre'];
        $usuario->email = $_POST['inputEmail'];
        $usuario->password = $_POST['inputPassword'];

        echo Validator::validate($usuario->email,'email','email no valido');
        die();

        $data = array
        (
            'user' => $usuario->user,
            'password' => password_hash($usuario->password,PASSWORD_DEFAULT),
            'email' => $usuario->email
        );

        $usuario->insert($data);
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