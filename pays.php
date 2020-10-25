<?php
session_start();
 if (isset($_GET['pays'])) {
  $_POST['pays']=$_GET['pays'];
 }
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
if ($_POST['pays'] == 'jap') {
  $sth2 = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE  pays = ? ');
  $sth2->execute(['Japon']);
  $arr = $sth2->fetch();
  

}elseif ($_POST['pays']== 'kr') {
  $sth2 = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE  pays = ? ');
  $sth2->execute(['Corée']);
  $arr = $sth2->fetch();

}elseif ($_POST['pays']=='cn') {
  $sth2 = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE  pays = ? ');
  $sth2->execute(['Chine']);
  $arr = $sth2->fetch();

}elseif ($_POST['pays']=='all') { //l'utilisateur à choisi d'afficher ses favoris

  if (isset($_SESSION['user']) && isset($_SESSION['id'])) { //vérification de si l'utilisateur est bien connecté
  $user_id=$_SESSION['id'];

  $sth = $dbh->prepare('SELECT movie_id FROM favoris WHERE user_id = ?');//vérification de si il y a des films favoris
  $sth->execute([$user_id]);
  
  $count=$sth->rowCount();
  



  }elseif(!isset($count) || $count=='0' ){
    $nofav=1;
    } 
  

  }else{
    header('location:erreur.php');
  }

?>

