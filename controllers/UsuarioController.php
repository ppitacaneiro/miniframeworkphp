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
        $this->render('create');
    }
    
    public function save()
    {
        $usuario = new Usuario();
        $usuario->user = $_POST['inputNombre'];

        $data = array
        (
            'user' => $usuario->user,
            'password' => password_hash($_POST['inputPassword'],PASSWORD_DEFAULT),
            'email' => $_POST['inputEmail']
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