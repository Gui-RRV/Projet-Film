<?php
session_start();
session_destroy();

setcookie('identifiant', NULL, -1);
setcookie('password', NULL, -1);

?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ban.css">

        <link rel="icon" type="image/png" href="images/PANDA NETFLOUX.png">

        <title> CHERIFURAWA MOVIES </title>
    </head>

    <body>

<div id="retour"> <a href="index.php"> Retour vers l'accueil </a></div>

<div id="logo1">
<img width="250"height="250"src="images/PANDA NETFLOUX.png" id="logo"/>
</div> 


<center><h1>Vous avez été <b> banni </b> de CHERIFURAWA MOVIE </h1></center>
<center><h1>Pour toute réclammation veuillez <b> contacter les administrateurs </b> ou <b> remplir le formulaire suivant </b> </h1></center>

<div id="inscri"> 

<p> Vous pouvez nous joindre aux <b> deux adresses mail </b> suivantes : </p> 
<ul> 
<li> <a href="mailto:lea.BEN-SOUSSAN@etu.univ-amu.fr">  lea.BEN-SOUSSAN@etu.univ-amu.fr </a></li>
<li><a href="mailto:guillaume.RORIVE@etu.univ-amu.fr "> guillaume.RORIVE@etu.univ-amu.fr </a></li>
</ul>

<p> Ou Remplissez ce <b> formulaire </b> : </p>
<form method="post" action="mail.php">


  <label for="pseudo"><b>Pseudo</b> :</label>
  <input type="text" id="pseudo" name="pseudo" required minlength="3" maxlength="20">
  <br>

  <label for="mail"><b>E-Mail</b> :</label>
  <input type="email" id="mail" name="mail">
  <br></br>

  <label for="msg"><p> <b> Commentaire </b> : </p></label>
  <textarea name="msg" id="msg"></textarea>

  <center> <input type="submit" value="J'envoie !"></center>

</div>

</div>

  <div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/B.mp3" type="audio/mpeg">
  </audio>
  </div>

    </body>
</html>