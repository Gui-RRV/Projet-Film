<?php
session_start();

include 'bdd_connect.php';

if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
	$user_id=$_SESSION['id'];
}

$movie_id=htmlspecialchars($_GET['id']);

$sth=$dbh->prepare('DELETE FROM favoris where (user_id,movie_id) = (:user_id, :movie_id)');
$valeurs = array('user_id' => $user_id, 
	              'movie_id' => $movie_id);

$sth->execute($valeurs);


header('location:film.php?id='.$movie_id.'');
?>