<?php
require 'core/helpers/View.php';
require 'core/helpers/Validator.php';

abstract class Controller 
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
        $this->loadModels();
        $this->loadStrings();
    }

    private function loadStrings()
    {
        if (file_exists(PATH_VIEWS . PATH_HTTP_SEPARATOR . $this->view . PATH_HTTP_SEPARATOR . DEFAULT_STRINGS_FILE))
        {
            require_once PATH_VIEWS . PATH_HTTP_SEPARATOR . $this->view . PATH_HTTP_SEPARATOR . DEFAULT_STRINGS_FILE;
        }
    }

    private function loadModels()
    {
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

        require PATH_VIEWS . PATH_HTTP_SEPARATOR . $this->view . PATH_HTTP_SEPARATOR . $file . '.php';
    }

    public function redirect($controller,$action)
    {
        header("Location:index.php?controller=" . $controller . "&action=" . $action);
    }

    public function preventRefresh($controller,$action)
    {
        if (isset($_POST) && empty($_POST))
        {
            $this->redirect($controller,$action);
        }
    }
}

?>