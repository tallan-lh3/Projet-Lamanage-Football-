<?php
session_start();
require '../models/Database.php';
require '../models/Player.php';
require '../models/Stats.php';
// creation d'un tableau d'erreur
$arrayError = [];
// regex
$regexName = "/^[a-z ,.'-]+$/i";
$editNotOk = '';
// $regexMail = " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";
// $regexPwd = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";

$player = new Player();
$stats = new Stats();

$id = isset($_POST['idPlayer']) ? $_POST['idPlayer'] : $_COOKIE['id'];

// Je set l'attribut id de patient avec la valeur $id.
$player->setId((int) $id);
// je recupère l'id via le $_POST['idPlayer'] de la page profil player et je créé une variable $id

if (isset($_POST['editPlayer'])) {
    $picture = isset($_POST['picture']) ? $_POST['picture'] : '';
    // ////////////////////////////////////////////firstname////////////////////////////////////////////////////////////////
    if (isset($_POST['firstname'])) {
        if (!preg_match($regexName, $_POST['firstname'])) {
            $arrayError['firstname'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['firstname'])) {
            $arrayError['firstname'] = '<span class="text-danger">Renseigner votre prénom</span>';
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
            $arrayError['lastname'] = '<span class="text-danger">Renseigner votre nom</span>';
        }
        ;
    }
    ;
    if (empty($arrayError['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        $lastname = '';
    }

///////////////////////////POSITION////////////////////////////////////////////////////////////////

    $position = isset($_POST['position']) ? $_POST['position'] : '';

    // /////////////////////////////////////////////////game/////////////////////////////////////////
    if (isset($_POST['game'])) {
        $game = htmlspecialchars($_POST['game']);
    }
    ;

    // /////////////////////////////////////////////////Goal/////////////////////////////////////////////////////////
    if (isset($_POST['goal'])) {
        $goal = htmlspecialchars($_POST['goal']);
    }
    ;

    // /////////////////////////////////////////////////Assist/////////////////////////////////////////////////////////
    if (isset($_POST['assist'])) {
        $assist = htmlspecialchars($_POST['assist']);
    }
    ;
//  si le tableau d'erreur est vide alor :
    if (isset($_POST['editPlayer']) && empty($arrayError)) {

        // edit les players
        $player->setFirstname($firstname);
        $player->setLastname($lastname);
        $player->setPosition((int) $position);
        $player->setPicture($picture);
        $player->setId((int) $id);
        $player->editPlayer();
        // Edit les stats
        $stats->setStats_game((int) $game);
        $stats->setStats_goal((int) $goal);
        $stats->setStats_assist((int) $assist);
        $stats->setUsers_id((int) $id);
        $stats->editStats();

        // on cree une variable avec un toast de confirmation d'ajout du joueur envoyer sur la page view  en cas de reussite
        $editOk = '<div class="alert text-center alert-success col-5 mx-auto alert-dismissible fade show mt-5" role="alert">
      <strong>Parfait!</strong> Le joueur a bien été modifié.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';

        //   Redirection en 2sec
        echo "<meta http-equiv=\"refresh\" content=\"3;url=equipe_compo.php\"/>";

    } else {
        // idem pour en cas d'erreur
        $editNotOk = '<div class="alert text-center alert-danger col-5 mx-auto alert-dismissible fade show mt-5" role="alert">
      <strong>Oups!</strong> Le joueur n\'a pas été modifié.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
        return $editNotOk;
    }
}

// Je crée un tableau $infoPlayer via la méthode infoPlayer()
$infoPlayer = $player->infoPlayer();
