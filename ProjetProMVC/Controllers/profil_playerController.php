<?php
session_start();
require '../models/Database.php';
require '../models/Player.php';

$player = new Player();

$idPlayer = $_GET['id'];
// Je set un cookie pour ne pas avoir d'erreur si on refraiche l'edit player
setcookie('id', $idPlayer, time() + 3600, '/');
$player->setId($idPlayer);
$infoPlayer = $player->infoPlayer();

