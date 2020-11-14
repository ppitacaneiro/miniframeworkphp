<?php

require 'core/Model.php';

class Animal extends Model
{
    private $id;
    private $name;
    private $specie;
    private $breed;
    private $gender;
    private $color;
    private $age;
    
    const TABLE = 'animal';
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
}

?>