<?php
require '../Controllers/liste_adminController.php';
require '../public/header.php';
?>

<body class="bg-admin">
  <?php require '../public/navbar.php'?>

  <p class="text-white rounded col-5 bg-dark mx-auto mt-4 h1 text-center mb-3">Entraineur(s)</p>

  <!-- button d'ajout d'entraineur -->
  <a href="create_admin.php">
    <div class="col-4 mt-1 rounded h text-center mx-auto">
      <a href="create_admin.php">
        <i class="fas fa-user-plus fa-3x text-warning mx-auto">
        </i>
        <p>
          <small class="text-white">Ajouter un entraineur</small>
        </p>
      </a>
    </div>
  </a>
  <ul class="text-center text-white">
    <?php
foreach ($infoAdmin as $admin) {
    ?>
    <!-- boucle tout les admins de la bdd  -->
    <li class="edit-player-bg col-xl-4 col-md-4 col-sm-8 mx-auto mb-3 rounded FadeIn">
      <form action="" method="POST">
        <!-- button pour supprimer un admin ouvrant la modal  -->
        <button type="button" class="badge badge-danger rounded-pill border border-danger float-right"
          data-toggle="modal" data-target="#exampleModalCth">
          <i class="fas fa-trash-alt"></i>
        </button>
        <!-- modal Delete --->
        <div class="modal fade" id="exampleModalCth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-delete">
              <div class="modal-header">
                <p class="modal-title text-dark mx-auto h3" id="exampleModalLabel">Êtes-vous sur ?</p>

              </div>
              <div class="modal-body text-dark mx-auto">
                Supprimer <span class="h5"><?=$admin['admins_firstname']?> <?=$admin['admins_lastname']?></span>
                définitivement ?
              </div>
              <div class="modal-footer text-center mx-auto">
                <button type="button" class=" btn btn-warning" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">Annuler</span>
                </button>
                <form action="" method="POST">
                  <button type="submit" value="<?=$admin['admins_id']?>"
                    class="btn btn-danger border border-danger rounded" name="DeleteAdmin">Confirmer</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- modal Delte --->
      </form>
      <p><i class="fas fa-user  fa-2x"></i> <?=$admin['admins_lastname']?> <?=$admin['admins_firstname']?></p>
      <p><i class="fas fa-envelope fa-2x"></i> <?=$admin['admins_mail']?></p>
      <a href="admin_profil.php?id=<?=$admin['admins_id']?>">

        <p class="badge badge-success border border-success">profil</p>
      </a>
    </li>
    <?php
}
?>
  </ul>


  <?php require '../public/footer.php'?>
  <?php require '../public/cdn.php'?>
</body>

</html>