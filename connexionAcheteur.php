


<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<link href="connexionAcheteur.css" rel="stylesheet" type="text/css"/>
	<title>Paris Shopping</title>
</head>
<body>
	<div id="header">
		<!--<img src="logo.gif" alt="Paris Shopping" width="650" height="100"/> -->
		<h1> Paris Shopping </h1>
	</div>
	
	<div id="nav">
		<ul>
			<li><a href="accueil.html">Accueil</a></li>

			<li class="menu-deroulant">
				<a href="parcourir.html">Parcourir les categories</a>
				<ul class="sous-menu">
					<li><a href="#">Poupees</a></li>
					<li><a href="#">Jeux</a></li>
					<li><a href="#">Insolite</a></li>
					<li><a href="#">Tout parcourir</a></li>
				</ul>
			</li>


			<li><a href="messagerieSansConnexion.html">Messagerie</a></li>

			<li><a href="panierSansConnexion.html">Panier</a></li>

			<li class="menu-deroulant">
				<a href="#">Mon compte</a>
				<ul class="sous-menu">
					<li><a href="connexionAcheteur.html">Se connecter</a></li>
					<li><a href="nouveauClient.html">Creer son compte</a></li>
				</ul>	
			</li>

		</ul>
	</div>

	<div id="section">
		<h2>Deja client Paris Shopping ?</h2>


		<form action="connecterAcheteur.php"  method="post">
			<table>
				<tr>
					<td>Email</td>
					<td><input type="email" name="mail" placeholder="Entrer son adresse mail"></td>
				</tr>
				<tr>
					<td>Mot de passe</td>
					<td><input type="password" name="mdp" placeholder="Entrer son mot de passe"></td>
				</tr>

				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="bouton1" value="Se connecter"></td>
					</tr>
				</table>
			</form>
			<?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>


			<p>Nouveau client? Creer son compte <a href="nouveauClient.html">ici</a>.</p>

		</div>

		<div id="footer">
			<!--Copyright &copy; 2021 Prime Properties<br> -->

			<p class="contact">Nous contacter: <br><br>
				<a href="mailto:paris.shopping@gmail.com">paris.shopping@gmail.com</a><br>
				67 avenue Henri Martin 75016 PARIS<br>
				02 37 60 03 10<br>

			</p>
			<!--contact mail, tel , ...-->
		</div>

	</body>


	</html>

