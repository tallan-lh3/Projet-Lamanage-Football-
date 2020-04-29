<?php
class Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=bdd_lamanage;charset=utf8', 'root', '');
    }
}
