<?php
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['id'])) {
  header('location:erreur.php');
}

function commentaire($arr)
{

  echo '<table>';
  echo '<tr> <td>'.$arr['jour'].'</td>';
  echo '<td>' .$arr['titre'].'</td>';
  echo '<td>' .$arr['com'].'</td>';
  echo"</tr> </table>";
}

include 'bdd_connect.php';


?>
<!DOCTYPE html>
<html lang="fr">
<html>
    <head>
        <script>
        function myFunction() {
          var txt;
          var r = confirm("Êtes-vous sur de vouloir Supprimer votre compte ? vous ne pourrez plus revenir en arrière !");
          if (r == true) {
            location.replace("delete_P.php");
          } else {
            location.replace("profil.php");
          }
          document.getElementById("demo").innerHTML = txt;
        }
        </script>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="profil.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="images/PANDA NETFLOUX.png">

        <title> CHERIFURAWA MOVIES - profile </title>
    </head>

    <body>
<?php
$sth = $dbh->prepare("SELECT * FROM users WHERE pseudo = ?  "); //Requête pour récupérer la photo de l'utilisateur
$sth->execute([$_SESSION['user']]);

$valeurs=$sth->fetch();
?>
<div id="retour"> <a href="index.php"> Retour vers l'accueil </a></div>

<div id="logo1">
<img width="250"height="250"src="images/PANDA NETFLOUX.png" id="logo"/>
</div> 


<center><h1> Vous consultez votre profil : <?php echo $_SESSION['user']; if (isset($_SESSION['admin'])){echo '(admin)';} ?> </h1></center>

<section>
<div id="profil"> 

<div id="commentaire" > <?php if (isset($_SESSION['admin'])){echo "<b> Liste des utilisateurs: </b>";}else{ echo "<b> Commentaire(s) postés ! </b>";} ?> 
<?php
if (isset($_SESSION['admin'])) {
 $sth2=$dbh->query("SELECT * FROM users");

 echo '<div>';
 echo '<ul style="display:inline-block;text-align:left;">';
 while ($usr = $sth2->fetch()) {
   echo '<li>'.$usr['pseudo']. '&nbsp;Banni:' .$usr['ban']. '&nbsp; <a href="ban.php?usr=' . $usr['login'] . '"> Bannir </a> &nbsp; <a href="unban.php?usr=' . $usr['login'] . '"> deban </a></li>';
   
 }
 echo"</ul>";
 echo "</div>";
 $sth2->closeCursor();
}else{
$sth = $dbh->prepare("SELECT * FROM commentaires WHERE pseudo = ?  "); //Requête pour récupérer les commentaires postés par l'utilisateur 
$sth->execute([$_SESSION['user']]);


  while($arr = $sth->fetch()) { //tant qu'il y a des lignes dans le tableau $arr on exécute la fonction commentaire (Du moins je le comprends comme ça)
    
    echo commentaire($arr);
  }



$sth->closeCursor();
}
?>

</div>

<img src="<?php echo $valeurs['photo']; ?>" id="pp"> 
<div id="fichier">
<form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" value="valider" name="submit">
</form>
</div>

<div class="ide"> Changer votre mot de passe </div>
<br>
<div id="ah"> 
<form method="post" action="mdp_traitement.php">  
<label for="pwd"><b>Entrez votre ancient mot de passe</b></label>
<input type="password" id="pwd" name="basePSW" required minlength="2" maxlength="10">
<br>
<label for="pwd"><b>Entrez votre nouveau mot de passe</b> (2 - 10 caractères)</label>
<input type="password" id="pwd" name="newPSW" required minlength="2" maxlength="10">
<br></br>
<center> <input type="submit" value="Je change !"> </center>
</form>  
</div>

<div class="ide"> Changer votre identifiant </div>
<br>
<div id="bh"> 
<form method="post" action="psd_traitement.php">  
<label for="pseudo"> <b> Ancien Pseudonyme </b></label>
<input type="text" id="pseudo" name="base_psd" required minlength="3" maxlength="20"> 
<br>
<label for="pseudo"> <b> Nouvel Pseudonyme </b> (3 - 20 caractères): </label>
<input type="text" id="pseudo" name="new_psd" required minlength="3" maxlength="20"> 
<br></br> 
<center><input type="submit" value="Je change !"></center>
</form>  
</div>

<div class="ide"> Supprimer mon compte </div>
<br>
<div id="supprimer">  
<p> Appuyer <b><a href="#" id="delete" onclick="myFunction()">
ici</a></b> pour supprimer diffinitivement votre compte </p>
</div>


</section>


  <div id=audio> 
  <audio loop autoplay="" width="10">
  <source src="son/B.mp3" type="audio/mpeg">
  </audio>
  </div>

    </body>
</html>