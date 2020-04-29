<?php
require '../Controllers/profil_playerController.php';
require '../public/header.php';
?>

<body class="<?= isset($_SESSION['infosAdmin']) ? 'bg-admin' : 'equipe-compo' ?>">
  <?php require '../public/navbar.php' ?>
  <p class="text-white bg-dark rounded col-3 mx-auto mt-4 mb-1 h1 text-center">Profil</p>
  <a href="equipe_compo.php">
    <button class="badge badge-dark text-white  rounded-pill border border-dark float-left"><i
        class=" text-white fas fa-arrow-circle-left fa-2x"></i></button>
  </a>
  <div class="container">
    <div class="row">

      <!-- ----------------------------------------------------------------------MAILLOT JOUEUR -->
      <div class="col-xl-4 col-md-4 col-sm-8 mx-auto mt-2">
        <h5 class="text-white text-center">Maillot</h5>

        <?php
foreach ($infoPlayer as $player) {
    ?>
        <div class="card card-cascade narrower">
          <!-- Card image -->
          <div class="view view-cascade overlay">
            <img class="card-img-top bg-dark rounded border border-white" src="<?= $player['users_picture'] ?>"
              height="250px" alt="Card image cap">
          </div>
        </div>
        <?php
}
?>
      </div>
      <!-- ------------------------------------------------------------------NOM PRENOM POSITION -->
      <div class="col-xl-4 col-md-4 col-sm-8 mx-auto mt-2">
        <h5 class="text-white text-center">Informations</h5>
        <?php
foreach ($infoPlayer as $player) {
    ?>
        <div class="card card-cascade narrower">
          <div class="view view-cascade overlay profil-player-stats-info">
            <p class="text-dark pb-2 pt-1 text-center"><i class="fas fa-user  fa-2x"></i>
              <?= $player['users_firstname'] ?> <?= $player['users_lastname'] ?></p>
            <p class="text-dark pb-2 pt-1 text-center"><i class="fas fa-crosshairs fa-2x"></i>
              <?= $player['position'] ?></p>
          </div>
        </div>
        <?php
}?>

        <h5 class="text-white text-center mt-3">Statistiques</h5>

        <!-- ------------------------------------------------------------------MATCH BUT PASSE -->
        <?php
foreach ($infoPlayer as $player) {
    ?>
        <div class="card card-cascade narrower">
          <div class="view view-cascade overlay profil-player-stats-info">
            <h5 class="text-dark pb-2 pt-1 text-center"><i class="fas fa-bullseye fa-2x"></i>
              <?= $player['stats_game'] ?></h5>
            <h5 class="text-dark pb-2 pt-1 text-center"><i class="fas fa-futbol fa-2x"></i> <?= $player['stats_goal'] ?>
            </h5>
            <h5 class="text-dark pb-2 pt-1 text-center"><i class="fas fa-hands-helping fa-2x"></i>
              <?= $player['stats_assist'] ?></h5>
          </div>
        </div>
        <?php
}?>
        <!-- button moidfier -->
        <?php
foreach ($infoPlayer as $player) {
    ?>
        <form action="edit_player.php" method="POST">
          <button class="mt-2 btn btn-success rounded border border-success col-12" type="submit"
            value="<?=$player['users_id']?>" name="idPlayer">
            Modifier le profil
          </button>
        </form>
        <?php
}
?>
      </div> <!-- debut L44 -->


    </div>
    <!--row -->
  </div>
  <!--container -->
  <?php require '../public/cdn.php' ?>
</body>

</html>