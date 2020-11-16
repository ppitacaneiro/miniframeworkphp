<?php

interface Crud
{
    public function index();
    public function create();
    public function save();
    public function edit();
    public function update();
    public function delete();
}

?>