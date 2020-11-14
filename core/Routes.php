<?php
require 'controllers/usuario.controller.php';

$controllers = array
(
    'usuario' => 
    [
        'index',
        'login',
        'register',
        'update',
        'delete'
    ]
);

if (array_key_exists($controller,$controllers)) 
{
    if (in_array($action,$controllers[$controller]))
    {
        call($controller,$action);
    }
}

function call($controller,$action) 
{
    require_once('controllers/' . $controller . '.controller.php');
    switch ($controller)
    {
        case 'usuario' :
            $controller = new UsuarioController();
        break;
    }
    $controller->{$action}();
}

?>