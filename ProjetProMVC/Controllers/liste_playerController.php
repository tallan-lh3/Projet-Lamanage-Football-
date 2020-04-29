<?php
session_start();
require '../models/Database.php';
require '../models/Player.php';

$newPlayer = new Player();
if (isset($_POST['DeletePlayer'])) {
    // recois l'id du bouton placer dans un form avec la value de l'id du joueur
    $newPlayer->setId(htmlspecialchars($_POST['DeletePlayer']));
    $newPlayer->DeletePlayer();
}

// method pour avoir l'info du joueur selon sont id
$AllPlayer = $newPlayer->listPlayer();
// liste des attaquants
$AttaquantList = $newPlayer->listAttaquant();
// liste des milieux
$MilieuList = $newPlayer->listMilieu();
// liste des defenseurs
$DefenseurList = $newPlayer->listDefenseur();
// liste des gardien de buts
$GoalList = $newPlayer->listGoal();
// liste des remplaçantss
$RemplacantList = $newPlayer->listRemplacant();

// liste des meuilleur buteurs
$BestGoalPlayer = $newPlayer->BestGoal();
// liste des meuilleur passeurs
$BestAssistPlayer = $newPlayer->BestAssist();
