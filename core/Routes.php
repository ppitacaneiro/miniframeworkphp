<?php
require 'controllers/usuario.controller.php';
require 'core/Config.php';

$controllers = array
(
    'usuario' => 
    [
        'index',
        'create',
        'save'
    ]
);

if (array_key_exists($controller,$controllers)) 
{
    if (in_array($action,$controllers[$controller]))
    {
        callController($controller,$action);
    }
    else
    {
        die(ERROR_ACTIONS . $action);    
    }
}
else
{
    die(ERROR_CONTROLLER . $controller);
}

function callController($controller,$action) 
{
    require_once(PATH_CONTROLLERS . '/' . $controller . '.controller.php');
    $controllerClassName = ucwords($controller) . 'Controller';
    $controller = new $controllerClassName();
    $controller->{$action}();
}

?>