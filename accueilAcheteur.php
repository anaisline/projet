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

         <li><a href="CatégoriesPoupées.php">Poupees</a></li>
         <li><a href="CatégoriesJeux.php">Jeux</a></li>
         <li><a href="CatégoriesInsolite.php">Insolite</a></li>
         <li><a href="CatégorieAll.php">Tout parcourir</a></li>

         </li>
     </ul>
 

<li><a href="notifications.php">Notifications</a></li>

<li><a href="">Panier</a></li>

<li class="menu-deroulant">
    <a href="#">Mon compte</a>
    <ul class="sous-menu">
     <li><a href="profil_acheteur.php">Ma page</a></li>
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

<section class="carousel">
    <ul class="carousel-items">
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">My awesome article</h2>
                <img src="https://static.fnac-static.com/multimedia/Images/FD/Comete/135843/CCP_IMG_ORIGINAL/1781817.gif" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button" color=white>Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">Just another awesome article</h2>
                <img src="https://lpcm.hypotheses.org/files/2018/12/horreurth%C3%A9ologie-672x372.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">Yet another awesome article</h2>
                <img src="https://static.actu.fr/uploads/2019/06/nuit-horreur-kinepolis-lille-lomme-960x640.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">Wow! Another awesome article</h2>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSurdyCUhfrjlpp7SNmyfquFapmX_Z8kc42IQ&usqp=CAU" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">That's some awesome article</h2>
                <img src="Montagne.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">Just a lot or articles !</h2>
                <img src="Montagne.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">One more, one more !</h2>
                <img src="Montagne.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">Again !</h2>
                <img src="Montagne.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
        <li class="carousel-item">
            <div class="card">
                <h2 class="card-title">One last</h2>
                <img src="Montagne.jpg" />
                <div class="card-content">
                    <p>Mewl for food at 4am chase mice. Scratch leg; meow for can opener to feed me purr when being pet nya nya nyan catasstrophe, fooled again thinking the dog likes me cough hairball on conveniently placed pants.</p>
                    <a href="#" class="button">Read more</a>
                </div>
            </div>
        </li>
    </ul>
</section>

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