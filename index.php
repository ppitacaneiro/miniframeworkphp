<?php
session_start();

require 'core/Config.php';

$controller = DEFAULT_CONTROLLER;
if (isset($_GET['controller']))
{
    $controller = $_GET['controller'];
}

$controllerObject = getController($controller);
dispath($controllerObject);

function dispath($controllerObject)
{
    if (isset($_GET['action']) && method_exists($controllerObject,$_GET['action'])) 
    {
        getAction($controllerObject,$_GET['action']);
    }
    else
    {
        getAction($controllerObject,DEFAULT_ACTION);
    }
}

function getAction($controllerObject,$action)
{
    $controllerObject->$action();
}

function getController($controller)
{
    $controller = ucwords($controller) . 'Controller';
    $fileController = PATH_CONTROLLERS . '/' . $controller . '.php';

    if (!is_file($fileController))
    {
        $fileController = PATH_CONTROLLERS . '/' . DEFAULT_CONTROLLER . '.php';
        $controller = DEFAULT_CONTROLLER;
    }

    require_once($fileController);
    $controllerObject = new $controller();
    
    return $controllerObject;
}

?>