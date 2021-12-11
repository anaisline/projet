<?php
session_start();
$id_admin=$_SESSION['id_admin'];
$id_article=$_GET['id_article'];
$id_acheteur=$_GET['id_acheteur'];

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
        
        <li><a href="accueilAdmin.php">Accueil</a></li>
        
        <li class="menu-deroulant">
 			<a href="parcourir.html">Gérer</a>
 			<ul class="sous-menu">
 				<li><a href="GestionVendeurAdmin.php">Les vendeurs</a></li>
 				<li><a href="gererArticlesAdmin.php">Mes articles</a></li>
 			</ul>
 			</li>


        <li >
            <a href="notifAdmin.php">Notifications</a>
        </li>


        <li class="menu-deroulant">
            <a href="#">Mon compte</a>
            <ul class="sous-menu">

               <li><a href="profil_admin.php">Mon profil</a></li>
               <li><a href="connexionAcheteur.php">Se deconnecter</a></li>
           </ul>	
       </li>

   </ul>

		</div>

		<div>
			<h2 align=center> Negocier un article</h2>
				

			<form action="contreOffreAdmin_2.php" method="post" align=center>
				
				<table align=center>
					<?php
						$sql = "SELECT * from nego WHERE (id_acheteur = '$id_acheteur') AND (id_article='$id_article') AND (id_vendeur='$id_admin')";
						$result = mysqli_query($db_handle, $sql);
						if(mysqli_num_rows($result)!= 0)
						{
							$data = mysqli_fetch_assoc($result);
						}
						else
						{
							echo "on ne trouve pas cet article a negocier";
						}
						
					?>


					<tr>
						<td><label>Offre article <span class="required"></span></label></td>
						<td><input type="int" name="offre" class="field-long" placeholder="<?php echo $data['offre']; ?>" />
						</td>
					</tr>

				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="envoyer" value="Envoyer">
					</td>

				</tr>
				
			</table>
		</form>
	</div>

	<?php
	$_SESSION['id_article']=$id_article;
	$_SESSION['id_acheteur']=$id_acheteur;

?>
	
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