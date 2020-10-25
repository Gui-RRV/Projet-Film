<?php
session_start();
// connexion à la BDD
include 'bdd_connect.php';




function affichage($row) // Permet d'afficher les titre des films ainsi que leurs infos
{
  ?>

<div id="images">
<div id="description">
         <div id="image" ><img src= "<?php echo $row['image'];?>"  width="250" height="400"/> 
         <div> 

  <p><b> Titre : </b>
  <?php echo $row['titre'];?> </p>

 <p><b> Année de sortie : </b>
  <?php echo $row['date'];?> </p>
 
 <p><b> Origine : </b>
  <?php echo $row['pays'];?> </p>

  <p><b> Note : </b>
  <?php echo number_format($row['notefi'],1);?> </p>

  <p><b> Réalisateur : </b>
  <?php echo $row['realisateur'];?> </p>

    <p><b> <?php echo '<a href="film.php?id=' . $row['id'] . '">Accéder à la page du film</a>';?> </b>
   </p>

</div>
</div>
</div>
</div>

<?php
}
?>

<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stylepagedaccueil.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">


         <link rel="icon" type="image/png" href="images/PANDA NETFLOUX.png">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">

function myFunction(x) {
  x.classList.toggle("#change");
}

    $(document).ready(function(){
      $("#container").click(function(){
          $("nav").slideToggle("Slow");
    });
    });

    $(document).ready(function(){
      $("nav").hide();
    });

$(document).ready(function(){
    $("#pays1").hover(function(){
        $(this).css("color", "white");
    },function(){
        $("#pays1").css("color","black");
     
     });
     });

$(document).ready(function(){
    $("#pays2").hover(function(){
        $(this).css("color", "white");
    },function(){
        $("#pays2").css("color","black");
     
     });
     });

$(document).ready(function(){
    $("#pays3").hover(function(){
        $(this).css("color", "white");
    },function(){
        $("#pays3").css("color","black");
     
     });
     });

$(document).ready(function(){
    $("#blanc").hover(function(){
        $(this).css("color", "white");
    },function(){
        $("#blanc").css("color","black");
     
     });
     });

     $(document).ready(function(){
      $("nav").mouseleave(function(){
          $(this).slideUp("Slow");
    });
    });

   $(document).ready(function(){
    $("#test").hide();

    });

   $(document).ready(function(){
    $("#test2").hide();

    });

    $(document).ready(function(){
      $("#moncompte").click(function(){
      	$("#test").slideToggle("Slow");
          $("#test2").slideToggle("Slow");
    });
    });

     $(document).ready(function(){
       $("#disparu").mouseleave(function(){
          $("#test").slideUp("Slow");
            $("#test2").slideUp("Slow");
    });
    });

  </script>

        <title> CHERIFURAWA MOVIES </title>
    </head>

    <body>
      <div class="site-container">
        <header>   
<?php


if (isset($_SESSION['user']) && isset($_SESSION['id'])) { //Si l'utilisateur est connecté alors on affiche son pseudo à la place de "mon compte" et on lui permet d'accéder à son profil ainsi que la possiblité de se déconnecter  ?>
          <div id="disparu">

      <div id="moncompte" ><a href="#" target=""> <p> <?php echo $_SESSION['user']; ?> </p> </a></div>
 
            <div id="test" ><a href="profil.php" target=""> <p> Mon profil </p> </a></div>

            <div id="test2" ><a href="deco.php" target=""> <p> Déconnexion </p> </a></div>

            </div>
  <?php 
}else{ 
  ?>
          <div id="disparu">

      <div id="moncompte" ><a href="#" target=""> <p> mon compte </p> </a></div>
 
            <div id="test" ><a href="inscription.php" target=""> <p> inscription </p> </a></div>

            <div id="test2" ><a href="connexion.php" target=""> <p> connexion </p> </a></div>

            </div>
  <?php
}
?>



            <div id="logo"> <img src="images/PANDA NETFLOUX.png" width="210px" height="210px"></div>

            <div id="text"> <p> 🌸 Votre site de films et de review asiatique ! 🌸 </p> </div>


  <div id="container" onclick="myFunction(this)">
  <div id="bar1"></div>
  <div id="bar2"></div>
  <div id="bar3"></div>

<nav>

<div id="menu">
        <ul>

<div id="un">
          <p><a href="pays.php?pays=kr" id="pays1"> Coréen 🇰🇷 </a></p>  

          <a href="film.php?id=1" id="blanc"> <p>Parasite</a></p>
          <a href="film.php?id=2" id="blanc"> <p>Okja</a></p>
          <a href="film.php?id=3" id="blanc"> <p>Le dernier train pour Busan</a></p>
          <a href="film.php?id=4" id="blanc"> <p>Hard Day</a></p>
          <a href="film.php?id=5" id="blanc"> <p>New World</a></p>
</div>        
        
