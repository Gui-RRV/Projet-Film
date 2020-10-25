<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="Inscription.css">

        <link rel="icon" type="image/png" href="images/PANDA NETFLOUX.png">

        <title> CHERIFURAWA MOVIES </title>
    </head>

    <body>

<div id="retour"> <a href="index.php"> Retour vers l'accueil </a></div>

<div id="logo1">
<img width="250"height="250"src="images/PANDA NETFLOUX.png" id="logo"/>
</div> 


<center><h1>Inscrivez-vous et découvrez nos fonctionnalités !</h1></center>


<div id="inscri"> 
  <form method="post" action="ajout.php">
  <label for="pseudo"><b>Pseudo</b> (3 - 20 caractères) (nom affiché sur le site):</label>
  <input type="text" id="pseudo" name="pseudo" required minlength="3" maxlength="20">
  <br><br>

  <label for="mail"><b>E-Mail</b> :</label>
  <input type="email" id="mail" name="mail">
  <br></br>
  

  
  <label for="pwd"><b>Mot De Passe</b> (2 - 10 caractères)</label>
  <input type="password" id="pwd" name="password" required minlength="2" maxlength="10">
  <br></br> 


  <label for="login"><b>Choissisez votre identifiant</b> (3 - 20 caractères) :</label>
  <input type="text" id="login" name="login" required minlength="3" maxlength="20">
  <br></br>

  <center> <input type="submit" value="Je m'inscris !"></center>
</form>
</div>


<?php
session_start();
if (isset($_SESSION['pseu'])) {
  echo "<p>Le pseudo existe déjà</p>";
  
}
if (isset($_SESSION['log'])) {
  echo "<p>Le login existe déjà</p>";
  
}

if (isset($_SESSION['email'])) {
  echo "<p>Le mail existe déjà</p>";
  
}
session_destroy();

?>
</div>

  <div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/B.mp3" type="audio/mpeg">
  </audio>
  </div>

    </body>
</html>