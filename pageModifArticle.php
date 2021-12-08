<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<meta charset="utf-8">
	<link href="profil_vendeur.css" rel="stylesheet" type="text/css"/>
	<title>Fray Her</title>
</head>
<body>

	<!-- wrapper area -->
	<div id="wrapper">

		<div id="header">
			<p>
				<font>
					Fray Her
				</font>
			</p>
		</div>
		<br>
		<div id="nav">
			<ul>
				<li><a href="accueilVendeur.php">Accueil</a></li>

				<li >
					<a href="gererArticlesVendeur.php">Gerer mes articles</a>
				</li>


				<li><a href="#">Messagerie</a></li>


				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="profil.php">Mon profil</a></li>
						<li><a href="#">Se deconnecter</a></li>
					</ul>	
				</li>

			</ul>

		</div>


		<?php 

		//$sql = "SELECT * from adresse WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur')";
		//$result = mysqli_query($db_handle, $sql);
		//$data= mysqli_fetch_assoc($result);
		
		

		?>

		<div class="container rounded bg-black mt-8 mb-8">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-5 ">
						<div class="d-flex flex-column align-items-center text-center p-3 py-5">
							<img class="rounded-circle mt-5" width="150px" src= " ">
							<span class="font-weight-bold"> </span><span> </span></div>

						</div>
						<div class="col-md-5 ">
							<div class="p-3 py-5">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<h4 class="text-right">Modifier mon article</h4>
								</div>
							<div class="row mt-2">
								<div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control"  name="nom" value=" "></div>

								<div class="col-md-6"><label class="labels">Prix</label><input type="int" class="form-control"  name="prix" value=" "></div>
							</div>
							<div class="row mt-2">
								<div class="col-md-6"><label class="labels">Photo 1</label><input type="text" class="form-control"  name="photo1" value=" "></div>

								<div class="col-md-6"><label class="labels">Photo 1</label><input type="text" class="form-control"  name="photo2" value=" "></div>
							</div>
							<div class="row mt-2">
								<div class="col-md-6"><label class="labels">Categorie(</label><input type="text" class="form-control"  name="mail" value=" "></div>

								<div class="col-md-6"><label class="labels">Mot de passe</label><input type="text" class="form-control"  name="mdp" value=" "></div>
							</div>
							<div class="row mt-3">
								<div class="col-md-12"><label class="labels">Description</label>
									<input type="text" class="form-control" name="description" value=" ">
								</div>
							</div>

							<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="bouton1">Enregistrer les modifications</button></div>

						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
<br><br><br>



<div id="footer">
	<!--Copyright &copy; 2021 Prime Properties<br> -->

	<dd>
		<ul>
			<li>
				<p align=left>
					Qui sommes-nous ?<br><br>
					Nous sommes un groupe d'étudiants qui avons<br> pour but de créer un site internet pour vous permettre de<br> faire votre shopping facilement.<br>
					Nous avons réfléchi à ce dont vous pourriez avoir<br> besoin et il nous est apparu que nous avons beaucoup <br>de difficultés à faire hanter les personnes qui le méritent...<br>
					<p align=right>
						Alors nous voila !
					</p>
				</p>
			</li>
			<li>
				<p class="contact">Nous contacter: <br><br>
					<a href="mailto:paris.shopping@gmail.com">paris.shopping@gmail.com</a><br>
					67 avenue Henri Martin 75016 PARIS<br>
					02 37 60 03 10<br>

				</p>

			</li>
			<li>
				<p>
					Instagram des auteurs :<br>
					<br> <a href="https://www.instagram.com/anaisline_/" class="button">> anaisline_</a>
					<br> <a href="https://www.instagram.com/marine_rhd/" class="button">> marine_rhd</a>
					<br> <a href="https://www.instagram.com/benji.lvld/" class="button">> benji.lvld</a>
				</p>
			</li>
		</ul>
	</dd>
</div>

</div>

</body>
</html>