<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="CatégorieAllAcheteur.css" rel="stylesheet" type="text/css"/>
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

<h2>Poupées</h2>

<div id="section" align=center>

    <?php $compt=0; ?>

    <script>
        function send(){
            <?php $compt++; ?>
        }

    </script>

    <?php

    session_start();
    $id_acheteur=$_SESSION['id_acheteur'];

    $mysqli = new mysqli("localhost", "root", "", "shopping");
    $mysqli -> set_charset("utf8");
    $requeteVend = "SELECT * from article_vendeur";
    $resultat = $mysqli -> query($requeteVend);
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1){
            echo "<p style='color:red'>Vous avez déjà cet article dans votre panier</p>";
            $err=0;
        }
    }
            //afficher le resultat
    while ($ligne = $resultat -> fetch_assoc()) {
        if ($ligne['categorie_type'] == "poupees") {
        ?>
    <form action="AjouterPoupéesPanierAcheteurAdmin.php">
        <table>
            <tr align=center>
                <td colspan='2'>
                    <?php
                    echo $ligne['nom'];
                    ?>
                </td>
            </tr>
            

            <tr align=center>
                <td>
                    <?php
                    $recup = $ligne['id_article'];

                    $requPhoto = "SELECT adresse_photo from photo, article_vendeur where photo.id_article = $recup";
                    $resultatPhoto = $mysqli -> query($requPhoto);

                    $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                    $resCount = mysqli_query($mysqli, $count);
                    $data2 = mysqli_fetch_array($resCount);

                    for ($i=0; $i < $data2['numero']; $i++) { 
                        $ligne1 = $resultatPhoto -> fetch_assoc();
                        echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                    }

                    ?>
                </td>
                <td>
                    <?php
                    echo "Description : " . $ligne['description'];
                    ?>
                </td>
            </tr>
            <?php

            $recup = $ligne['id_vendeur'];

            $requNom = "SELECT * from vendeur where vendeur.id_vendeur = $recup";
            $resultatNom = $mysqli -> query($requNom);

            $ligne1 = $resultatNom -> fetch_assoc();
            $var = $ligne1['nom'];
            $var2 = $ligne1['prenom'];
            ?>

            <tr align=center>
                <td>
                        <?php
                        echo "<a href='VisiteProfilVendCo.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                        ?>
                </td>
                <td>
                    <?php
                    echo $ligne['prix'] . " euros";
                    ?>
                </td>
            </tr>

            <tr align=center>
                <td>
                    <?php
                    echo "Achat " . $ligne['categorie_achat'];
                    ?>
                </td>
                <td>
                    <?php
                    echo "Mis en vente le : " . $ligne['date'];
                    ?>
                </td>
            </tr>
            <tr align=center>
                <td colspan="2">
                    <?php
                    $var = $ligne['id_article'];
                    echo "<a href='AjouterPoupéesPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
                    ?>
                </td>
            </tr>

        </table>
    </form>

    <?php
    }}

    $mysqli = new mysqli("localhost", "root", "", "shopping");
    $mysqli -> set_charset("utf8");
    $requeteAdmin = "SELECT * from article_admin";
    $resultat = $mysqli -> query($requeteAdmin);
            //afficher le resultat
    while ($ligne = $resultat -> fetch_assoc()) {
        if ($ligne['categorie_type'] == "poupees") {
        ?>

        <form action="AjouterPoupéesPanierAcheteurAdmin.php" method="post">
            <table>
                <tr align=center>
                    <td colspan='2'>
                        <?php
                        echo $ligne['nom'];
                        ?>
                    </td>
                </tr>
                

                <tr align=center>
                    <td>
                        <?php
                        $recup = $ligne['id_article'];

                        $requPhoto = "SELECT adresse_photo from photo, article_admin where photo.id_article = $recup";
                        $resultatPhoto = $mysqli -> query($requPhoto);

                        $count = "SELECT count(id_photo) as numero from photo where photo.id_article = $recup";
                        $resCount = mysqli_query($mysqli, $count);
                        $data2 = mysqli_fetch_array($resCount);

                        for ($i=0; $i < $data2['numero']; $i++) { 
                            $ligne1 = $resultatPhoto -> fetch_assoc();
                            echo '<img src="'. $ligne1['adresse_photo'] .'" alt="" />';
                        }

                        ?>
                    </td>
                    <td>
                        <?php
                        echo "Description : " . $ligne['description'];
                        ?>
                    </td>
                </tr>
                <?php

                $recup = $ligne['id_admin'];

                $requNom = "SELECT * from administrateur where administrateur.id_admin = $recup";
                $resultatNom = $mysqli -> query($requNom);

                $ligne1 = $resultatNom -> fetch_assoc();
                $var = $ligne1['nom'];
                $var2 = $ligne1['prenom'];

                ?>

                <tr align=center>
                    <td>
                        <?php
                            echo "<a href='VisiteProfilAdminCo.php?nom=".$var."&prenom=".$var2." '>$var</a>";
                            ?>
                    </td>
                    <td>
                        <?php
                        echo $ligne['prix'] . " euros";
                        ?>
                    </td>
                </tr>

                <tr align=center>
                    <td>
                        <?php
                        echo "Achat " . $ligne['categorie_achat'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo "Mis en vente le : " . $ligne['date'];
                        ?>
                    </td>
                </tr>   
                <tr align=center>
                    <td colspan="2">
                        <!--<input type="submit" onclick="send()" name="AjouterPanier" value="Ajouter au panier">
                            <?php $_SESSION['infoIdArticle'] = $compt ?>-->

                            <?php
                            $var = $ligne['id_article'];
                            echo "<a href='AjouterPoupéesPanierAcheteurAdmin.php?id_article=".$var." '>Ajouter au panier</a>";
                            ?>
                    </td>
                </tr>         
            </table>
        </form>

        <?php
    }}
    $mysqli -> close();

    ?>
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