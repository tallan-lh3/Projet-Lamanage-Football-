<?php
require '../public/header.php';
require '../Controllers/liste_playerController.php';
?>

<body class="bg-admin">
  <?php require '../public/navbar.php';?>
  <?php
if (isset($_SESSION['infosAdmin'])) {?>
<!-- lien apercu vue joueur  -->
  <a href="compo-for-player.php">
    <button id="compo_caotch" class="m-2 badge badge-warning rounded border border-warning m-1 float-right">Aperçu vue
      Joueur</button>
  </a>
  <?php
}
?>
<!-- lien vu composition terrain -->
<a href="equipe_field.php">
    <button id="compo_caotch" class="m-2 badge badge-warning rounded border border-warning m-1 float-right">Composition sur le terrain</button>
  </a>
  <ul class="float-left p-1 m-1 rounded">

    <li class="text-white">Ajouter
      <!-- Button trigger modal -->
      <span data-toggle="modal" data-target="#sideModalC">
        <i id="convocation-player" class="fas fa-info-circle text-warning pointeur"></i>
      </span>
      <!-- Button trigger modal -->
    </li>
    <li class="text-white">Modifier
      <!-- Button trigger modal -->
      <span data-toggle="modal" data-target="#sideModalC">
        <i id="convocation-player" class="fas fa-info-circle text-success pointeur"></i>
      </span>
      <!-- Button trigger modal -->
    </li>
    <li class="text-white">Supprimer
      <!-- Button trigger modal -->
      <span data-toggle="modal" data-target="#sideModalC">
        <i id="convocation-player" class="fas fa-info-circle text-danger pointeur"></i>
      </span>
      <!-- Button trigger modal -->
    </li>
  </ul>

  <div class="modal fade left" id="sideModalC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-side modal-top-left" role="document">

      <div class="modal-content">
        <div class="modal-header bg-white text-white">
          <h4 class="modal-title text-dark w-100" id="myModalLabel">Gérez votre équipe <i
              class="fas fa-info-circle text-warning"></i></h4>

          <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-dark">
          <!-- Create -->
          <ul>
            <li>
              <p class="font-weight-bold text-white">Ajoutez un joueur: </p>
              <ul class="text-warning font-weight-bolder">
                <small>
                  <li>Le joueur apparaîtra dans la colonne de la position choisie.</li>
                </small>
                <small>
                  <li>Le joueur sera convoqué pour le prochain match.</li>
                </small>
              </ul>
            </li>
          </ul>

          <!-- Edit -->
          <ul>
            <li>
              <p class="font-weight-bold text-white">Modifiez un joueur: </p>
              <ul class="text-warning font-weight-bolder">
                <small>
                  <li>Modifier les informations personnelles de vos joueurs</li>
                </small>
                <small>
                  <li>Modifier le numéro de maillot et la position de vos joueurs</li>
                </small>
                <small>
                  <li>Modifier les stats de vos joueurs dans le but de voir ses stats dans le rubrique Statistiques</li>
                </small>
              </ul>
            </li>
          </ul>

          <!-- Edit -->
          <ul>
            <li>
              <p class="font-weight-bold text-white">Supprimer un joueur: </p>
              <ul class="text-warning font-weight-bolder">
                <small>
                  <li>Supprimer un joueur ainsi il ne sera pas convoqué pour le prochain match.</li>
                </small>
                <small>
                  <li>Supprimer le joueur ainsi que ses stats.</li>
                </small>

              </ul>
            </li>
          </ul>
          <ul class="text-danger font-weight-bolder">
            <li>
              <small>Les infos de vos joueurs sont à vérifier après chaque match.</small>
            </li>
            <li>
              <small>.</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Side Modal Top Left -->
  <!-- Button d'ajout d'un joueur -->
  <div class="col-4 mt-1 rounded h text-center mx-auto">
    <a href="create_player.php">
      <i class="fas fa-user-plus fa-3x text-warning mx-auto">
      </i>
      <p>
        <small class="text-white">Ajouter un joueur</small>
      </p>
    </a>
  </div>

  <div class="container-fluid">
    <div class="row">
      <!-- attaquant  -->
      <div class="col-sm-12 col-xl-2 col-md-12 FadeIn">
        <ul class="mx-auto">
          <p class="h4 text-center bg-dark text-white rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-atk"></i>Attaquant<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-atk"></i></p>
          <?php
