<?php
require '../Controllers/create_adminController.php';
require '../public/header.php';
?>

<body class="bg-admin">
	<?php require '../public/navbar.php'?>

	<p class="text-white rounded col-4 bg-dark mx-auto mt-4 mb-1 h1 text-center mb-5">Ajouter un entraineur</p>
	<!-- toast de validation / erreur -->
	<?=isset($createOk) ? $createOk : $createNotOk?>
	<!-- button de retour -->
	<a href="admins_liste.php">
		<button class="badge badge-dark border rounded-pill border-dark float-left"><i
				class="text-white fas fa-arrow-circle-left fa-2x"></i></button>
	</a>
	<!-- formulaire permettant d'utilisé les POST -->
	<form action="create_admin.php" method="POST">
		<div class="container text-white text-center">
			<div class="row">

				<div class="col-xl-5 col-md-6 col-sm-6 m-1 mx-auto mt-2">
					<div class="form-group edit-player-bg rounded p-2">
						<label class="control-label col-6" for="fname">Prénom</label>
						<input value="<?=isset($firstname) ? $firstname : ''?>" type="text" class="form-control"
							id="fname" name="firstname" placeholder="Ex: Jean">
						<small><?=isset($arrayError['firstname']) ? $arrayError['firstname'] : ''?></small>
					</div>
					<div class="form-group edit-player-bg rounded p-2">
						<label class="control-label" for="lname">Nom</label>
						<input value="<?=isset($lastname) ? $lastname : ''?>" type="text" class="form-control"
							id="lname" name="lastname" placeholder="Ex: Dupont">
						<small><?=isset($arrayError['lastname']) ? $arrayError['lastname'] : ''?></small>
					</div>


					<div class="form-group edit-player-bg rounded p-2">
						<label class="control-label col-6" for="mail">Adresse mail</label>
						<input value="<?=isset($mail) ? $mail : ''?>" type="text" class="form-control" id="mail"
							name="mail" placeholder="Ex: adresse@mail.com">
						<small><?=isset($arrayError['mail']) ? $arrayError['mail'] : ''?></small>
					</div>

					<div class="form-group edit-player-bg rounded p-2">
						<label class="control-label col-6" for="pwd">Mot de passe</label>
						<input value="<?=isset($pwd) ? $pwd : ''?>" type="password" class="form-control" id="pwd"
							name="pwd" placeholder="********">
						<small><?=isset($arrayError['pwd']) ? $arrayError['pwd'] : ''?></small>
					</div>
					<!-- button de validation addAdmin -->
					<button type="submit" class="btn bg-warning rounded text-white mx-auto" name="addAdmin"
						value="Ajouter un Entrainement">Ajouter un entraineur
					</button>
				</div>

			</div>
		</div>

	</form>






	<?php require '../public/footer.php'?>
	<?php require '../public/cdn.php'?>
</body>

</html>