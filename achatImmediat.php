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
	<meta charset="utf-8">
	<link href="nouveauClient.css" rel="stylesheet" type="text/css"/>
	<title>Fray Her</title>
</head>
<body>
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
				<li><a href="accueilAcheteur.html">Accueil</a></li>

				<li class="menu-deroulant">
					<a href="parcourir.html">Parcourir les categories</a>
					<ul class="sous-menu">
						<li><a href="#">Poupees</a></li>
						<li><a href="#">Jeux</a></li>
						<li><a href="#">Insolite</a></li>
						<li><a href="#">Tout parcourir</a></li>
					</ul>
				</li>


				<li><a href="#">Messagerie</a></li>

				<li><a href="#">Panier</a></li>

				<li class="menu-deroulant">
					<a href="#">Mon compte</a>
					<ul class="sous-menu">
						<li><a href="profil_acheteur.php">Mon profil</a></li>
						<li><a href="connexionAcheteur.php">Se deconnecter</a></li>
					</ul>	
				</li>

			</ul>
		</div>

		<div id="section" align=center>
			<form action="achatImmediat_2.php" method="post" align=center>
				<table align=center>

					<?php
						$sql = "SELECT * from acheteur WHERE (id_acheteur = '$id_acheteur')";
						$result = mysqli_query($db_handle, $sql);
						$data = mysqli_fetch_assoc($result);
					?>


						<h2>Vos informations personnelles</h2>
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

				

					<!--adresse est une table diff donc pas recup de la mm maniere-->
					
					<?php
						$id_adresse=$data['id_adresse'];
						$sqlA = "SELECT * from adresse WHERE (id_adresse = '$id_adresse')";
						$resultAdresse = mysqli_query($db_handle, $sqlA);
						$dataAdresse = mysqli_fetch_assoc($resultAdresse);
					?>
					<tr>
						<td><label>Adresse l1 <span class="required"></span></label></td>
						<td><input type="text" name="adresse_l1" class="field-long" value="<?php echo $dataAdresse['adresse_l1']; ?>" />
						</td>
					</tr>
					<tr>
						<td><label>Adresse l2 <span class="required"></span></label></td>
						<td><input type="text" name="adresse_l2" class="field-long" value="<?php echo $dataAdresse['adresse_l2']; ?>" />
						</td>
					</tr>

					<tr>
					<td><label>Ville <span class="required"></span></label></td>
					<td><input type="text" name="ville" class="field-long" value="<?php echo $dataAdresse['ville']; ?>" />
					</td>
					</tr>

					<tr>
					<td><label>Code postal <span class="required"></span></label></td>
					<td><input type="text" name="code_postal" class="field-long" value="<?php echo $dataAdresse['code_postal']; ?>" />
					</td>
					</tr>

					<tr>
					<td><label>Telephone <span class="required"></span></label></td>
					<td><input type="text" name="tel" class="field-long" value="<?php echo $data['tel']; ?>" />
					</td>
					</tr>
<!--
					<h3>Vos informations bancaires</h3>

					//cb est une table diff -->
					<?php
						$sqlCB = "SELECT * from cb WHERE (id_acheteur = '$id_acheteur')";
						$resultCB = mysqli_query($db_handle, $sqlCB);
						$dataCB = mysqli_fetch_assoc($resultCB);
					?>
					<tr>
					<td><label>Type de carte <span class="required"></span></label></td>
					<td><input type="text" name="type" class="field-long" value="<?php echo $dataCB['type']; ?>" />
					</td>
					</tr>

					<tr>
					<td><label>Numero de carte <span class="required"></span></label></td>
					<td><input type="text" name="numero_cb" class="field-long" value="<?php echo $dataCB['numero_cb']; ?>" />
					</td>
					</tr>

					<tr>
					<td><label>Nom sur la carte <span class="required"></span></label></td>
					<td><input type="text" name="nomCarte" class="field-long" value="<?php echo $dataCB['nom']; ?>" />
					</td>
					</tr>

					<tr>
					<td><label>Date d expiration <span class="required"></span></label></td>
					<td><input type="text" name="dateExp" class="field-long" value="<?php echo $dataCB['dateExp']; ?>" />
					</td>
					</tr>

					<tr>
					<td><label>Code de securite <span class="required"></span></label></td>
					<td><input type="text" name="code_secu" class="field-long" value="<?php echo $dataCB['code_secu']; ?>" />
					</td>
					</tr>

				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="acheter" value="Passer a la commande">
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