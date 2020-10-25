<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="connexion.css">

        <link rel="icon" type="image/png" href="images/PANDA NETFLOUX.png">

        <title> CHERIFURAWA MOVIES </title>
    </head>

    <body>

<div id="retour"> <a href="index.php"> Retour vers l'accueil </a></div>

<div id="logo1">
<img width="250"height="250"src="images/PANDA NETFLOUX.png" id="logo"/>
</div> 


<center><h1>Bienvenue sur <b> CHERIFURAWA MOVIES </b> </h1></center>


<div id="inscri"> 
<?php
if (isset($_COOKIE['identifiant']) and isset($_COOKIE['password'])) { //Si l'utilisateur est déjà connecté (cookies déjà set) alors on crée un formulaire qui se remplie automatiquement, sinon il se Connecte

echo "Bonjour ! On s'est souvenu de vous alors on a déjà tout rempli 😊";
?>
  <form  method="post" action="authentification.php">
  <label for="pseudo"><b>Login</b> :</label>
  <input type="text" id="pseudo" name="login" required minlength="3" maxlength="20" value="<?php echo $_COOKIE['identifiant']; ?>" >

  <label for="pwd"><b>Mot De Passe</b>: </label>
  <input type="password" id="pwd" name="password" required minlength="2" maxlength="10" value="<?php echo $_COOKIE['password']; ?>">
  <center><input type="submit" value="Je me connecte !"></center>
</form>
<?php
}else{
?>
<form method="post" action="authentification.php">
  <label for="pseudo"><b>Login</b> :</label>
  <input type="text" id="pseudo" name="login" required minlength="3" maxlength="20">
  <br><br>

  <label for="pwd"><b>Mot De Passe</b>: </label>
  <input type="password" id="pwd" name="password" required minlength="2" maxlength="10">
  <br></br> 
   <br></br> 

  <center> <input type="submit" value="Je me connecte !"></center>
</form>
<?php
}


if (isset($_SESSION['log']) && isset($_SESSION['pass']) ) { //même chose que inscripton.php mais permet de vérifier si c'est l'identifiant ou le mot de passe qui pose problème

  if ($_SESSION['log'] == 'false') {
    echo '<p id="truc">Mauvais Login</p>';
    
  }
  if ($_SESSION['pass'] == 'false') {
    echo '<p>Mauvais mot de passe</p>';
    
  }

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