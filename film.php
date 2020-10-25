<?php 
session_start();
//connexion à la BDD
include 'bdd_connect.php';
$id=htmlspecialchars($_GET['id']);
$fav_indice=3;
$fav='<p class="fav_style">Vous aimez ce film ? <a href="fav.php?id=' . $id .'">Ajoutez le dans vos favoris !</a></p>';
$unfav= '<p class="fav_style">Vous n\'aimez plus ce film ? <a href="unfav.php?id=' . $id .'">Enlevez le de vos favoris >:( !</a></p>';


function affichage($arr,$fav_indice,$fav,$unfav){
  ?>

    <div id="images">
<div id="description">
         <div id="image2" ><img id="img_film" src="<?php echo $arr['image'];?>"/> 
         <div> 

</div>
</div>
</div>
</div>
   <div id="film" > 

  <h1> <?php echo $arr['titre']; ?> </h1>

  <?php
  
      if ($fav_indice==1) { //Condition qui permettra d'afficher le bouton pour ajouter ou supprimer des favoris
        echo $fav;
      }elseif($fav_indice==0){
        echo $unfav;
      }else{
        
      }
    
  ?>
  <ul> 
    <li> <h3> Synopsis </h3> </li> 
    <p> <?php echo $arr['synopsis']; ?></p>

    <li> <h3> Réalisateur </h3> </li>
    <p> <?php echo '<a href="realisateur.php?id=' . $arr['realisateur'] . '">' .$arr['realisateur'].'</a>' ?> </p>

      <li> <h3> Acteurs </h3> </li>
    <p> <?php echo $arr['acteurs']; ?> </p>

    <li> <h3> Durée </h3> </li>
    <p> <?php echo $arr['duree']; ?> </p>

    <li> <h3> Pays </h3> </li>
    <p> <?php echo $arr['pays']; ?> </p>

    <li> <h3> Genre </h3> </li>
    <p> <?php echo $arr['genre']; ?> </p>

        <li> <h3> Note </h3> </li>
    <p> <?php echo number_format($arr['notefi'],1);?> </p>
  </ul></div>


  <?php
}

  if (isset($_SESSION['admin'])) {
    function commentaire($arr)
    {
  echo '<div id="usr_comm">';
  echo 'Auteur :'  .$arr['pseudo'];
  echo '<table>';
  echo '<tr><td> <div id="image" ><img src="'.$arr['photo'].'" alt="usr/alt.png" width="50px" height="50px"/></td> </tr>'; 
  echo '<tr> <td>'.$arr['jour'].'</td>';
  echo '<td>' .$arr['com'].'</td> <td><a href="delete.php?id=' . $arr['num'] . '">effacer ce commentaire dérangeant.</a></td>';
  echo"</tr> </table> </div>";
    }
    
  }else{
    function commentaire($arr)
{
  echo 'Auteur :'  .$arr['pseudo'];
  echo '<table>';
  echo '<tr><td> <div id="image" ><img src="'.$arr['photo'].'" alt="usr/alt.png" width="50px" height="50px"/></td> </tr>';
  echo '<tr> <td>'.$arr['jour'].'</td>';
  echo '<td>' .$arr['com'].'</td>';
  echo"</tr> </table>";
}
  }

function comvote($drap){
?>
  

  <div id="commentaire"> <H3> <?php echo $drap;?>  Commentaires :  </H3> 
  <form method="post" action="<?php echo 'commentaire.php?id=' . $_GET['id']; ?>">  
    <input class="validation" type="submit" name="valider">
  <textarea class="formulaire" id="commentaire" name="commentaire"
            rows="3" cols="40">
  </textarea>
  </form>
  </div>
    <div id="note1"> <H3> <?php echo $drap;?>  Note : </H3> 
    <form method="post" action="<?php echo 'notation.php?id=' . $_GET['id']; ?>"> 
    <label for="note"> Quelle note voulez-vous donner à ce film ? </label>
    <input class="formulaire" type="number" id="note" name="note" min="1" max="5">
    <input class="validation" type="submit" value="Valider">
    </form>
    </div>
  
<?php
}



$sth = $dbh->prepare('SELECT films.titre, synopsis,pays, acteurs,duree,genre,realisateur, com, commentaires.pseudo,date,realisateur,note,image,jour,num, photo, note/votes as notefi FROM commentaires INNER JOIN films ON films.titre=commentaires.titre INNER JOIN users ON users.pseudo=commentaires.pseudo WHERE  id =:id '); 
$valeurs = array( 'id' => $id);
$sth->execute($valeurs);
$arr = $sth->fetch();



