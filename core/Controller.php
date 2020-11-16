<?php
require 'core/helpers/View.php';

abstract class Controller 
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;

        foreach(glob(PATH_MODELS . "/*.php") as $file)
        {
            require_once $file;
        }
    }

    public function render($file,$data = array())
    {
        foreach ($data as $key => $value) 
        {
            ${$key} = $value;
        }

        require PATH_VIEWS . '/' . $this->view . '/' . $file . '.php';
    }

    public function redirect($controller,$action)
    {
        header("Location:index.php?controller=" . $controller . "&action=" . $action);
    }
}

?>