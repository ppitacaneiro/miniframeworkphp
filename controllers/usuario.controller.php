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

    public function store() {
        echo 'store';
    }

    public function update() {

    }

    public function delete() {

    }

}

?>