<?php

require './Connection.php';

abstract class Crud extends Connection 
{    
    private $table;
    private $fields = array();
    public $pdo;

    public function __construct($table) 
    {
        $this->table = (string) $table;
        $this->pdo = parent::conexion();
        $this->fields = $this->getFields();
    }

    public function getFields()
    {
        $fields = array();
        
        try
        {
            $sql = 
            "
                SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_NAME = '$this->table'
            ";

            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll(PDO::FETCH_OBJ);
            
            foreach($rows as $row) 
            {
                array_push($fields,$row->COLUMN_NAME);
            }

            return $fields;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM $this->table");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function getById($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=$id");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            $stm = $this->pdo->prepare("DELETE FROM $this->table WHERE id=?");
            $stm->execute(array($id));
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function insert($list) 
    {
        $fieldList = '';
        $valuesList = '';

        foreach($list as $field => $value) 
        {
            if (in_array($field,$this->fields))
            {
                // meter id en constante de configuracion
                if ($field != 'id')
                {
                    $fieldList .= $field . ',';
                    $valuesList .=  "'" . $value . "',";
                }
            }
        }
        
        $fieldList = rtrim($fieldList,',');
        $valuesList = rtrim($valuesList,',');

        $sql = "INSERT INTO $this->table ($fieldList) VALUES ($valuesList)";

        echo '<pre>';
        echo $sql; 
        echo '</pre>';

    }

    abstract function create();
    abstract function update();
}


?>