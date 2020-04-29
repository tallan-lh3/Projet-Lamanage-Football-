<?php
require '../Controllers/edit_playerController.php';
require '../public/header.php';
?>

<body class="bg-admin">
  <?php require '../public/navbar.php'?>


  <p class="text-white  rounded bg-dark col-8 mx-auto mt-4 mb-1 h1 text-center">Editer les informations du joueur</p>
  <!-- toast erreur valide modif -->
  <?= isset($editOk) ? $editOk : $editNotOk ?>
  <!-- button retour -->
  <a href="equipe_compo.php">
    <button class="badge badge-dark text-white  rounded-pill border border-dark float-left"><i
        class=" text-white fas fa-arrow-circle-left fa-2x"></i></button>
  </a>
  <div class="container text-white">
    <div class="row">
      <div class="col-sm-12 col-xl-3 col-md-3 mx-auto m-1">
        <form action="" method="POST">
          <div class="form-group edit-player-bg p-3 rounded mt-5">
            <label class="control-label col-12" for="picture"><i class="fas fa-tshirt"></i> Maillot</label>
            <select name="picture" id="picture" class="custom-select">
              <!-- incrémente tout les maillot de 1 pour avoir les 18 maillot -->
              <option value="<?=$infoPlayer[0]['users_picture'] ?>">(Default)</option>
              <?php for ($i = 1;; $i++) {?>
              <option value="../assets/img/maillot<?=$i?>.png">
                Maillot N°<?=$i?>
              </option>
              <?php if ($i > 17) {
break;
}
}?>
            </select>
          </div>
      </div>

      <div class="col-sm-12 col-xl-4 col-md-4 mx-auto m-1 mt-5">
        <div class="form-group edit-player-bg rounded p-3">
          <label class="control-label col-12" for="fname"> <span><i class="fas fa-user"></i></span> Prénom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fname" name="firstname"
              value="<?=isset($infoPlayer[0]['users_firstname']) ? $infoPlayer[0]['users_firstname'] : ''?>">
            <small><?= isset($arrayError['firstname']) ? $arrayError['firstname'] : '' ?></small>
          </div>
        </div>
        <div class="form-group edit-player-bg rounded p-3">
          <label class="control-label col-12" for="lname"><i class="fas fa-user"></i> Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lname" name="lastname"
              value="<?=isset($infoPlayer[0]['users_lastname']) ? $infoPlayer[0]['users_lastname'] : ''?>">
            <small><?= isset($arrayError['lastname']) ? $arrayError['lastname'] : '' ?></small>
          </div>
        </div>
        <div class="form-group edit-player-bg rounded p-3">
          <label class="control-label col-12" for="position"><i class="fas fa-crosshairs"></i> Position</label>
          <select name="position" id="position" class="custom-select">
            <option value="<?=isset($infoPlayer[0]['position_id']) ? $infoPlayer[0]['position_id'] : ''?>">
              <?=isset($infoPlayer[0]['position']) ? $infoPlayer[0]['position'] : ''?></option>
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
        </div>
      </div>

      <div class="col-sm-12 col-xl-4 col-md-4 mx-auto m-1">
        <div class="form-group edit-player-bg rounded p-3 mt-5">
          <label class="control-label col-12" for="game"><i class="fas fa-bullseye"></i> Nombre de match</label>
          <div class="col-sm-10">
            <span id="lessGame" class="float-left rounded-pill pointeur"><i
                class="fas fa-minus fa-2x MoreLess"></i></span>
            <span id="plusGame" class="float-right rounded-pill pointeur"><i
                class="fas fa-plus fa-2x MoreLess"></i></span>
            <input type="number" class="form-control col-8 mx-auto" id="game" name="game"
              value="<?=isset($infoPlayer[0]['stats_game']) ? $infoPlayer[0]['stats_game'] : ''?>">

            <small><?= isset($arrayError['game']) ? $arrayError['game'] : '' ?></small>
          </div>
        </div>

        <div class="form-group edit-player-bg rounded p-3">
          <label class="control-label col-12" for="goal"><i class="fas fa-futbol"></i> Nombre de but</label>
          <div class="col-sm-10">
            <span id="lessGoal" class="float-left rounded-pill pointeur"><i
                class="fas fa-minus fa-2x MoreLess"></i></span>
            <span id="plusGoal" class="float-right rounded-pill pointeur"><i
                class="fas fa-plus fa-2x MoreLess"></i></span>
            <input type="number" class="form-control col-8 mx-auto" id="goal" name="goal"
              value="<?=isset($infoPlayer[0]['stats_goal']) ? $infoPlayer[0]['stats_goal'] : ''?>">
            <small><?= isset($arrayError['goal']) ? $arrayError['goal'] : '' ?></small>
          </div>
        </div>

        <div class="form-group edit-player-bg rounded p-3">
          <label class="control-label col-12" for="assist"><i class="fas fa-hands-helping"></i> Nombre de passe</label>
          <div class="col-sm-10">
            <span id="lessAssist" class="float-left rounded-pill pointeur"><i
                class="fas fa-minus fa-2x MoreLess"></i></span>
            <span id="plusAssist" class="float-right rounded-pill pointeur"><i
                class="fas fa-plus fa-2x MoreLess"></i></span>
            <input type="number" class="form-control col-8 mx-auto" id="assist" name="assist"
              value="<?=isset($infoPlayer[0]['stats_assist']) ? $infoPlayer[0]['stats_assist'] : ''?>">
            <small><?= isset($arrayError['assist']) ? $arrayError['assist'] : '' ?></small>
          </div>
        </div>
        <button class="mt-2 btn btn-success rounded border border-success col-12" value="<?=$id?>"
          name="editPlayer">Modifier le profil</button>
      </div>





      <!-- modif stats -->
      </form>
    </div>
  </div>


  <!-- test -->



  <?php require '../public/cdn.php'?>
</body>

</html>