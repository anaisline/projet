<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="gererArticlesVendeur.css" rel="stylesheet" type="text/css"/>
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
 			<li><a href="accueilAdmin.php">Accueil</a></li>
           
 			<li class="menu-deroulant">
 			<a href="parcourir.html">Gérer</a>
 			<ul class="sous-menu">
 				<li><a href="GestionVendeurAdmin.php">Les vendeurs</a></li>
 				<li><a href="gererArticlesAdmin.php">Mes articles</a></li>
 			</ul>
 			</li>

 			
 			<li><a href="messagerieAdmin.html">Messagerie</a></li>

 			<li class="menu-deroulant">
 			<a href="#">Mon compte</a>
 			<ul class="sous-menu">
 				<li><a href="profil_admin.php">Mon profil</a></li>
 				<li><a href="connexionAcheteur.php">Se déconnecter</a></li>
 			</ul>	
 			</li>
 		
 		</ul>

 	</div>

 	<div id="section" align=center>


			<table>
				<tr>
				<td colspan="2" align="center">
				<a href="ajouterArticlesAdmin.php"><input type="submit" name="ajouter" value="ajouter"></a>
				<a href="#"><input type="submit" name="modifier" value="modifier"></a>
				<a href="supprimerArticlesAdmin.php"><input type="submit" name="supprimer" value="supprimer"></a>
			 	</td>

				</tr>

			
			</table>
	
 		

	</div>

	



	<div id="footer">

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

</body>
</html>