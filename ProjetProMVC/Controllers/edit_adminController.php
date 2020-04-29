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
$editNotOk = '';

$admin = new Admin();

$id = isset($_POST['idAdmin']) ? $_POST['idAdmin'] : $_COOKIE['id'];
// Je set l'attribut id des admins avec la valeur $id.
$admin->setId((int) $id);
// je recupère l'id via le $_POST['idAdmin'] de la page profil player et je créé une variable $id

// Je crée un tableau $infoAdmin via la méthode infoAdmin()
$infoAdmin = $admin->infoAdmin();

// si on clique sur modifier alor :
if (isset($_POST['editAdmin'])) {

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
    ///////////////////////////////////////////////// ANCIEN PWD/////////////////////////////////////////////////
    if (isset($_POST['oldpwd'])) {
        if (empty($_POST['oldpwd'])) {
            $arrayError['oldpwd'] = '<span class="error">Renseigner votre mot de passe</span>';
        }
        ;
        if (password_verify($_POST['oldpwd'], $infoAdmin[0]['admins_pwd'])) {

        } else {
            $arrayError['oldpwd'] = '<span class="text-danger">Le mot de passe saisi ne correspont pas avec votre ancien mot de passe</span>';
        }
        ;

    }
    ;
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
    } else {
        $pwd = '';
    }
    /////////////////////////////////////////////////////// CONFIRM PWD/////////////////////////////////////////////
    if (isset($_POST['pwdconfirm'])) {
        if (empty($_POST['pwdconfirm'])) {
            $arrayError['pwdconfirm'] = '<span class="error">Confirmer votre mot de passe</span>';
        }
        ;
        if (($_POST['pwdconfirm']) !== ($_POST['pwd'])) {
            $arrayError['pwdconfirm'] = '<span class="error"> le mot de passe ne correspond pas</span>';
        }
        ;
    }
    ;
//  si le tableau d'erreur est vide alor :
    if (isset($_POST['editAdmin']) && empty($arrayError)) {
        // edit les Admins
        $admin->setFirstname($firstname);
        $admin->setLastname($lastname);
        $admin->setMail($mail);
        $admin->setPwd($pwd);
        $admin->editAdmin();
// on cree une variable avec un toast de confirmation d'ajout du joueur envoyer sur la page view  en cas de reussite
        $editOk = '<div class="alert text-center alert-success col-5 mx-auto alert-dismissible fade show mt-5" role="alert">
<strong>Parfait!</strong> L\'entraineur a bien été modifié.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';

//   Redirection en 2sec
        echo "<meta http-equiv=\"refresh\" content=\"3;url=admins_liste.php\"/>";

    } else {
// idem pour en cas d'erreur
        $editNotOk = '<div class="alert text-center alert-danger col-5 mx-auto alert-dismissible fade show mt-5" role="alert">
<strong>Oups!</strong> L\'entraineur n\'a pas été modifié.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
        return $editNotOk;
    }

}
