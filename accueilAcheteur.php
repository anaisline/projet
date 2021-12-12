<?php
    session_start();
    $id_acheteur=$_SESSION['id_acheteur'];

    ?>

    <!DOCTYPE html>
    <html>

    <head>
       <meta charset="utf-8">
       <link href="accueil.css" rel="stylesheet" type="text/css"/>
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
        <li><a href="accueilAcheteur.php">Accueil</a></li>

        <li class="menu-deroulant">

            <a href="">Parcourir les categories</a>
            <ul class="sous-menu">

                <li><a href="CatégoriesPoupéesAcheteur.php">Poupees</a></li>
                <li><a href="CatégoriesJeuxAcheteur.php">Jeux</a></li>
                <li><a href="CatégoriesInsolitesAcheteur.php">Insolite</a></li>
                <li><a href="CatégorieAllAcheteur.php">Tout parcourir</a></li>
            </ul>
        </li>
        
        <li><a href="notifications.php">Notifications</a></li>

        <li><a href="Panier_Acheteur.php">Panier</a></li>

        <li class="menu-deroulant">
            <a href="#">Mon compte</a>
            <ul class="sous-menu">
            <li><a href="profil_acheteur.php">Mon profil</a></li>
            <li><a href="connexionAcheteur.php">Se deconnecter</a></li>
            
        </li>
     </ul>
</div>



<div id="section" align=center>
   <p><br>Bonjour et bienvenue sur Fray Her, un site de vente et d achat en ligne de véritables objets hantés ! <br>
    Tout ce dont vous avez besoin pour effrayer vos amis ou faire du mal à vos ennemis sont disponibles sur notre site...<br>
    Que votre purge annuelle soit bonne...	
</p>
<p align=right style="color:red">
    Bonne chance...
</p>
<!--selection du jour -->
</div>

<?php

    $mysqli = new mysqli("localhost", "root", "", "shopping");
    $mysqli -> set_charset("utf8");
    
    echo '<section class="carousel">';
        echo '<ul class="carousel-items">';            
            $requeteVend = "SELECT * from article_admin order by article_admin.date";
            $resultat = $mysqli -> query($requeteVend);
                    //afficher le resultat
            while ($ligne = $resultat -> fetch_assoc()) {

                echo '<li class="carousel-item">';
                    echo '<div class="card">';

                        echo '<h2 class="card-title"> '.$ligne['nom'].' </h2>';
                        
                        $recup = $ligne['id_article'];

                        $requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = $recup";
                        $resultatPhoto = $mysqli -> query($requPhoto);

                        $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                        $resCount = mysqli_query($mysqli, $count);
                        $data2 = mysqli_fetch_array($resCount);

                        for ($i=0; $i < 1; $i++) { 
                            $ligne1 = $resultatPhoto -> fetch_assoc();
                            echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                        }
                        
                        echo '<div class="card-content">';
                            echo '<p> '.$ligne['description'].'</p>';
                            echo '<a href="CatégorieAllAcheteur.php" color=white>En savoir plus</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</li>';
            }


            $requeteVend = "SELECT * from article_vendeur order by article_vendeur.date";
            $resultat = $mysqli -> query($requeteVend);
                    //afficher le resultat
            while ($ligne = $resultat -> fetch_assoc()) {

                echo '<li class="carousel-item">';
                    echo '<div class="card">';

                        echo '<h2 class="card-title"> '.$ligne['nom'].' </h2>';
                        
                        $recup = $ligne['id_article'];

                        $requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = $recup";
                        $resultatPhoto = $mysqli -> query($requPhoto);

                        $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                        $resCount = mysqli_query($mysqli, $count);
                        $data2 = mysqli_fetch_array($resCount);

                        for ($i=0; $i < 1; $i++) { 
                            $ligne1 = $resultatPhoto -> fetch_assoc();
                            echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                        }
                        
                        echo '<div class="card-content">';
                            echo '<p> '.$ligne['description'].'</p>';
                            echo '<a href="CatégorieAllAcheteur.php" color=white>En savoir plus</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</li>';
            }
        echo '</ul>';
    echo '</section>';
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