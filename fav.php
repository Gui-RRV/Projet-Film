<?php
session_start();
include 'bdd_connect.php';
if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
	$user_id=$_SESSION['id'];
}

$movie_id=$_GET['id'];

$sth=$dbh->prepare('INSERT INTO favoris (user_id, movie_id) VALUES (:user_id, :movie_id)');
$valeurs = array('user_id' => $user_id, 
	              'movie_id' => $movie_id);
$sth->execute($valeurs);


header('location:film.php?id='.$movie_id.'');
?>