foreach ($AttaquantList as $player) {
    ?>
          <li class="toggle-middle-js-atk col-5 col-xl-12 mx-auto">
            <!-- button de suppresion -->
            <button type="button" class="badge badge-danger rounded-pill border border-danger float-right"
              data-toggle="modal" data-target="#exampleModalAtk"><i class="fas fa-trash-alt"></i></button>
            <!-- modal Delete --->
            <div class="modal fade modal-delete-bg" id="exampleModalAtk" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content modal-delete">
                  <div class="modal-header">
                    <p class="modal-title mx-auto h3" id="exampleModalLabel">Êtes-vous sur ?</p>

                  </div>
                  <div class="modal-body mx-auto">
                    Supprimer <span class="h5"><?=$player['users_firstname'] ?> <?=$player['users_lastname'] ?></span>
                    définitivement ?
                  </div>
                  <div class="modal-footer text-center mx-auto">
                    <button type="button" class=" btn btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">Annuler</span>
                    </button>
                    <form action="" method="POST">
                      <button type="submit" value="<?=$player['users_id']?>"
                        class="btn btn-danger border border-danger rounded" name="DeletePlayer">Confirmer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal Delte --->


            <a href="player_profil.php?id=<?=$player['users_id']?>">
              <button class=" float-left badge badge-success border border-success rounded-pill"><i
                  class="fas fa-edit"></i></button>
            </a>
            <!-- image du joueur -->
            <img src="<?=$player['users_picture']?>"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <!-- nom prenom du joueur -->
            <p class="text-dark border border-white bg-success rounded-pill text-center font-weight-bold">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>


          </li>

          <?php
}
?>

        </ul>
      </div>
      <div class="col-sm-12 col-xl-2 col-md-12 FadeIn">
        <!-- Milieu  -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-dark text-white rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-mdl"></i>Milieu<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-mdl"></i></p>
          <?php
foreach ($MilieuList as $player) {
    ?>
          <li class="toggle-middle-js-mdl col-5 col-xl-12 mx-auto">
            <!-- button de suppression -->
            <button type="button" class="badge badge-danger rounded-pill border border-danger float-right"
              data-toggle="modal" data-target="#exampleModalMdl"><i class="fas fa-trash-alt"></i></button>
            <!-- modal --->
            <div class="modal fade modal-delete-bg" id="exampleModalMdl" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content modal-delete">
                  <div class="modal-header">
                    <p class="modal-title mx-auto h3" id="exampleModalLabel">Êtes-vous sur ?</p>

                  </div>
                  <div class="modal-body mx-auto">
                    Supprimer <span class="h5"><?=$player['users_firstname'] ?> <?=$player['users_lastname'] ?></span>
                    définitivement ?
                  </div>
                  <div class="modal-footer text-center mx-auto">
                    <button type="button" class=" btn btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">Annuler</span>
                    </button>
                    <form action="" method="POST">
                      <button type="submit" value="<?=$player['users_id']?>"
                        class="btn btn-danger border border-danger rounded" name="DeletePlayer">Confirmer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal --->

            <a href="player_profil.php?id=<?=$player['users_id']?>">
              <button class=" float-left badge badge-success border border-success rounded-pill"><i
                  class="fas fa-edit"></i></button>
            </a>
            <!-- image du joueur-->
            <img src="<?=$player['users_picture']?>"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <!-- nom prenom du joueur -->
            <p class="text-dark border border-white bg-success rounded-pill text-center font-weight-bold">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>

          </li>
          <?php
}
?>
        </ul>
      </div>
      <div class="col-sm-12 col-xl-2 col-md-12 FadeIn">
        <!-- defenseur -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-dark text-white rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-def"></i>Défenseur<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-def"></i></p>
          <?php
foreach ($DefenseurList as $player) {
    ?>
          <li class="toggle-middle-js-def">
            <!-- button de suppression -->
            <button type="button" class="badge badge-danger rounded-pill border border-danger float-right"
              data-toggle="modal" data-target="#exampleModalDef"><i class="fas fa-trash-alt"></i></button>
            <!-- modal --->
            <div class="modal fade modal-delete-bg" id="exampleModalDef" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content modal-delete">
                  <div class="modal-header">
                    <p class="modal-title mx-auto h3" id="exampleModalLabel">Êtes-vous sur ?</p>

                  </div>
                  <div class="modal-body mx-auto">
                    Supprimer <span class="h5"><?=$player['users_firstname'] ?> <?=$player['users_lastname'] ?></span>
                    définitivement ?
                  </div>
                  <div class="modal-footer text-center mx-auto">
                    <button type="button" class=" btn btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">Annuler</span>
                    </button>
                    <form action="" method="POST">
                      <button type="submit" value="<?=$player['users_id']?>"
                        class="btn btn-danger border border-danger rounded" name="DeletePlayer">Confirmer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal --->
            <a href="player_profil.php?id=<?=$player['users_id']?>">
              <button class=" float-left badge badge-success border border-success rounded-pill"><i
                  class="fas fa-edit"></i></button>
            </a>
            <!-- image du joueur -->
            <img src="<?=$player['users_picture']?>"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <!-- nom prenom du joueur -->
            <p class="text-dark border border-white bg-success rounded-pill text-center font-weight-bold">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>
          </li>

          <?php
}
?>
        </ul>
      </div>
      <div class="col-sm-12 col-xl-2 col-md-12 FadeIn">
        <!-- goal -->
        <ul class="mx-auto">
          <p class="h4 text-center bg-dark text-white rounded p-1"><i
              class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-gk"></i>Gardien<i
              class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-gk"></i></p>
          <?php
