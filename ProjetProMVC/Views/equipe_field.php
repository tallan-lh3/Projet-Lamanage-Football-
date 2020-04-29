<?php
require '../public/header.php';
require '../Controllers/liste_playerController.php';
?>

<body class="bg-dark">
  
  <div class="bg-equipe_field wow fadeInDown">
  <?php
if (isset($_SESSION['infosAdmin'])) {?>
  <a href="compo-for-player.php">
    <button id="compo_caotch" class="m-2 badge badge-warning rounded border border-warning m-1 float-right">Retour
</button>
  </a>
  <?php
}
?>
<table class="table">
  <thead>
  <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    
  </thead>
  <tbody>
    <tr class="wow fadeInUp">
      <th scope="row"></th>
      <td><img src="../assets/img/maillot11.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td><img src="../assets/img/maillot10.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td></td>
    </tr>
    <tr class="wow fadeInUp">
        
      <th scope="row"><img src="../assets/img/maillot1.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2 FadeIn rounded-pill"
              alt="avatar du joueur" title=""></th>
              
      <td><img src="../assets/img/maillot2.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td><img src="../assets/img/maillot3.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td><img src="../assets/img/maillot4.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
    </tr>
    <tr class="wow fadeInUp">
      <th scope="row"></th>
      <td><img src="../assets/img/maillot5.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td><img src="../assets/img/maillot6.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td><img src="../assets/img/maillot7.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
    </tr>
    <tr class="wow fadeInUp">
      <th scope="row"></th>
      <td><img src="../assets/img/maillot8.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td><img src="../assets/img/maillot9.png"
              class="avatar-compo border border-white  card-equipe-size card-img-top img-fluid p-2  rounded-pill"
              alt="avatar du joueur" title=""></td>
      <td></td>
      
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td> </td>
      <td></td>
    </tr>
    
    
    
  </tbody>
</table>








  <?php require '../public/cdn.php'?>
</body>

</html>