<?php

require 'core/Model.php';

class Usuario extends Model
{
    private $id;
    private $user;
    private $password;
    private $email;
    private $registerDate;
    private $activated;
    private $activatedToken;
    
    const TABLE = 'users';
    const PRIMARY_KEY = 'id';
    public $pdo;
    
    public function __construct()
    {
        parent::__construct(self::TABLE,self::PRIMARY_KEY);
        $this->pdo = parent::connection();
    }

    public function __set($name,$value) 
    {
        $this->$name = $value;
    }
    
    public function __get($name) 
    {
        return $this->$name;
    }

    public function setSesssionVar($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    public function getSessionVar($key)
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        return false;
    }

    public function isUserAuthenticated()
    {
        return $this->getSessionVar('authenticated');
    }
}

?>