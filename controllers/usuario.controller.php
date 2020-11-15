<?php

require 'core/Controller.php';
require 'models/Usuario.php';
require 'core/interfaces/Crud.php';

class UsuarioController extends Controller implements Crud
{
    const FOLDER_VIEW = 'usuario';

    public function __construct()
    {
        parent::__construct(self::FOLDER_VIEW);
    }

    public function store() {

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

    public function update() {

    }

    public function delete() {

    }

}

?>