<?php
session_start();
require '../models/Database.php';
require '../models/Admin.php';

$admin = new Admin();

$idAdmin = $_GET['id'];
// Je set un cookie pour ne pas avoir d'erreur si on refraiche l'edit admin
setcookie('id', $idAdmin, time() + 3600, '/');
$admin->setId($idAdmin);
$infoAdmin = $admin->infoAdmin();
