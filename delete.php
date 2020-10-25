<?php
session_start();
if (isset($_SESSION['admin'])) {

$Del_id=htmlspecialchars($_GET['id']);

//connexion à la BDD
include 'bdd_connect.php';

$sth = $dbh->prepare("UPDATE commentaires SET com ='Ce message a été supprimé par un Administrateur.' WHERE num =:id");

$arr= array('id' => $Del_id);
$sth->execute($arr);


echo $Del_id;

$sth= null;
$sth = $dbh->prepare('SELECT id FROM films INNER JOIN commentaires ON films.titre=commentaires.titre WHERE num = ?'); 
// On récupère l'id du film pour revenir à la page du film
$sth->execute([$Del_id]);
$arr = $sth->fetch();
 header('location:film.php?id='.$arr['id'].'');
}else{
	echo "en fait t'es pas un vrai shérif alors t'as pas le droit de delete des commentaires :/";
}



?>


