<?php
session_start();
require '../models/Database.php';
require '../models/Admin.php';
// creation d'un tableau d'erreur
$arrayError = [];
// regex
$regexName = "/^[a-z ,.'-]+$/i";
$regexMail = " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";
$regexPwd = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
// initialisation de la variable comme nul pour ne pas avoir d'erreur sur la views de create admins
$createNotOk = '';

$admin = new Admin();

// si on clique sur ajouter un entraineur alor :
if (isset($_POST['addAdmin'])) {
// ////////////////////////////////////////////firstname////////////////////////////////////////////////////////////////
    if (isset($_POST['firstname'])) {
        if (!preg_match($regexName, $_POST['firstname'])) {
            $arrayError['firstname'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['firstname'])) {
            $arrayError['firstname'] = '<span class="text-danger">Renseigner un prénom</span>';
        }
        ;
    }
    ;

    if (empty($arrayError['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $firstname = '';
    }

// ////////////////////////////////////////////lastname////////////////////////////////////////////////////////////////
    if (isset($_POST['lastname'])) {
        if (!preg_match($regexName, $_POST['lastname'])) {
            $arrayError['lastname'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['lastname'])) {
            $arrayError['lastname'] = '<span class="text-danger">Renseigner un nom</span>';
        }
        ;
    }
    ;

    if (empty($arrayError['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        $lastname = '';
    }
// ////////////////////////////////////////////mail////////////////////////////////////////////////////////////////
    if (isset($_POST['mail'])) {
        if (!preg_match($regexMail, $_POST['mail'])) {
            $arrayError['mail'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['mail'])) {
            $arrayError['mail'] = '<span class="text-danger">Renseigner une adresse email</span>';
        }
        ;
    }
    ;

    if (empty($arrayError['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $mail = '';
    }

    // ////////////////////////////////////////////Pwd////////////////////////////////////////////////////////////////
    if (isset($_POST['pwd'])) {
        if (!preg_match($regexPwd, $_POST['pwd'])) {
            $arrayError['pwd'] = '<span class="text-danger">Respecter le format</span>';
        }
        ;
        if (empty($_POST['pwd'])) {
            $arrayError['pwd'] = '<span class="text-danger">Renseigner un mot de passe</span>';
        }
        ;
    }
    ;

    if (empty($arrayError['pwd'])) {
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        // $pwd = $_POST['pwd'];

    } else {
        $pwd = '';
    }

// si le tableau d'erreur est vide alor :
    if (empty($arrayError)) {
//Hydratation
        $admin->setFirstname($firstname);
        $admin->setLastname($lastname);
        $admin->setMail($mail);
        $admin->setPwd($pwd);
        $admin->createAdmin();

// toast en cas de validation de l'ajout
        $createOk = '<div class="alert text-center alert-success col-5 mx-auto alert-dismissible fade show" role="alert">
        <strong>Parfait!</strong> L\'entraineur a bien été ajouté.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

        //   Redirection en 2sec
        echo "<meta http-equiv=\"refresh\" content=\"3;url=admins_liste.php\"/>";

    } else {
        // toast en cas d'erreur de l'ajout
        $createNotOk = '<div class="alert text-center alert-danger col-5 mx-auto alert-dismissible fade show" role="alert">
        <strong>Oups!</strong> L\'entraineur n\'a pas été ajouté.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        return $createNotOk;
    }

}