<div id="deux">
        <p><a href="pays.php?pays=jap" id="pays2">Japonais 🇯🇵 </a></p>
        
         <p><a href="film.php?id=14" id="blanc"> Kiki la petit sorcière </a></p>
         <p><a href="film.php?id=15"id="blanc"> Le chateau dans le ciel </a></p>
         <p><a href="film.php?id=12" id="blanc"> Summer Wars </a></p>
         <p><a href="film.php?id=11" id="blanc"> Your Name </a></p>
         <p><a href="film.php?id=13" id="blanc"> Le Voyage de Chihiro</a></p>
</div>       
         

<div id="trois">
         <p><a href="pays.php?pays=cn" id="pays3"> Chinois 🇨🇳  </a></p>

          <a href="film.php?id=6" id="blanc"> <p> The assassin </a></p>
          <a href="film.php?id=8" id="blanc"> <p> Ip Man </a></p>
          <a href="film.php?id=7" id="blanc"> <p> Le prommeneur d'oiseau </a></p>
          <a href="film.php?id=10" id="blanc"> <p> Combat de maitre </a></p>
          <a href="film.php?id=9" id="blanc"> <p> Beijing Bicycle </a></p>
</div>  
</div>    

</nav>
</header>
<main class="site-content">
<section>
<div id=propo > <p> À propos de <b> CHERIFURAWA MOVIES </b> 🌸 🐼 
 
<p> Ce site internet a été créé en <b> Avril 2020 </b> </p>
<p> Par deux étudiants <b> (Lélé et GuiGui)</b> de MMI (Métiers du Multimédia et de l'Internet) passionnés par la <i><b> culture asiatique </b></i>... </p>
<p> Vous retrouverez sur ce site internet une sélection de <b> 15 films </b> <i> Coréen</i>, <i>Japonais</i> et <i>Chinois</i> choisis par nos soins. </p>
<p> Surtout n'hésitez pas à vous <b> inscrire </b> afin laisser des <b> notes </b> et des <b> commentaires </b> sur les films. Nous les lirons avec attention ! </p>
<p> <b> Bonne visite </b> et <b> bon visionage </b> ! </p>

</div>
</section>

<br></br> 

<section>
	 <div id="liste"> <form method="post" action="pays.php">
	 				  <label for="pays">
	 				  Quel pays voulez vous ? </label>
            <select class="forms" id="pays" name="pays">
            <option value="jap">Films Japonais</option>
            <option value="kr">Films coréens</option>
            <option value="cn">Films chinois</option>
            <?php if (isset($_SESSION['user']) && isset($_SESSION['id'])) 
            echo '<option value="all">Films favoris</option>';
            ?>
            </select>
	 				  <input class="forms" type="submit" value="Valider">
	 				  </form>
	 </div>

   <div id="liste"> <form method="post" action="genre.php" >
            <label for="genre">
            Quel genre voulez vous ?</label>
            <select class="forms" id="genre" name="genre">
            <option value="hum">Humour/Comédie</option>
            <option value="dra">Drame</option>
            <option value="ani">Animation</option>
            <option value="ave">Aventure/Fantastique</option>
            <option value="thri">Thriller</option>
            <option value="cbt">Combat action</option>
            <option value="tt">Tout </option>
            </select>
            <input class="forms" type="submit" value="Valider">
            </form>
   </div>

  <div id="liste"> <form method="POST" action="note.php" >
            <label for="pays">
            Trier par note : </label>

            <select class="forms" id="note" name="note" > 
            <option value="bien" > Un film comme ça :👍🤩 </option>
            <option value="mauvais" > Un film comme ça : 👎😵</option>
            </select>
            <input class="forms" type="submit" name="VALIDER">
            </form>
   </div>

     <div id="liste"> <form method="POST" action="date.php" >
            <label for="pays">
            Trier par date de sortie : </label>
            <select class="forms" id="tri" name="tri" > 
            <option value="rc" > Du plus récent au plus ancien </option>
            <option value="vx" > Du plus ancien au plus récent </option>
            </select>
            <input class="forms"  type="submit" name="VALIDER">
            </form>
   </div>

         <div id="liste"> <form method="post" action="recherche.php"> 
        <label for="recherche"> cherchez par mot clef </label>
        <input class="forms" type="text" name="search">
        <input class="forms" type="submit" name="valider">
        </form>
    </div>

</section>

<section>
	<?php

  //selection de la table films et des données voulues (tout les films ici)
$sth = $dbh->prepare('SELECT *, note/votes as notefi FROM films ');

$valeurs = $sth->fetchAll();
$sth->execute();







// affichage des films
while ($row = $sth->fetch()) {

echo affichage($row);

  }




?>

</section>

  
  <div id=audio> 
  <audio loop autoplay="" width="10" volume="1">
  <source src="son/B.mp3" type="audio/mpeg">
  </audio>
  </div>
</main>
        <footer>

<img src="images/pandadebout.png" id="logofooter"/>

<div id="copy" > <p>&copy; 2020 lélé et GuiGui. tous droits réservés. </p></div><div id="oui" > <a href="contact.php"> <p><b> Nous contacter </b></p> </a> </div> 
        
        </footer>
</div>

    </body>
</html>