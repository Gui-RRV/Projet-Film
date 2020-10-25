<?php
session_start();

$note=htmlspecialchars($_POST['note']);
$id=htmlspecialchars($_GET['id']);

//connexion à la BDD
include 'bdd_connect.php';

$sth= $dbh->prepare('SELECT * FROM films WHERE id = ? ');
$sth->execute([$_GET['id']]);
 $row = $sth->fetch();
 

$votes_avant = $row['votes'];
$note_avant = $row['note'];
$sth->closeCursor();

$sth = $dbh-> prepare('UPDATE films 
                      SET votes = :votes, note= :note
                      WHERE id =:id');

$valeurs = array('votes' => $votes_avant + 1,
				 'note' => $note_avant + $note,
				 'id' => $id);

$sth->execute($valeurs);
$sth->closeCursor();


echo $votes_avant;
echo"<br>";
echo $note_avant;

print_r($valeurs);

header('location:film.php?id='.$id.'');
?>