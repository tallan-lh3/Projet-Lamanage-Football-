<!-- -----------------NAVBAR------------------- -->
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded sticky-top">
  <a class="logo-lamanage h3 p-1 rounded text-white" href="equipe_actu.php">
    Lamanage
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">

      <?php
if (isset($_SESSION['infosAdmin'])) {?>
      <!-- vue admin -->
      <li class="nav-item">
        <a class="nav-link text-warning font-weight-bold h5 rounded-pill bolder" href="admins_liste.php">Entraineur</a>
      </li>
      <?php }
?>

      <li class="nav-item">
        <a class="nav-link text-navbar" href="equipe_actu.php">Actualités</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-navbar" href="equipe_stats.php">Statistiques</a>
      </li>

      <?php
if (isset($_SESSION['infosAdmin'])) {?>
      <!-- vue admin -->
      <li class="nav-item">
        <a class="nav-link text-navbar" href="equipe_compo.php">Mon Équipe</a>
      </li>
      <?php
} else {?>
      <li class="nav-item">
        <a class="nav-link text-navbar" href="compo-for-player.php">Mon Équipe</a>
      </li>

      <?php }
?>
    </ul>


    <?php
if (isset($_SESSION['infosAdmin'])) {?>
    <!-- vue admin -->
    <a href="deconnexion.php">
      <button type="button" class="btn btn-dark font-weight-bold">
        Deconnexion
      </button>
    </a>
    <?php
} else {?>
    <!-- vue joueur -->
    <a href="../index.php">
      <button type="button" class="btn btn-dark font-weight-bold">
        Quitter le site
      </button>
    </a>
    <?php }
?>




  </div>
</nav>
<!-- -------------------Fin NAVBAR----------------------->