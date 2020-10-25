<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';

$login=htmlspecialchars($_POST['login']);
$password=htmlspecialchars($_POST['password']);
$test=0;

$sth = $dbh->prepare('SELECT * FROM users WHERE login = ? ');
$sth->execute([$login]);
$valeurs=$sth->fetch();




if (password_verify($password, $valeurs['mdp']) && $valeurs['login']== $login){

	
	$sth2 = $dbh->prepare("SELECT * FROM users WHERE login =:ident ");
	$valeurs2 = array('ident'  => $login);
	$sth2->execute($valeurs2);

	$arr = $sth2->fetch();
	

	setcookie('identifiant', $valeurs['login'],time() + 365*24*60*60);
	setcookie('password', $password,time() + 365*24*60*60);
	$_SESSION['user']=$arr['pseudo'];
	$_SESSION['id']=$arr['user_id'];

	if ($arr['Admin'] == 'oui') { //On vérifie si dans l'utilisateur est un admin, si c'est le cas une session unique a son statut est activée
 		 $_SESSION['admin']= true;

	}
	if($arr['ban'] == 'oui'){
		header('location:banned.php');
	}else{
		header('location:index.php');
	}
	



	
}else{

	$_SESSION['log']='false';
	$_SESSION['pass']='false';

	$stmt= $dbh->prepare('SELECT login,mdp FROM users');
	$stmt->execute();
	$array = $stmt->fetchAll();

	foreach ($array as $ligne) {

		if (in_array($login, $ligne)) {
			$_SESSION['log']='true';
			
		}if (in_array(password_verify($password, $valeurs['mdp']), $ligne)) {
			$_SESSION['pass']='true';
			
		}
	}
	header('location:connexion.php');


}











?>