foreach ($GoalList as $player) {
    ?>
          <li class="toggle-middle-js-gk">
            <!-- button de suppression -->
            <button type="button" class="badge badge-danger rounded-pill border border-danger float-right"
              data-toggle="modal" data-target="#exampleModalGk"><i class="fas fa-trash-alt"></i></button>
            <!-- modal --->
            <div class="modal fade modal-delete-bg" id="exampleModalGk" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content modal-delete">
                  <div class="modal-header">
                    <p class="modal-title mx-auto h3" id="exampleModalLabel">Êtes-vous sur ?</p>

                  </div>
                  <div class="modal-body mx-auto">
                    Supprimer <span class="h5"><?=$player['users_firstname'] ?> <?=$player['users_lastname'] ?></span>
                    définitivement ?
                  </div>
                  <div class="modal-footer text-center mx-auto">
                    <button type="button" class=" btn btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">Annuler</span>
                    </button>
                    <form action="" method="POST">
                      <button type="submit" value="<?=$player['users_id']?>"
                        class="btn btn-danger border border-danger rounded" name="DeletePlayer">Confirmer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal --->
            <a href="player_profil.php?id=<?=$player['users_id']?>">
              <button class=" float-left badge badge-success border border-success rounded-pill"><i
                  class="fas fa-edit"></i></button>
            </a>
            <!-- image du joueur -->
            <img src="<?=$player['users_picture']?>"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <!-- nom prenom du joueur -->
            <p class="text-dark border border-white bg-success rounded-pill text-center font-weight-bold">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>
          </li>
          <?php
}
?>
        </ul>
      </div>
      <div class="col-sm-12 col-xl-4 col-md-12 mx-auto FadeIn">
        <!-- Remplacant -->
        <ul class="mx-auto">
          <p class=" h4 text-center bg-dark text-white rounded p-1">
            <i class="slideUpDown-compo float-right mt-1 fas fa-arrow-circle-up slideUp-middle-js-sub">
            </i>
            Remplacant

            <i class="slideUpDown-compo fas fa-arrow-circle-down float-right mt-1 slideDown-middle-js-sub">
            </i></p>
          <?php
foreach ($RemplacantList as $player) {
    ?>
          <li class="toggle-middle-js-sub col-5 mx-auto">
            <!-- button de suppression -->
            <button type="button" class="button-delte badge badge-danger rounded-pill border border-danger float-right"
              data-toggle="modal" data-target="#exampleModalSub"><i class="fas fa-trash-alt"></i></button>
            <!-- modal --->
            <div class="modal fade modal-delete-bg" id="exampleModalSub" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content modal-delete">
                  <div class="modal-header">
                    <p class="modal-title mx-auto h3" id="exampleModalLabel">Êtes-vous sur ?</p>

                  </div>
                  <div class="modal-body mx-auto">
                    Supprimer <span class="h5"><?=$player['users_firstname'] ?> <?=$player['users_lastname'] ?></span>
                    définitivement ?
                  </div>
                  <div class="modal-footer text-center mx-auto">
                    <button type="button" class=" btn btn-warning" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">Annuler</span>
                    </button>
                    <form action="" method="POST">
                      <button type="submit" value="<?=$player['users_id']?>"
                        class="btn btn-danger border border-danger rounded" name="DeletePlayer">Confirmer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal --->
            <a href="player_profil.php?id=<?=$player['users_id']?>">
              <button class=" float-left badge badge-success border border-success rounded-pill"><i
                  class="fas fa-edit"></i></button>
            </a>
            <!-- image du joueur -->
            <img src="<?=$player['users_picture']?>"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title="<?=$player['users_firstname']?> <?=$player['users_lastname']?>">
            <!-- nom prenom du joueur -->
            <p class="text-dark border border-white bg-danger rounded-pill text-center font-weight-bold">
              <?=$player['users_firstname']?> <?=$player['users_lastname']?></p>
          </li>
          <?php
}
?>
        </ul>
      </div>
    </div>
  </div>
  <?php require '../public/footer.php' ?>
  <?php require '../public/cdn.php'?>
</body>

</html>