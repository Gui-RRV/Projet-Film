<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';


$targetFile = 'usr/' . basename($_FILES["file"]["name"]); // met dans la variable targetFile le chemin de l'image ex: usr/image.png

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {   //Si l'image a bien été uploadé dans le dossier alors on inscrit dans la BDD le chemin de l'image
     

    	$sth = $dbh->prepare("UPDATE users 
                      SET photo = :photo
                      WHERE pseudo =:pseudo");

		$valeurs = array('photo'  => $targetFile,
                     'pseudo' => $_SESSION['user']);
		$sth->execute($valeurs);
    }




header('location:profil.php');
?>