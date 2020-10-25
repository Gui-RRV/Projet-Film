<?php
session_start();
//page de changement de Pseudo

$basePSD=htmlspecialchars($_POST['base_psd']);
$newPSD=htmlspecialchars($_POST['new_psd']);

//connexion à la BDD
include 'bdd_connect.php';

$sth = $dbh->prepare("SELECT * FROM users WHERE pseudo = ?  ");

$sth->execute([$_SESSION['user']]);

$arr=$sth->fetch();

$sth=null;


if ($arr['pseudo'] == $basePSD) {
	
	$sth = $dbh->prepare("UPDATE users 
                      	SET pseudo = :new_pseudo
                      	WHERE pseudo =:pseudo");

	$valeurs = array('new_pseudo'  => $newPSD,
					  'pseudo' => $_SESSION['user']  );
	$sth->execute($valeurs);

	$_SESSION['user']=$valeurs['new_pseudo'];
	header('location:profil.php');
}else{
header('location:erreur.php');
}





?>