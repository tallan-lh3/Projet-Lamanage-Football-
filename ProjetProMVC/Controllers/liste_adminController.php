<?php
session_start();
require '../models/Database.php';
require '../models/Admin.php';

$admin = new Admin();
if (isset($_POST['DeleteAdmin'])) {
    // recois l'id du bouton placer dans un form avec la value de l'id de l'admin (views)
    $admin->setId(htmlspecialchars($_POST['DeleteAdmin']));
    $admin->DeleteAdmin();

}
$infoAdmin = $admin->listAdmin();
