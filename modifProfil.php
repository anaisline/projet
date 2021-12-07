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

		<div id="nav">
			<ul>
				<li><a href="accueilVendeur.php">Accueil</a></li>

				<li >
					<a href="parcourir.html">Gerer mes articles</a>
				</li>


				<li><a href="#">Messagerie</a></li>


				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="#">Mon profil</a></li>
						<li><a href="connexionAcheteur.php">Se deconnecter</a></li>
					</ul>	
				</li>

			</ul>

		</div>

		<div>
			<h2 align=center> Modifier le profil<h2>
				

			<form action="verifModifProfil.php" method="post" align=center>
				<table align=center>

					<tr>
						<td><label>Photo de profil <span class="required"></span></label></td>
						<?php
						$sql = "SELECT * from vendeur WHERE (id_vendeur = '$id_vendeur')";
						$result = mysqli_query($db_handle, $sql);
						$data = mysqli_fetch_assoc($result);
						?>

						 <!--"<td>"."<input type="text" name="photo" class="field-long" value ="" />";-->
						 	<td><input type = "text" name ="photo" value = "<?php echo $data['photo']; ?>" >
						</td>
					</tr>

					<tr>
						<td><label>Nom <span class="required"></span></label></td>
						<td><input type="text" name="nom" class="field-long" value="<?php echo $data['nom']; ?>" />
						</td>
					</tr>
					<tr>
						<td><label>Prenom <span class="required"></span></label></td>
						<td><input type="text" name="prenom" class="field-long" value="<?php echo $data['prenom']; ?>" />
						</td>
					</tr>

					<td><label>Description <span class="required"></span></label></td>
					<td><input type="text" name="description" class="field-long" value="<?php echo $data['description']; ?>" />
					</td>
				</tr>




				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="Enregistrer" value="Enregistrer">
					</td>

				</tr>

			</table>
		</form>
	

	</div>
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