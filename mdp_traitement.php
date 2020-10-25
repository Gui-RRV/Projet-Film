<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';


//Page de changement de mot de passe

$basePSW=htmlspecialchars($_POST['basePSW']);
$newPSW=htmlspecialchars($_POST['newPSW']);



$sth = $dbh->prepare("SELECT * FROM users WHERE pseudo = ?  ");

$sth->execute([$_SESSION['user']]);

$arr=$sth->fetch();

$sth=null;


if (password_verify($basePSW, $arr['mdp'])) {
	
	$newPSW_Crypt=password_hash($newPSW, PASSWORD_DEFAULT);
	$sth = $dbh->prepare("UPDATE users 
                      	SET mdp = :mdp
                      	WHERE pseudo =:pseudo");

	$valeurs = array('mdp'  => $newPSW_Crypt,
					  'pseudo' => $_SESSION['user']  );
	$sth->execute($valeurs);
	setcookie('password', $newPSW,time() + 365*24*60*60);
	header('location:profil.php');
}else{
header('location:erreur.php');
}





?>