<?php
session_start();
$id_vendeur=$_SESSION['id_vendeur'];

$database = "shopping";
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$mysqli = new mysqli("localhost", "root", "", "shopping");
    $mysqli -> set_charset("utf8");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="notifVendeur.css" rel="stylesheet" type="text/css"/>
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

        <li >
            <a href="notifVendeur.php">Notifications</a>
        </li>


        <li class="menu-deroulant">
            <a href="#">Mon compte</a>
            <ul class="sous-menu">

               <li><a href="profil_vendeur.php">Mon profil</a></li>
               <li><a href="connexionAcheteur.php">Se deconnecter</a></li>
           </ul>	
       </li>

   </ul>

</div>

<div id="section" align="center">
	<h2 align="left">Vos notifications</h2>
	<table align=center>


<?php

if($db_found) {


$compt1=1;
$compt3=3;
$compt5=5;
$accepte=0;


$sql="SELECT * FROM nego WHERE (id_vendeur='$id_vendeur') AND (compteur='$compt1' || compteur='$compt3'|| compteur='$compt5') AND (accepte='$accepte')";
$result = mysqli_query($db_handle, $sql);
$resultat = $mysqli -> query($sql);


while ($ligne = $resultat -> fetch_assoc()) {
        

if (mysqli_num_rows($result) != 0) {


	$offre=$ligne['offre'];
	$id_article=$ligne['id_article'];
	$id_acheteur=$ligne['id_acheteur'];
	$compt=$ligne['compteur'];


	$sqlA="SELECT * FROM article_vendeur WHERE (id_article='$id_article') AND (id_vendeur='$id_vendeur') ";
	$resultA = mysqli_query($db_handle, $sqlA);
	$dataA=mysqli_fetch_assoc($resultA);

	if(mysqli_num_rows($resultA) != 0 )
	{
		$nom=$dataA['nom'];


		echo "Votre article " .$nom. " a eu une offre a ".$offre. " euros<br>";

		

		if($compt!=5)
		{
	
		?>

		<tr>
			<td colspan="2" align="center">
			<?php
               echo "<a href='contreOffre.php?id_article=".$id_article."&id_acheteur=".$id_acheteur." '>Faire une contre offre</a>";
           ?>
			</td>
		</tr>

		<?php	
			}

				if($compt==5)
				{
		?>
	
		<tr>
			<td colspan="2" align="center">
			<?php
               echo "<a href='refuserNego.php?id_article=".$id_article."&id_acheteur=".$id_acheteur." '>Refuser l offre</a>";
           ?>
			</td>
		</tr>

		<?php

		}

		?>
	
		<tr>
			<td colspan="2" align="center">
			<p align="center">ou</p>
			<?php
               echo "<a href='accepteNego.php?id_article=".$id_article."&id_acheteur=".$id_acheteur." '>Accepter l offre</a>";
           ?>
			</td>
		</tr>
		

<?php
	}
	else
	{
		echo "On ne trouve pas l'article";
	}
	
}
else
{
	echo "Vous n avez pas d offres sur vos articles";
}
}

}
else
{
	echo "Erreur de connexion";
}

	
?>

</table>

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