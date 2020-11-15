<?php

abstract class Controller 
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index() 
    {
        require PATH_VIEWS . '/' . $this->view . '/index.php';
    }

    public function create()
    {
        require PATH_VIEWS . '/' . $this->view . '/create.php';
    }

    public function edit()
    {
        require PATH_VIEWS . '/' . $this->view . '/edit.php';
    }
}

?>