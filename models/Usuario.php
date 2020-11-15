<?php

require 'core/Model.php';

class Usuario extends Model
{
    private $id;
    private $user;
    private $password;
    private $email;
    private $registerDate;
    
    const TABLE = 'users';
    const PRIMARY_KEY = 'id';
    public $pdo;
    
    public function __construct()
    {
        parent::__construct(self::TABLE,self::PRIMARY_KEY);
        $this->pdo = parent::connection();
    }
}

?>