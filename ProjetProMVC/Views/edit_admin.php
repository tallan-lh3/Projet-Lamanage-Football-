<?php
require '../Controllers/edit_adminController.php';
require '../public/header.php';
?>

<body class="bg-admin">
    <?php require '../public/navbar.php'?>
    <p class="text-white rounded col-8 mx-auto mt-4 mb-1 h1 text-center bg-dark mb-5">Editer les
        informations de l'entraineur</p>
    <!-- Toast erreur / valide modification -->
    <?=isset($editOk) ? $editOk : $editNotOk?>
    <a href="admins_liste.php">
        <!-- button de retour -->
        <button class="badge badge-dark border rounded-pill border-dark float-left"><i
                class=" text-white fas fa-arrow-circle-left fa-2x"></i></button>
    </a>

    <div class="container text-white">
        <div class="row">
            <div class="col-xl-5 col-md-5 col-sm-12 mx-auto m-1">
                <form action="" method="POST">


                    <div class="form-group edit-player-bg rounded p-3">
                        <label class="control-label col-12" for="fname"> <span><i class="fas fa-user"></i></span>
                            Prénom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fname" name="firstname"
                                value="<?=isset($infoAdmin[0]['admins_firstname']) ? $infoAdmin[0]['admins_firstname'] : ''?>">
                            <small><?=isset($arrayError['firstname']) ? $arrayError['firstname'] : ''?></small>
                        </div>
                    </div>
                    <div class="form-group edit-player-bg rounded p-3">
                        <label class="control-label col-12" for="lname"><i class="fas fa-user"></i> Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lname" name="lastname"
                                value="<?=isset($infoAdmin[0]['admins_lastname']) ? $infoAdmin[0]['admins_lastname'] : ''?>">
                            <small><?=isset($arrayError['lastname']) ? $arrayError['lastname'] : ''?></small>
                        </div>
                    </div>
                    <div class="form-group edit-player-bg rounded p-3">
                        <label class="control-label col-12" for="mail"><i class="fas fa-envelope"></i> Adresse
                            Email</label>
                        <div class="col-sm-10">
                            <input type="mail" class="form-control" id="mail" name="mail"
                                value="<?=isset($infoAdmin[0]['admins_mail']) ? $infoAdmin[0]['admins_mail'] : ''?>">
                            <small><?=isset($arrayError['mail']) ? $arrayError['mail'] : ''?></small>
                        </div>
                    </div>
            </div>
            <div class="col-xl-5 col-md-5 col-sm-12 mx-auto m-1">
                <div class="form-group edit-player-bg rounded p-3">
                    <label class="control-label col-12" for="oldpwd"><i class="fas fa-key"></i> Ancien mot de
                        passe</label>
                    <div class="col-sm-10 pwdView">

                        <input id="oldpwd" type='password' class="form-control" name="oldpwd" data-container="body"
                            data-toggle="popover" data-placement="right" placeholder="********" />
                        <small><?=isset($arrayError['oldpwd']) ? $arrayError['oldpwd'] : ''?></small>
                    </div>
                </div>
                <div class="form-group edit-player-bg rounded p-3">
                    <label class="control-label col-12" for="PwdPopover"><i class="fas fa-lock"></i> Nouveau mot de
                        passe</label>
                    <div class="col-sm-10 pwdView">

                        <input id="PwdPopover" type='password' class="form-control" name="pwd" data-container="body"
                            data-toggle="popover" data-placement="right" placeholder="********" />

                        <small><?=isset($arrayError['pwd']) ? $arrayError['pwd'] : ''?></small>
                    </div>
                </div>
                <div class="form-group edit-player-bg rounded p-3">
                    <label class="control-label col-12" for="pwd"><i class="fas fa-lock"></i> Confirmation du
                        nouveau mot de passe</label>
                    <div class="col-sm-10 pwdView">

                        <input id="pwd" type='password' class="form-control" name="confirmpwd" data-container="body"
                            data-toggle="popover" data-placement="right" placeholder="********" />
                        <label for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <small class="text-warning">Afficher le mot de passe</small>
                        </label>
                        <div>
                            <small><?=isset($arrayError['pwd']) ? $arrayError['pwd'] : ''?></small>
                        </div>
                    </div>
                </div>
                <button class="mt-2 btn btn-success rounded border border-success col-12" value="<?=$id?>"
                    name="editAdmin">Modifier le profil</button>
            </div>

            <!-- modif stats -->
            </form>
        </div>
    </div>


    <!-- test -->

    <?php require '../public/script-pwd.php'?>
    <?php require '../public/footer.php'?>
    <?php require '../public/cdn.php'?>
</body>

</html>