if(!$arr) {

$sth->closeCursor();
$sth = $dbh->prepare('SELECT *, note/votes as notefi FROM films WHERE  id =:id ');
$sth->execute($valeurs);//Pas besoin de re-définir $valeurs car dans les deux cas il contient l'id
$arr = $sth->fetch();

}

// affichage du titre si connecté ou pas connecté
if (isset($_SESSION['user']) && isset($_SESSION['id'])) { // SI connecté

    $user_id=$_SESSION['id'];

  $sth_fav = $dbh->prepare('SELECT movie_id FROM favoris WHERE user_id = ? AND movie_id = ?');//vérification de si il y a des films favoris
  $sth_fav->execute(array($user_id, $id));
  
  $count=$sth_fav->rowCount();
    if ($count == '0') {
       $fav_indice=1;
    }elseif ($count > '0'){
      $fav_indice=0;
    }
 
}

        
  if ($arr['pays'] == 'Corée') {
    $drap='🇰🇷';
  }elseif($arr['pays'] == 'Chine'){
    $drap='🇨🇳';
  }elseif($arr['pays'] == 'Japon'){
    $drap='🇯🇵';
  }
       
?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if ($arr['pays'] == 'Corée') {
          echo '<link rel="stylesheet" type="text/css" href="filmcoreen.css">';
        }elseif($arr['pays'] == 'Chine'){
          echo '<link rel="stylesheet" type="text/css" href="filmchinois.css">';
        }elseif($arr['pays'] == 'Japon'){
          echo '<link rel="stylesheet" type="text/css" href="filmjaponais.css">';
        }
        
        ?>
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
        <?php
        if ($arr['pays'] == 'Corée') {
          echo '<title> CHERIFURAWA MOVIES - Coréen </title>';
        }elseif($arr['pays'] == 'Chine'){
          echo '<title> CHERIFURAWA MOVIES - Chinois </title>';
        }elseif($arr['pays'] == 'Japon'){
          echo '<title> CHERIFURAWA MOVIES - Japonais </title>';
        }
        ?>
        

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

            if ($arr['pays'] == 'Corée') {
              echo '<div id="logo"> <img src="images/coreen1.png" width="210px" height="210px"></div>';
            }elseif($arr['pays'] == 'Chine'){
              echo '<div id="logo"> <img src="images/chine1.png" width="210px" height="210px"></div>';
            }elseif($arr['pays'] == 'Japon'){
              echo '<div id="logo"> <img src="images/jap1.png" width="210px" height="210px"></div>';
            }
            
            ?>
      
         
      <div id="text"> <p> <?php echo $drap;?> Vous visionez la page du film <b> <?php echo $arr['titre']; ?> </b> ! <?php echo $drap;?>  </p> </div>
        
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

echo "<ul>";

echo affichage($arr,$fav_indice,$fav,$unfav);


echo '<div id="comm" > ';

if (isset($_SESSION['user'])) {
  echo comvote($drap);
}

if (isset($arr['jour']) && isset($arr['pseudo']) &&isset($arr['com']) ) {
 
  echo commentaire($arr);// cette ligne permet d'afficher le premier commentaire car pour x raisons il ne s'affiche pas avec la boucle while, tester avec un foreach plus tard
  while($row = $sth->fetch()) {

    echo commentaire($row);
  }
}




echo "</div>";
  
  //fin de la requête
$sth->closeCursor();






?>





















</section>
<?php

if ($arr['pays'] == 'Corée') {
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
if ($arr['pays'] == 'Corée') {
  echo '<img src="images/coreen2.png" id="logofooter"/>';
}elseif($arr['pays'] == 'Chine'){
  echo '<img src="images/chine2.png" id="logofooter"/>';
}elseif($arr['pays'] == 'Japon'){
  echo '<img src="images/jap2.png" id="logofooter"/>';
}

?>


<div id="copy"> <p>&copy; 2020 lélé et GuiGui. tous droits réservés. </p></div> 

<div id="oui" > <a href="contact.html"> <p><b> Nous contacter </b></p> </a> </div>

<div id="oui2"> <a href="index.php"><b> Aller vers l'accueil </b></p> </a> </p> </div>
        
        </footer>
    </div>

  </body>
</html>