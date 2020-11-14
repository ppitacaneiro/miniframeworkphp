<?php

class Controller 
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index() 
    {
        require 'views/' . $this->view . '/index.php';
    }
}

?>