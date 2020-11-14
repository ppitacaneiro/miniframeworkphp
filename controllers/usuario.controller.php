<?php

require 'core/Controller.php';

class UsuarioController extends Controller
{
    const FOLDER_VIEW = 'usuario';

    public function __construct()
    {
        parent::__construct(self::FOLDER_VIEW);
    }

}

?>