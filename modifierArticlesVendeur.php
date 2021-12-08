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
	<link href="ajouterArticlesVendeur.css" rel="stylesheet" type="text/css"/>
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
 			<a href="gererArticlesVendeur.php">Gerer mes articles</a>
 			</li>

 			
 			<li><a href="#">Messagerie</a></li>


 			<li class="menu-deroulant">
 			<a href="#">Mon compte</a>
 			<ul class="sous-menu">
 				<li><a href="profil_vendeur.php">Mon profil</a></li>
 				<li><a href="connexionAcheteur.php">Se deconnecter</a></li>
 			</ul>	
 			</li>
 		
 		</ul>

 	</div>

 	<div id="section" align=center>

 		<h2>Entrer les informations de l article que vous voulez modifier</h2> 

 		<form action="regarderArticle.php" method="post">
			<table>
				<?php


						

						$sql = "SELECT * from vendeur WHERE (id_vendeur = '$id_vendeur')";
						$result = mysqli_query($db_handle, $sql);
						$data = mysqli_fetch_assoc($result);
				?>

				<tr>
    			 <td><label>Nom <span class="required">*</span></label></td>
        		 <td><input type="text" name="nom" class="field-long" value="<?php echo $data['nom']; ?>" />
   				 </td>
   				</tr>

    			
   				<tr> 
   				 <td><label>Categorie <span class="required">*</span></label></td>
      			  <td><select name="categorie_type" class="field-select" >
      			  <option value="poupees">Poupees</option>
      			  <option value="jeux">Jeux</option>
      			  <option value="insolites">Insolites</option>
      			  </select>
   				 </td>
   				</tr>

   				<tr> 
   				 <td><label>Type d achat<span class="required">*</span></label></td>
      			  <td><select name="categorie_achat" class="field-select" >
      			  <option value="immediat">Immediat</option>
      			  <option value="negociable">Negociable</option>
      			  <option value="meilleur_prix">Meilleur prix</option>
      			  </select>
   				 </td>
   				</tr>

   				<?php
   				if(isset($_GET['erreur'])){
				$err = $_GET['erreur'];
				if($err==1)
					echo "<p style='color:red'>Cet article n'existe pas.</p>";
			}
			?>

				<tr>
				<td colspan="2" align="center">

				<input type="submit" name="modifier" value="modifier">

			 	</td>

				</tr>

			</table>
		</form>
 		
	</div>
	<br><br>

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