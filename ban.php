<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';


$ban_id=htmlspecialchars($_GET['usr']);
$statut = 'oui';

$sth = $dbh->prepare('UPDATE users 
                      SET ban = :statut
                      WHERE login = :login');

$valeurs = array('statut'  => $statut,
                 'login' => $ban_id);
$sth->execute($valeurs);


header('location:profil.php');
?>