<?php 
require 'public/header.php';
require 'Controllers/index_Controller.php';
?>


<body class="login">

  <!----------------------------- connexion -------------------------- -->
  <button class="btn btn-warning border border-warning text-white rounded" id="connexion">Connexion <br> <small
      class="text-dark">entraineur</small> </button>
  <a href="views/equipe_actu.php">
    <button class="btn btn-warning border border-warning text-white rounded float-right" id="accessPlayer">Accéder au
      site<br> <small class="text-dark">Joueur</small> </button>
  </a>
  <p class="text-center text-dark h1">Lamanage</p>
  <div id="connexionHide" class="text-white col-4 mx-auto bg-login rounded">
    <form action="index.php" method="POST" class="text-center">
      <div class="form-group">
        <label for="mail">Adresse Email</label>
        <input name="mail" type="email" class="form-control bg-dark text-white" id="mail" aria-describedby="emailHelp">
        <small><?= isset($arrayError['ErrMail-pwd']) ? $arrayError['ErrMail-pwd'] : '' ?></small>
        <small><?= isset($arrayError['NoEmail']) ? $arrayError['NoEmail'] : '' ?></small>
      </div>
      <div class="form-group">
        <label for="pwd">Mot de passe</label>
        <input name="pwd" type="password" class="form-control bg-dark text-white " id="pwd">
        <label for="checkbox">
          <input type="checkbox" id="checkbox">
          <small class="text-warning">Afficher le mot de passe</small>
        </label>
        <div>
        <small><?= isset($arrayError['ErrMail-pwd']) ? $arrayError['ErrMail-pwd'] : '' ?></small>
        <small><?= isset($arrayError['ErrPwd']) ? $arrayError['ErrPwd'] : '' ?></small>
        </div>
      </div>
      <button type="submit" name="connexion" class="btn main-bg-color text-dark rounded col-12 mx-auto">Connexion</button>
    </form>
  </div>
  <!------------------------------------ fin connexion --------------------------->

  <div id="infossite mb-5">
    <div class="col-10 mx-auto mb-5">
      <p class="h1 text-white text-center m-2">Gérez comme un pro votre équipe de sport amateur, avec <span
          class="text-white"><u>Lamanage</u></span> organisez vos matchs et gérez votre équipe de foot.</p>
    </div>
    <div id="infossite" class="container">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-xl-3 col-sm-12 mt-4 mb-5">
          <i class="fas fa-clock IconLog"></i>
          <p class="text-white h5">Ne perdez plus votre temps à relancer vos joueurs. Soyez sûrs d’avoir une équipe au
            complet le jour J.</p>
        </div>
        <div class="col-1"></div>
        <div class="col-xl-3 col-sm-12 mt-4">
          <i class="far fa-question-circle IconLog"></i>
          <p class="text-white h5">Suivez l'actualité du foot en direct. <br>Mercato, transferts.</p>
        </div>
        <div class="col-1"></div>
        <div class="col-xl-3 col-sm-12 mt-4">
          <i class="far fa-chart-bar IconLog"></i>
          <p class="text-white h5">Classement, buteurs,... Analysez les performances de vos joueurs et de votre équipe !
          </p>
        </div>
      </div>
    </div>
  </div>


  <?php require 'public/script-pwd.php' ?>
<?php require 'public/footer.php' ?>
  <?php require 'public/cdn.php' ?>
</body>

</html>