<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';

$login= $_SESSION['user'];

$sth = $dbh->prepare('DELETE FROM users WHERE pseudo = ?'); 
$sth->execute([$login]);

echo $login;

session_destroy();

setcookie('identifiant', NULL, -1);
setcookie('password', NULL, -1);


header('location:index.php');
?>