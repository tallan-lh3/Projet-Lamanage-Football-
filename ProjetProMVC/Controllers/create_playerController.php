<?php
session_start();
require '../models/Database.php';
require '../models/Player.php';
require '../models/Stats.php';
// creation d'un tableau d'erreur
$arrayError = [];
// regex
$regexName = "/^[a-z ,.'-]+$/i";

$player = new Player();
$playerStats = new Stats();
// initialisation de la variable comme nul pour ne pas avoir d'erreur sur la views de create admins

$createNotOk = '';
// si on clique sur ajouter un ajouter un joueur alor :

if (isset($_POST['addPlayer'])) {

//////////////////////////////////////////////////////position//////////////////////////////////////////////
    if (isset($_POST['position'])) {
        if (empty($_POST['position'])) {
            $arrayError['position'] = '<span class="text-danger">Renseigner une position</span>';
        }
        ;
    }
    ;

    if (empty($arrayError['position'])) {
        $position = htmlspecialchars($_POST['position']);
    } else {
        $position = '';
    }

// ////////////////////////////////////////////firstname////////////////////////////////////////////////////////////////
    if (isset($_POST['firstname'])) {
        if (!preg_match($regexName, $_POST['firstname'])) {
            $arrayError['firstname'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['firstname'])) {
            $arrayError['firstname'] = '<span class="text-danger">Renseigner le prénom du joueur</span>';
        }
        ;
    }
    ;

    if (empty($arrayError['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $firstname = '';
    }

// /////////////////////////////////////////////////lastname/////////////////////////////////////////////////////////
    if (isset($_POST['lastname'])) {
        if (!preg_match($regexName, $_POST['lastname'])) {
            $arrayError['lastname'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['lastname'])) {
            $arrayError['lastname'] = '<span class="text-danger">Renseigner le nom du joueur</span>';
        }
        ;
    }
    ;
    if (empty($arrayError['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        $lastname = '';
    }
////////////////////////////////////////////////Picture///////////////////////////////////////////////////////
    if (isset($_POST['picture'])) {
        if (empty($_POST['picture'])) {
            $arrayError['picture'] = '<span class="text-danger">Choisir un maillot</span>';
        }
        ;
    }
    ;
    if (empty($arrayError['picture'])) {
        $picture = htmlspecialchars($_POST['picture']);
    } else {
        $picture = '';
    }
// si le tableau d'erreur est vide alor :
    //Hydratation
    if (empty($arrayError)) {
        $player->setFirstname($firstname);
        $player->setLastname($lastname);
        $player->setPicture($picture);
        $player->setPosition($position);
        $player->addPlayer();
        // Grace a la recuperation du last id , quand un joueur est cree toutes ses stats sont ajoutés à 0
        $LastPlayerId = $player->findLastId();
        $playerStats->setUsers_id($LastPlayerId);
        $playerStats->createStats();

// on cree une variable avec un toast de confirmation d'ajout du joueur envoyer sur la page view  en cas de reussite
        $createOk = '<div class="alert text-center alert-success col-5 mx-auto alert-dismissible fade show" role="alert">
        <strong>Parfait!</strong> Le joueur a bien été ajouté.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

        //   Redirection en 2sec
        echo "<meta http-equiv=\"refresh\" content=\"3;url=equipe_compo.php\"/>";

    } else {
        // idem pour en cas d'erreur
        $createNotOk = '<div class="alert text-center alert-danger col-5 mx-auto alert-dismissible fade show" role="alert">
        <strong>Oups!</strong> Le joueur n\'a pas été ajouté.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        return $createNotOk;
    }
}
