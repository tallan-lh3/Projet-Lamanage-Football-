<?php
require '../Controllers/liste_playerController.php';
require '../public/header.php';
?>

<body class="<?= isset($_SESSION['infosAdmin']) ? 'bg-admin' : 'equipe-compo' ?>">
  <?php require '../public/navbar.php'?>
  <div>
    <p class="text-center h1 bg-dark col-8 mx-auto rounded text-white mt-3 mb-5">Statistiques de l'équipe</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xl-10 col-md-12 col-sm-12 bg-input-login rounded mx-auto mt-3 table-stats">
        <table class="table mt-3 table-responsive">
          <thead>
            <tr class="">
              <th scope="col" class="h5">Joueur</th>
              <th scope="col" class="h5">Match(<span class="text-white">s</span>)</th>
              <th scope="col" class="h5">But(<span class="text-white">s</span>) <button
                  class="badge badge-white border border-white rounded btn-Bgoal"> <span
                    class="text-dark">Classement</span></button></th>
              <th scope="col" class="h5">Passes(<span class="text-white">s</span>) <button
                  class="badge badge-white border border-white rounded btn-Bassist"><span
                    class="text-dark">Classement</span></button></th>
              <th scope="col" class="h5">Ratio <span class="text-white">M</span>atch/<span
                  class="text-white">B</span>ut(<span class="text-white">s</span>)</th>
              <th scope="col" class="h5">Ratio <span class="text-white">M</span>atch/<span
                  class="text-white">P</span>asse(<span class="text-white">s</span>)</th>

            </tr>
          </thead>
          <tbody>

            <?php
foreach ($AllPlayer as $player) {
// Calcul le ratio des joueurs
                    if ($player['stats_assist'] != 0 or $player['stats_game'] != 0) {
                        $nbrGG =  $player['stats_goal'] / $player['stats_game'];
                        $nbrAG = $player['stats_assist'] / $player['stats_game'];
                        $nbrGG = number_format($nbrGG, 2);
                        $nbrAG = number_format($nbrAG, 2);
                    }
    ?>
            <tr class="text-white">

              <td class="font-weight-bold h6"><u><?=$player['users_lastname']?> <?=$player['users_firstname']?></u></td>
              <td class="font-weight-bold text-center"><?=$player['stats_game']?></td>
              <td class="font-weight-bold text-warning text-center"><?=$player['stats_goal']?></td>
              <td class="font-weight-bold text-warning text-center"><?=$player['stats_assist']?></td>
              <td class="font-weight-bold text-warning text-center"><?= isset($nbrGG) ? $nbrGG : 0 ?></td>
              <td class="font-weight-bold text-warning text-center"><?= isset($nbrAG) ? $nbrGG : 0 ?></td>

            </tr>

            <?php
}
?>
          </tbody>
        </table>
      </div>

      <!-- Meuilleur buteur  -->

      <div id="Bgoal" class="col-xl-8 col-md-12 text-center col-sm-12 bg-input-login rounded mx-auto mt-3">
        <p class="text-center h2 text-white rounded-pill text-dark mt-2 col-5 mx-auto">Meuilleur buteur</p>
        <button class="badge badge-dark text-white  border border-dark  rounded-pill  float-left btn-back-goal"><i
            class="fas fa-arrow-circle-left fa-2x text-white"></i></button>
        <table class="table table-hover mx-auto">
          <thead>
            <tr>
              <th scope="col" class="h2"><span class="rounded p-2 text-white">Joueurs</span></th>
              <th scope="col" class="h2"><span class="rounded p-2 text-white">But(<span
                    class="text-dark">s</span>)</span></th>

            </tr>
          </thead>
          <tbody>
            <?php
foreach ($BestGoalPlayer as $player) {
    ?>
            <tr class="Bgoalassist">
              <th scope="row" class="text-dark h5"><?=$player['users_lastname']?> <?=$player['users_firstname']?></th>
              <td colspan="2" class="text-warning h2 p-3"><?=$player['stats_goal']?></td>
            </tr>

            <?php
}
?>
          </tbody>
        </table>
      </div>

      <!-- Meuilleur Passeur  -->
      <div id="Bassist" class="col-xl-8 col-md-12 text-center col-sm-12 bg-input-login rounded mx-auto mt-3 ">
        <p class="text-center h2 text-white rounded-pill text-dark mt-2 col-5 mx-auto">Meuilleur passeur</p>
        <button class="badge badge-dark border border-dark text-white rounded-pill  float-left btn-back-assist"><i
            class="text-white fas fa-arrow-circle-left fa-2x"></i></button>
        <table class="table table-hover mx-auto">
          <thead>
            <tr>
              <th scope="col" class="h2"><span class="rounded p-2 text-white">Joueurs</span></th>
              <th scope="col" class="h2"><span class="rounded p-2 text-white">Passe(<span
                    class="text-dark">s</span>)</span></th>

            </tr>
          </thead>
          <tbody>
            <?php
foreach ($BestAssistPlayer as $player) {
    ?>
            <tr class="Bgoalassist">
              <th scope="row" class="text-dark h5"><?=$player['users_lastname']?> <?=$player['users_firstname']?></th>
              <td colspan="2" class="text-warning h2 p-3"><?=$player['stats_assist']?></td>
            </tr>

            <?php
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- fin stats -->
  <?php require '../public/footer.php'?>
  <?php require '../public/cdn.php'?>
</body>

</html>