<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <?php
        if($_POST['pays']=='all'){
          echo '<link rel="stylesheet" type="text/css" href="stylepagedaccueil2.css">';
        }elseif ($arr['pays'] == 'Corée') {
          echo '<link rel="stylesheet" type="text/css" href="coreen.css">';
        }elseif($arr['pays'] == 'Chine'){
          echo '<link rel="stylesheet" type="text/css" href="chinois.css">';
        }elseif($arr['pays'] == 'Japon'){
          echo '<link rel="stylesheet" type="text/css" href="japonais.css">';
        }
        
        
        ?>
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
    $("#propo").hide();

    });

    $(document).ready(function(){
      $("button").click(function(){
          $("#propo").slideToggle("Slow");
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

        <title> CHERIFURAWA MOVIES - Japonais </title>

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
            if ($_POST['pays'] =='all'){
              echo '<div id="logo"> <img src="images/PANDA NETFLOUX.png" width="210px" height="210px"></div>';
            }elseif ($arr['pays'] == 'Corée') {
              echo '<div id="logo"> <img src="images/coreen1.png" width="210px" height="210px"></div>';
            }elseif($arr['pays'] == 'Chine'){
              echo '<div id="logo"> <img src="images/chine1.png" width="210px" height="210px"></div>';
            }elseif($arr['pays'] == 'Japon'){
              echo '<div id="logo"> <img src="images/jap1.png" width="210px" height="210px"></div>';
            }
            
      if ($_POST['pays'] =='all'){
        echo '<div id="text"> <p> 🇰🇷 🇨🇳 🇯🇵 vous consultez <b> vos FAVORIS </b> ! 🇰🇷 🇨🇳 🇯🇵  </p> </div>';
      }elseif ($arr['pays'] == 'Corée') {
        echo '<div id="text"> <p> 🇰🇷 Votre site de film et de review <b> Coréenne </b> ! 🇰🇷 </p> </div>';
      }elseif($arr['pays'] == 'Chine'){
        echo '<div id="text"> <p> 🇨🇳 Votre site de film et de review <b> Chinoise </b> ! 🇨🇳 </p> </div>';
      }elseif($arr['pays'] == 'Japon'){
        echo '<div id="text"> <p> 🇯🇵 Votre site de film et de review <b> Japonaise </b> ! 🇯🇵 </p> </div>';
      }
            
      ?>     
         
      
  			
 
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
  <?php
        if ($_POST['pays'] =='all'){
                  echo '  <button> <p>🇰🇷 🇨🇳 🇯🇵 <b> CHERIFURAWA MOVIES </b> 🇰🇷 🇨🇳 🇯🇵 </button>
        <div id=propo > 
         
        <p> Vous retrouverez dans cette section tous vos <b> films favoris </b> auquel vous avez souscris ! </p>
        <p> Cliquez sur les vignettes pour avoir <b> plus d\'information </b> !</p>
        <p> Et surtout n\'oubliez pas de laisser un <b> commentaire </b> et un <b> avis </b> !! </p>
        <p> 🇰🇷 🇨🇳 🇯🇵 <b> Bon visionage </b> 🇰🇷 🇨🇳 🇯🇵 </p>
        </div>';
        }elseif ($arr['pays'] == 'Corée') {
        echo '  <button> <p>🇰🇷 <b> CHERIFURAWA MOVIES </b> 🇰🇷 </button>
        <div id=propo > 
         
        <p> Vous retrouverez dans cette section tous les <b> films coréens </b> que propose notre site internet ! </p>
        <p> Cliquez sur les vignettes pour avoir <b> plus d\'information </b> !</p>
        <p> Et surtout n\'oubliez pas de laisser un <b> commentaire </b> et un <b> avis </b> !! </p>
        <p> 🇰🇷 <b> Bon visionage </b> 🇰🇷 </p>
        </div>';
      }elseif($arr['pays'] == 'Chine'){
        echo '<button> <p>🇨🇳 <b> CHERIFURAWA MOVIES </b> 🇨🇳 </button>
        <div id=propo > 
         
        <p> Vous retrouverez dans cette section tous les <b> films Chinois </b> que propose notre site internet ! </p>
        <p> Cliquez sur les vignettes pour avoir <b> plus d\'information </b> !</p>
        <p> Et surtout n\'oubliez pas de laisser un <b> commentaire </b> et un <b> avis </b> !! </p>
        <p> 🇨🇳 <b> Bon visionage </b> 🇨🇳 </p>
        </div>';
      }elseif($arr['pays'] == 'Japon'){
        echo '<button> <p> 🇯🇵 <b> CHERIFURAWA MOVIES </b> 🇯🇵</p> </button>
        <div id=propo > 
         
        <p> Vous retrouverez dans cette section tous les <b> films Japonais </b> que propose notre site internet ! </p>
        <p> Cliquez sur les vignettes pour avoir <b> plus d\'information </b> !</p>
        <p> Et surtout n\'oubliez pas de laisser un <b> commentaire </b> et un <b> avis </b> !! </p>
        <p> 🇯🇵 <b> Bon visionage </b> 🇯🇵 </p>
        </div>';
      }
            
      ?>  

</section>


<section>


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
            <input class="forms" type="submit" name="VALIDER">
            </form>
   </div>

         <div id="liste"> <form method="post" action="recherche.php"> 
        <label for="recherche"> cherchez par mot clef </label>
        <input class="forms" class="forms" type="text" name="search">
        <input class="forms" class="forms" type="submit" name="valider">
        </form>
    </div>
</section>

<section>
<?php
if ($_POST['pays'] == 'jap') {
  $sth = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE pays = ?  ');
  $valeurs = $sth->fetch();
  $sth->execute(["Japon"]);

}elseif ($_POST['pays']== 'kr') {
  $sth = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE pays = ?  ');
  $valeurs = $sth->fetch();
  $sth->execute(["Corée"]);

}elseif ($_POST['pays']=='cn') {
  $sth = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE pays = ?  ');
  $valeurs = $sth->fetch();
  $sth->execute(["Chine"]);

}

// affichage des données
if(isset($count) && $count >'0' && $_POST['pays']=='all'){  //affichage dédiés aux favoris
  while($row=$sth->fetch()){
        $sth2= $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE id = ?');
        $sth2->execute([$row['movie_id']]);
        $valeurs=$sth2->fetch();


        echo affichage($valeurs);

        $sth2=null;
      }



}else{
   while ($row = $sth->fetch()) {

        echo affichage($row); 
  }
}
?>
</section>

<?php
if($_POST['pays']=='all'){
      echo '<div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/B.mp3" type="audio/mpeg">
  </audio>
  </div>';

}elseif ($arr['pays'] == 'Corée') {
    echo '<div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/C.mp3" type="audio/mpeg">
  </audio>
  </div>';
}elseif($arr['pays'] == 'Chine'){
    echo '<div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/CH.mp3" type="audio/mpeg">
  </audio>
  </div>';
}elseif($arr['pays'] == 'Japon'){
    echo '<div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/J.mp3" type="audio/mpeg">
  </audio>
  </div>';
}
?>
 
 </main>
        <footer>

<?php
if($_POST['pays'] =='all'){
  echo '<img src="images/pandadebout.png" id="logofooter"/>';
}elseif ($arr['pays'] == 'Corée') {
  echo '<img src="images/coreen2.png" id="logofooter"/>';
}elseif($arr['pays'] == 'Chine'){
  echo '<img src="images/chine2.png" id="logofooter"/>';
}elseif($arr['pays'] == 'Japon'){
  echo '<img src="images/jap2.png" id="logofooter"/>';
}

?>

<div id="copy"> <p>&copy; 2020 lélé et GuiGui. tous droits réservés. </p></div> 

<div id="oui" > <a href="contact.php"> <p><b> Nous contacter </b></p> </a> </div>

<div id="oui2"> <a href="index.php"><b> Aller vers l'accueil </b></p> </a> </p> </div>
        
        </footer>
  </div>

    </body>
</html>