<?php
require '../Controllers/create_playerController.php';
require '../public/header.php';
?>

<body class="bg-admin">

  <?php require '../public/navbar.php'?>

  <p class="text-white rounded col-8 mx-auto mt-4 mb-1 h1 text-center bg-dark mb-5">Ajouter un joueur</p>
  <!-- toast de validation / erreur -->
  <?=isset($createOk) ? $createOk : $createNotOk?>
  <!-- button de retour -->
  <a href="equipe_compo.php">
    <button class="badge badge-dark text-white  rounded-pill border border-dark float-left"><i
        class=" text-white fas fa-arrow-circle-left fa-2x"></i></button>
  </a>
  <!-- formulaire permettant d'utilisé les POST -->
  <form action="create_player.php" method="POST">
    <div class="container text-white text-center">
      <div class="row">

        <div class="col-xl-5 col-md-6 col-sm-6 m-1 mx-auto mt-2">
          <div class="form-group edit-player-bg rounded p-2">
            <label class="control-label col-6" for="fname">Prénom </label>
            <input type="text" class="form-control" id="fname" name="firstname" placeholder="Ex: Jean">
            <small><?=isset($arrayError['firstname']) ? $arrayError['firstname'] : ''?></small>
          </div>
          <div class="form-group edit-player-bg rounded p-2">
            <label class="control-label" for="lname">Nom </label>
            <input type="text" class="form-control" id="lname" name="lastname" placeholder="Ex: Dupont">
            <small><?=isset($arrayError['lastname']) ? $arrayError['lastname'] : ''?></small>
          </div>


          <div class="form-group edit-player-bg rounded p-2">
            <p class="text-white">Position</p>
            <select name="position" id="position" class="custom-select">
              <option value="0" selected>Choisir</option>
              <option value="1">Attaquant</option>
              <option value="2">Attaquant Gauche</option>
              <option value="3">Attaquant Droit</option>
              <option value="4">Milieu</option>
              <option value="5">Milieu Gauche</option>
              <option value="6">Milieu Droit</option>
              <option value="7">Défenseur Central</option>
              <option value="8">Défenseur Gauche</option>
              <option value="9">Défenseur Droit</option>
              <option value="10">Gardien de but</option>
              <option value="11">Remplacant</option>
            </select>
            <small><?=isset($arrayError['position']) ? $arrayError['position'] : ''?></small>
          </div>
          <div class="form-group edit-player-bg rounded p-2">
            <p class="text-white">Maillot</p>
            <select name="picture" id="picture" class="custom-select">
              <option value="0" selected>Choisir</option>
              <?php for ($i = 1;; $i++) {?>
              <option value="../assets/img/maillot<?=$i?>.png">
                Maillot N°<?=$i?>
              </option>
              <?php if ($i > 17) {
    break;
}
}?>
            </select>
            <small><?=isset($arrayError['picture']) ? $arrayError['picture'] : ''?></small>
          </div>
          <!-- button de validation addPlayer -->
          <button type="submit" class="btn bg-warning rounded" name="addPlayer" value="Ajouter un joueur">Ajouter un
            joueur</button>
        </div>

      </div>
    </div>

  </form>



  <?php require '../public/footer.php'?>
  <?php require '../public/cdn.php'?>
</body>

</html>