<?php
require_once './animal.php';

$animal = new Animal();

/*
$animals = $animal->getAll();

echo '<pre>';
var_dump($animals);
echo '</pre>';

$animal1 = $animal->getById(1);
echo '<pre>';
var_dump($animal1);
echo '</pre>';

$animal->name = 'devi';
$animal->specie = 'perro';
$animal->breed = 'palleiro';
$animal->gender = 'femenino';
$animal->color = 'marron';
$animal->age = '1';
// $animal->create();

$fields = $animal->getFields();
echo '<pre>';
var_dump($fields);
echo '</pre>';
*/

$list = array
(
    'id' => '1',
    'name' => 'Debi',
    'specie' => 'Perro',
    'breed' => 'Palleiro',
    'gender' => 'Hembra',
    'color' => 'Marrón',
    'age' => '1'
);


$animal->insert($list);

?>