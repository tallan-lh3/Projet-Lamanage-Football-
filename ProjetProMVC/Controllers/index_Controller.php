<?php
session_start();
require 'models/Database.php';
require 'models/Admin.php';
// creation d'un tableau d'erreur
$arrayError = [];
$admin = new Admin();

$object_admin = new Admin();
// si on clique sur connexion et que mail et pwd on été saisie alor :
if (isset($_POST['connexion']) && (isset($_POST['mail'])) && (isset($_POST['pwd']))) {
    if (!empty($_POST['mail']) && (!empty($_POST['pwd']))) {
        //Vérification email method
        $emailExist = $object_admin->emailExist($_POST['mail']);
        if (!$emailExist) {
            $arrayError['NoEmail'] = '<span class="text-danger">Adresse email non existante</span>';
        } else {
            $arrayInfosAdmin = $object_admin->createSession($_POST['mail']);
            if (password_verify($_POST['pwd'], $arrayInfosAdmin['admins_pwd'])) {
                $_SESSION['infosAdmin'] = $arrayInfosAdmin;
                header('location: views/equipe_actu.php');
            } else {
                $arrayError['ErrPwd'] = '<span class="text-danger">Erreur dans le mot de passe</span>';

            }
        }
    } else {
        $arrayError['ErrMail-pwd'] = '<span class="text-danger">Erreur de mot de passe ou/et d\'adresse email</span>';

    }

}
