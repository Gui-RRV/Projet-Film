<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';

$login=htmlspecialchars($_POST['login']);
$pseudo=htmlspecialchars($_POST['pseudo']);
$mail=htmlspecialchars($_POST['mail']);
$password=htmlspecialchars($_POST['password']);
$passwordCrypt= password_hash($password, PASSWORD_DEFAULT); //Hashage du mot de passe


$base_pfp='usr/default.png';//Valeurs par défaut de tout nouvel utilisateur
$ban_status='non';			//Valeurs par défaut de tout nouvel utilisateur
$adm_status='non';			//Valeurs par défaut de tout nouvel utilisateur


$test=0;
$stmt= $dbh->prepare('SELECT * FROM users');
$stmt->execute();
$arr = $stmt->fetchAll();

foreach ($arr as $ligne) { //Cette boucle permet de savoir si le login, le pseudo ou le mail existe déjà dans la bdd et donc de mettre en place une session qui informera l'utilisateur que ces informations existent déjà

	if (in_array($login, $ligne)) {
		$_SESSION['log']='true';
		$test=$test+1;
	}if (in_array($pseudo, $ligne)) {
		$_SESSION['pseu']='true';
		$test=$test+1;
	}if (in_array($mail, $ligne)) {
		$_SESSION['email']='true';
		$test=$test+1;
	}
}
if ($test>0) {
	header('location:inscription.php');

}

if (!isset($_SESSION['log']) && !isset($_SESSION['pseu']) && !isset($_SESSION['email'])) { //Si les 3 sessions ne sont pas mises en places (cad si les infos n'existaient pas déjà alors on ajoute le nouvel utilisateur)

	$sth = $dbh->prepare('INSERT INTO users (login, mdp, pseudo,mail,photo,ban,Admin) 
	                      VALUES(:login, :mdp, :pseudo,:mail,:photo,:ban,:admin)');
	$valeurs = array('login' => $login, 
	                'mdp' => $passwordCrypt, 
	                'pseudo'  => $pseudo,
	             	'mail' => $mail,
	             	'photo'=> $base_pfp,
	             	'ban'=>$ban_status,
	             	'admin'=>$adm_status);

	setcookie('identifiant', $valeurs['login'],time() + 365*24*60*60);
	setcookie('password', $password,time() + 365*24*60*60);
	$_SESSION['user']=$valeurs['pseudo'];
	$sth->execute($valeurs);
	print_r($valeurs);
	$count = $sth->rowCount();
	echo $count;

	mail($mail,'Confirmation d\'inscription','Vous êtes bien inscrits sur CHERIFURUWA MOVIES, bienvenue au nom de toute l\'équipe !(et on est que deux !)');


	$sth=$dbh->prepare('SELECT user_id from users WHERE login = ?');
	$sth->execute([$login]);
	$arr=$sth->fetch();

	$_SESSION['id']=$arr['user_id']; //ici on récupère l'id associé à l'utilisateur pour le mettre dans une session pour pouvoir accéder à certaines fonctionnalité plus simplement comme le profil par exemple.
	
	header('location:index.php');

}
?>