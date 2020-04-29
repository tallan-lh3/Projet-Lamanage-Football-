<?php
require '../public/header.php';
require '../Controllers/liste_playerController.php';
?>

<body class="equipe-compo">
  <?php require '../public/navbar.php';?>
  <?php
if (isset($_SESSION['infosAdmin'])) {?>
  <a href="equipe_compo.php">
    <button id="compo_player" class="m-2 badge badge-warning rounded border border-warning float-right">retour à la vue
      Admin</button>
  </a>
  
  <?php
}
?>
  <p class="text-dark font-weight-bold float-left">Convocation</p>
  <!-- Side Modal Top LEFT -->

  <!-- Button modal -->
  <p data-toggle="modal" data-target="#sideModalTL">
    <i id="convocation-player" class="fas fa-info-circle text-warning pointeur"></i>
  </p>
  <!-- Button  modal -->

  <div class="modal fade left" id="sideModalTL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">


    <div class="modal-dialog modal-side modal-top-left" role="document">


      <div class="modal-content">
        <div class="modal-header bg-white text-white">
          <h4 class="modal-title text-dark w-100" id="myModalLabel">Êtes-vous convoqués pour le prochain match ? <i
              class="fas fa-info-circle text-warning"></i></h4>

          <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-dark">
          <ul>
            <li>
              <p class="font-weight-bold text-success">Titulaire: </p> <span class="text-white">Votre profil apparaît
                dans une des listes suivantes : </span>

              <ul class="text-success font-weight-bolder">
                <small>
                  <li>Attaquant</li>
                </small>
                <small>
                  <li>Milieu</li>
                </small>
                <small>
                  <li>Défenseur</li>
                </small>
                <small>
                  <li>Gardien de but</li>
                </small>
              </ul>
            </li>
          </ul>
          <ul>
            <li>
              <p class="font-weight-bold text-danger">Remplaçant: </p> <span class="text-white">Votre profil apparaît
                dans la liste suivante : </span>

              <ul class="text-danger font-weight-bolder">
                <small>
                  <li>Remplaçant</li>
                </small>

              </ul>
            </li>
          </ul>
          <p class="text-white"><u>Votre profil n'est dans aucune des listes ?</u></p>
          <ul class="text-warning font-weight-bolder">
            <li>
              <small>Vous avez été placé dans la liste des réservistes.</small>
            </li>
            <li>
              <small>Votre niveaux est trop faible, continuez l'entrainement.</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Side Modal Top Left -->
 
  <div>
    <p class="text-center h1 text-dark bg-white rounded col-9 mx-auto mt-3 mb-5">Composition pour le prochain match</p>
  </div>



  <!----------------------- Composition de lEquipe ----------------->


  <div class="container-fluid">
    <div class="row">
      <!-- attaquant  -->
      <div class="col-xl-2 col-md-12 col-sm-12 mx-auto wow fadeInUp">
        <ul class="mx-auto">
          <p class="h4 text-center bg-white  rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-atk"></i>Attaquant<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-atk"></i></p>
          <?php
foreach ($AttaquantList as $player) {
  // Liste des attaquants
    ?>
          <li class="toggle-middle-js-atk col-5 col-xl-12 mx-auto">

            <img src="<?=$player['users_picture']?>"
              class="border border-success card-equipe-size card-img-top img-fluid p-2  rounded-pill col-6 mx-auto bg-input-login"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>"
              title="Supprimer">
            <p class="text-white font-weight-bold border border-white bg-success rounded-pill text-center">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>

          </li>

          <?php
}
?>

        </ul>
      </div>
      <div class="col-xl-2 col-md-12 col-sm-12 mx-auto wow fadeInDown">
        <!-- Milieu  -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-white rounded p-1 "><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-mdl"></i>Milieu<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-mdl"></i></p>
          <?php
foreach ($MilieuList as $player) {
   // Liste des milieux
    ?>
          <li class="toggle-middle-js-mdl col-5 col-xl-12 mx-auto mx-auto">
            <!-- on accede au profil du joueur en cliquant sur sa photo grace a la balise a qui a comme value l'id du joueur -->

            <img src="<?=$player['users_picture']?>"
              class="border border-success card-equipe-size card-img-top img-fluid p-2  rounded-pill bg-input-login"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <p class="text-white font-weight-bold border border-white bg-success rounded-pill text-center">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>


          </li>
          <?php
}
?>
        </ul>
      </div>
      <div class="col-xl-2 col-md-12 col-sm-12 mx-auto wow fadeInUp">
        <!-- defenseur -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-white rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-def"></i>Défenseur<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-def"></i></p>
          <?php
foreach ($DefenseurList as $player) {
   // Liste des defenseurs
    ?>
          <li class="toggle-middle-js-def col-5 col-xl-12 mx-auto">
            <!-- on accede au profil du joueur en cliquant sur sa photo grace a la balise a qui a comme value l'id du joueur -->

            <img src="<?=$player['users_picture']?>"
              class="border border-success card-equipe-size card-img-top img-fluid p-2  rounded-pill bg-input-login"
              alt="avatar du joueur bg-input-login"
              title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <p class="text-white font-weight-bold border border-white bg-success rounded-pill text-center">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>




          </li>

          <?php
}
?>
        </ul>
      </div>
      <div class="col-xl-2 col-md-12 col-sm-12 mx-auto wow fadeInDown">
        <!-- goal -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-white rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-gk"></i>Gardien<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-gk"></i></p>
          <?php
foreach ($GoalList as $player) {
   // Liste des gardien de buts
    ?>
          <li class="toggle-middle-js-gk col-5 col-xl-12 mx-auto">

            <img src="<?=$player['users_picture']?>"
              class="border border-success card-equipe-size card-img-top img-fluid p-2  rounded-pill bg-input-login"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <p class="text-white font-weight-bold border border-white bg-success rounded-pill text-center">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>


          </li>
          <?php
}
?>
        </ul>
      </div>
      <div class="col-xl-4 col-md-12 col-sm-12 mx-auto wow fadeInUp">
        <!-- Remplacant -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-white rounded p-1">
            <i class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-sub">
            </i>
            Remplacant
            <i class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-sub">
            </i></p>
          <?php
foreach ($RemplacantList as $player) {
   // Liste des rempalcant
    ?>
          <li class="toggle-middle-js-sub col-4 col-xl-5 mx-auto">
            <!-- on accede au profil du joueur en cliquant sur sa photo grace a la balise a qui a comme value l'id du joueur -->
            <img src="<?=$player['users_picture']?>"
              class="border border-danger card-equipe-size card-img-top img-fluid p-2 rounded-pill bg-input-login "
              alt="avatar du joueur" title="<?=$player['users_firstname']?><?=$player['users_lastname']?>">

            <p class="text-white border border-white font-weight-bold bg-danger rounded-pill text-center">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>

          </li>
          <?php
}
?>
        </ul>
      </div>
    </div>
  </div>








  <!------------------FIN Composition de lEquipe--------------- -->




  </div>
  </div>
  <?php require '../public/footer.php'?>
  <?php require '../public/cdn.php'?>
</body>

</html>