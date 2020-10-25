<?php
session_start();

$id=htmlspecialchars($_GET['id']);

//connexion à la BDD
include 'bdd_connect.php';

$sth = $dbh->prepare("SELECT nom,biographie, id, nb, photo, titre, pays FROM realisateur INNER JOIN films ON realisateur.nom=films.realisateur WHERE nom =:nom"); //Requête
$valeurs = array( 'nom' => $id); //Array pour éviter les problèmes
$sth->execute($valeurs); //Exécution de la requête avec l'array

$arr = $sth->fetchAll();// Récupération des informations requises

$count = $sth->rowCount();

  

?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="real.css">

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
        <title> CHERIFURAWA MOVIES - realisateur </title>

    <body>
          <div class="site-container">
        <header>       

          <?php
            if (isset($_SESSION['user']) && isset($_SESSION['id'])) { 
          ?>
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
         
      <div id="text"> <p> 🌸  Vous visionez la page du realisateur <b> <?php echo $arr[0]['nom']; ?> </b> ! 🌸  </p> </div>
        
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



  <div id="images">
<div id="description">
         <div id="image2" ><img id="img_film" src="<?php echo $arr[0]['photo']; ?>"  /> 
         </div> 

</div>
</div>


 <div id="film" > 

<h1> <?php echo $arr[0]['nom']; ?> </h1>
<ul> 
  <li> <h3> Biographie </h3> </li> 
  <p style="margin-right:10px;text-align: justify;"> <?php echo $arr[0]['biographie']; ?></p>

  <li> <h3> Film(s) réalisé(s) </h3> </li>
  <p> <?php
echo "<ul>";
for ($i=0; $i < $count ; $i++) { 
  echo '<li><a href="film.php?id=' . $arr[$i]['id'] . '">' .$arr[$i]['titre']. '</a></li>' ;
}
echo "</ul>";
?></p>

</ul></div>




</section>


  <div id=audio> 
  <audio loop autoplay="" width="10" volume="1">
  <source src="son/B.mp3" type="audio/mpeg">
  </audio>
  </div>
    </main>
        <footer>

<img src="images/pandadebout.png" id="logofooter"/>

<div id="copy"> <p>&copy; 2020 lélé et GuiGui. tous droits réservés. </p></div> 

<div id="oui" > <a href="contact.php"> <p><b> Nous contacter </b></p> </a> </div>

<div id="oui2"> <a href="index.php"><b> Aller vers l'accueil </b></p> </a> </p> </div>
        
        </footer>

      </div>
    </body>
</html>