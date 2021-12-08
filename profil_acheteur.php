<?php
session_start();
$id_acheteur=$_SESSION['id_acheteur'];

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
    <li><a href="accueil_acheteur.html">Accueil</a></li>

    <li class="menu-deroulant">

        <a href="">Parcourir les categories</a>
        <ul class="sous-menu">
         <li><a href="#">Poupees</a></li>
         <li><a href="#">Jeux</a></li>
         <li><a href="#">Insolite</a></li>
         <li><a href="#">Tout parcourir</a></li>
     </ul>
 </li>

<li><a href="">Messagerie</a></li>

<li><a href="">Panier</a></li>

<li class="menu-deroulant">
    <a href="#">Mon compte</a>
    <ul class="sous-menu">
     <li><a href="profil_acheteur.php">Ma page</a></li>
     <li><a href="connexionAcheteur.php">Se deconnecter</a></li>
 </ul>	
</li>

</ul>

</div>


		<?php 

		$sql = "SELECT * from adresse WHERE id_adresse=(select id_adresse from acheteur where id_acheteur='$id_acheteur')";
		$result = mysqli_query($db_handle, $sql);
		$data= mysqli_fetch_assoc($result);
		$ville = $data['ville'];
		$code = $data['code_postal'];
		$adresse = $data['adresse_l1'];

		$sql = "SELECT * from cb WHERE id_cb=(select id_cb from acheteur where id_acheteur='$id_acheteur')";
		$result = mysqli_query($db_handle, $sql);
		$data= mysqli_fetch_assoc($result);
		$codeCarte = $data['code_secu'];
		$num = $data['numero_cb'];
		$nomCarte = $data['nom'];
		$type = $data['type'];
		$dateExp = $data['dateExp'];


		$sql = "SELECT * from acheteur WHERE (id_acheteur = '$id_acheteur')";
		$result = mysqli_query($db_handle, $sql);


		$data = mysqli_fetch_assoc($result);
		$image = $data['photo'];
		if($image==" " || $image=="")
		{
			$image="photos/avatar.jpg";
		}

		

		?>

		<div class="container rounded bg-black mt-8 mb-8">
			<form action="verifModifProfilAcheteur.php" method="post">
				<div class="row">
					<div class="col-md-5 ">
						<div class="d-flex flex-column align-items-center text-center p-3 py-5">
							<img class="rounded-circle mt-5" width="150px" src= "<?php echo $image; ?>">
							<span class="font-weight-bold"><?php echo $data['prenom']." ".$data['nom']; ?></span><span> </span></div>
							<div class="mt-20 text-center"><button class="btn btn-primary profile-button" type="submit" name="bouton3">Supprimer la photo</button></div>
							<br>
							<div class="mt-20 text-center"><button class="btn btn-primary profile-button" type="submit" name="bouton4">Supprimer la CB</button></div>
						</div>
						<div class="col-md-5 ">
							<div class="p-3 py-5">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<h4 class="text-right">Paramètres du profil acheteur</h4>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control"  name="prenom" value="<?php echo $data['prenom']; ?>"></div>

									<div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control"  name="nom" value="<?php echo $data['nom']; ?>"></div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">URL photo de profil</label><input type="text" class="form-control"  name="photo" value="<?php echo $data['photo']; ?>"></div>

									<div class="col-md-6"><label class="labels">Téléphone</label><input type="text" class="form-control"  name="tel" value="<?php echo $data['tel']; ?>"></div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Mail</label><input type="email" class="form-control"  name="mail" value="<?php echo $data['mail']; ?>"></div>

									<div class="col-md-6"><label class="labels">Mot de passe</label><input type="text" class="form-control"  name="mdp" value="<?php echo $data['mdp']; ?>"></div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Adresse</label><input type="text" class="form-control"  name="adresse" value="<?php echo $adresse; ?> "></div>

									<div class="col-md-6"><label class="labels">Code Postal</label><input type="text" class="form-control"  name="codepostal" value="<?php echo $code; ?>"></div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Ville</label><input type="text" class="form-control"  name="ville" value="<?php echo $ville; ?>"></div>

								</div>
								<br>
								<div class="d-flex justify-content-between align-items-center mb-3">
									<h4 class="text-right">Paramètres de la carte bancaire</h4>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Titulaire de la carte</label><input type="text" class="form-control"  name="carteNom" value="<?php echo $nomCarte; ?>"></div>

									<div class="col-md-6">
										<label class="labels">Type de carte(Visa, MasterCard, American Express, PayPal)</label><input type="text" class="form-control"  name="carteType" value="<?php echo $type; ?>"></div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Numéro de CB</label><input type="text" class="form-control"  name="numCB" value="<?php echo $num; ?>"></div>

									<div class="col-md-6"><label class="labels">Code de sécurité</label><input type="text" class="form-control"  name="codeCarte" value="<?php echo $codeCarte; ?>"></div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6"><label class="labels">Date d'expiration</label><input type="date" class="form-control"  name="dateExp" value="<?php echo $dateExp; ?>"></div>

								</div>


							</div>
							<?php
							if(isset($_GET['erreur'])){
								$err = $_GET['erreur'];
								if($err==1)
									echo "<p style='color:red'>Ce mail existe deja.</p>";
								if($err==2)
									echo "<p style='color:red'>Veuillez entrer un type de carte valide.</p>";
							}
							?>

							<div class="mt-1 text-center"><button class="btn btn-primary profile-button" type="submit" name="bouton1">Enregistrer les modifications</button></div>

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



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