<?php
require '../Controllers/profil_adminController.php';
require '../public/header.php';
?>

<body class="bg-admin">
  <?php require '../public/navbar.php' ?>
  <p class="text-white  rounded col-4 mx-auto bg-dark mt-4 mb-1 h1 text-center">Profil entraineur</p>
  <!-- button retour -->
  <a href="admins_liste.php">
    <button class="badge badge-dark border rounded-pill border-dark float-left"><i
        class="text-white fas fa-arrow-circle-left fa-2x"></i></button>
  </a>

  <div class="container">
    <div class="row">


      <div class="col-xl-4 col-md-4 col-sm-8 mx-auto mt-2">
        <h5 class="text-white text-center">Informations</h5>
        <?php
foreach ($infoAdmin as $admin) {
    ?>
        <!-- informations de l'entraineur choisie -->
        <div class="card card-cascade narrower FadeIn">
          <div class="view view-cascade overlay profil-player-stats-info">
            <p class="text-dark pb-2 pt-1 text-center"><i class="fas fa-user  fa-2x"></i>
              <?= $admin['admins_firstname'] ?> <?= $admin['admins_lastname'] ?></p>
            <p class="text-dark pb-2 pt-1 text-center"><i class="fas fa-envelope fa-2x"></i>
              <?= $admin['admins_mail'] ?></p>
          </div>
        </div>
        <?php
}?>
        <!-- button modifier -->
        <?php
foreach ($infoAdmin as $admin) {
    ?>
        <form action="edit_admin.php" method="POST">
          <!-- button pour acceder au modification du profil -->
          <button class="mt-2 btn btn-success rounded border border-success col-12" type="submit"
            value="<?=$admin['admins_id']?>" name="idAdmin">
            Modifier le profil
          </button>
        </form>
        <?php
}
?>
      </div>


    </div>
    <!--row -->
  </div>
  <!--container -->

  <?php require '../public/footer.php' ?>
  <?php require '../public/cdn.php' ?>
</body>

</html>