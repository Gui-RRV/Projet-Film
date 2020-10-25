<?php 
session_start();
//connexion à la BDD
include 'bdd_connect.php';

function affichage($arr){
  ?>

    <div id="images">
<div id="description">
         <div id="image" ><img src="<?php echo $arr['image'];?>"  width="450" height="800"/> 
         <div> 

</div>
</div>
</div>
</div>
   <div id="film" > 

  <h1> <?php echo $arr['titre']; ?> </h1>
  <ul> 
    <li> <h3> Synopsis </h3> </li> 
    <p> <?php echo $arr['synopsis']; ?></p>

    <li> <h3> Réalisateur </h3> </li>
    <p> <?php echo '<a href="realisateur.php?id=' . $arr['realisateur'] . '">' .$arr['realisateur'].'</a>' ?> </p>

      <li> <h3> Acteurs </h3> </li>
    <p> <?php echo $arr['acteurs']; ?> </p>

    <li> <h3> Durée </h3> </li>
    <p> <?php echo $arr['duree']; ?> </p>

    <li> <h3> langue </h3> </li>
    <p> <?php echo $arr['pays']; ?> </p>

    <li> <h3> Genre </h3> </li>
    <p> <?php echo $arr['genre']; ?> </p>
  </ul></div>


  <?php
}

  if (isset($_SESSION['admin'])) {
    function commentaire($arr)
    {
  echo 'Auteur :'  .$arr['pseudo'];
  echo '<table>';
  echo '<tr><td> <div id="image" ><img src="'.$arr['photo'].'" alt="usr/alt.png" width="50px" height="50px"/></td> </tr>'; 
  echo '<tr> <td>'.$arr['jour'].'</td>';
  echo '<td>' .$arr['com'].'</td> <td><a href="delete.php?id=' . $arr['num'] . '">effacer ce commentaire dérangeant.</a></td>';
  echo"</tr> </table>";
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

function comvote(){
?>
  <div id="comm" > 

  <div id="commentaire"> <H3> 🇯🇵 Commentaires :  </H3> </div>
  <form method="post" action="<?php echo 'commentaire.php?id=' . $_GET['id']; ?>">  
    <input type="submit" name="valider">
  <textarea id="commentaire" name="commentaire"
            rows="3" cols="40">
  </textarea>
  </form>

  <form method="post" action="<?php echo 'notation.php?id=' . $_GET['id']; ?>"> 

  </form>
  </div>
<?php
}
?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="filmjaponais.css">

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
        <header>       

          <div id="disparu">

            <div id="moncompte" ><a href="#" target=""> <p> mon compte </p> </a></div>
 
            <div id="test" ><a href="inscription.html" target=""> <p> inscription </p> </a></div>

            <div id="test2" ><a href="connexion.html" target=""> <p> connexion </p> </a></div>

            </div>

      <div id="logo"> <img src="images/jap1.png" width="210px" height="210px"></div>
         
      <div id="text"> <p> 🇯🇵 Vous visionez la page du film <b> Parasite </b> ! 🇯🇵 </p> </div>
        
 <div id="container" onclick="myFunction(this)">
  <div id="bar1"></div>
  <div id="bar2"></div>
  <div id="bar3"></div>

<nav>

<div id="menu">
        <ul>

<div id="un">
          <p><a href="coreen.html" id="pays1"> Coréen 🇰🇷 </a></p>  

          <a href="filmcoreen.html" id="blanc"> <p>Okja</a></p>
          <a href="filmcoreen.html" id="blanc"> <p>Le dernier train pour Busan</a></p>
          <a href="filmcoreen.html" id="blanc"> <p>Hard Day</a></p>
          <a href="filmcoreen.html" id="blanc"> <p>Parasite</a></p>
          <a href="filmcoreen.html" id="blanc"> <p>New World</a></p>
</div>        
        
<div id="deux">
        <p><a href="japonais.html" id="pays2">Japonais 🇯🇵 </a></p>
        
         <p><a href="filmjaponais.html" id="blanc"> Kiki la petit sorcière </a></p>
         <p><a href="filmjaponais.html"id="blanc"> Le chateau dans le ciel </a></p>
         <p><a href="filmjaponais.html" id="blanc"> Summer War </a></p>
         <p><a href="filmjaponais.html" id="blanc"> Your Name </a></p>
         <p><a href="filmjaponais.html" id="blanc"> Le Voyage de Chihiro</a></p>
</div>       
         

<div id="trois">
         <p><a href="chinois.html" id="pays3"> Chinois 🇨🇳  </a></p>

          <a href="filmchinois.html" id="blanc"> <p> The assassin </a></p>
          <a href="filmchinois.html" id="blanc"> <p> Ip Man </a></p>
          <a href="filmchinois.htmll" id="blanc"> <p> Le prommeneur d'oiseau </a></p>
          <a href="filmchinois.html" id="blanc"> <p> Combat de maitre </a></p>
          <a href="filmchinois.html" id="blanc"> <p> Beijing Bicycle </a></p>
</div>  
</div>    

</nav>
</header>



<section>









<div id="note"> <H3> 🇯🇵 Note : </H3> </div>













</section>

  <div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/J.mp3" type="audio/mpeg">
  </audio>
  </div>
 
        <footer>

<img src="images/jap2.png" id="logofooter"/>

<div id="copy"> <p>&copy; 2020 lélé et GuiGui. tous droits réservés. </p></div> 

<div id="oui" > <a href="contact.html"> <p><b> Nous contacter </b></p> </a> </div>

<div id="oui2"> <a href="pagedaccueil.html"><b> Aller vers l'accueil </b></p> </a> </p> </div>
        
        </footer>


    </body>
</html>