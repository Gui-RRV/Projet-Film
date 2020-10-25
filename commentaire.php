<?php
session_start();
//connexion à la BDD
include 'bdd_connect.php';

$commentaire=htmlspecialchars($_POST['commentaire']);
$id=htmlspecialchars($_GET['id']);

function filterwords($text){ // Fonction permettant de censuré les injures
 $filterWords = array('connard', 'con', 'pute', 'putain', 'merde', 'connasse', 'bordel', 'salope', 'enfoiré', 'foutre', 'fuck', 'enculer', 'enculé', 'raclure', 'putasse', 'niquer', 'niqué', 'nique', 'bécasse', 'pétasse', 'bite', 'chatte', 'pénis', 'branler', 'branleur', 'burnes', 'couilles', 'chieur', 'chieuse', 'couillon', 'cul', 'emmerder', 'emmerdeur', 'salaud', 'garce', 'glandeur', 'truie', 'gueule', 'baiser', 'baisé', 'morveux', 'morveuse', 'pédé', 'pouffiasse', 'poufiasse', 'tafiole', 'tapette', 'thon', 'zigounette','fucker','nigger','nigga','twat','pute','bitch','poo','shit','fuck','fucking','moron','ffs','vtf','ass','boobs','boobies','dick','testicles','asshole','horseshit','bullshit','prick','slut','whore','dickhead','pd','putassier','homo','juif','nazis','holocauste','génocide','tuer','meurtre','viol','violer','rape','sexe','sex','zizi');
 $filterCount = sizeof($filterWords); //Compte la taille du tableau
 for ($i = 0; $i < $filterCount; $i++) { 
  $text = preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $text);
 }
 return $text;
}
 
$date=date ("Y-m-d");
$text= filterWords($commentaire);



$sth = $dbh->prepare('SELECT * FROM films WHERE id = ? ');
$sth->execute([$id]);
$arr = $sth->fetch();






$sth = $dbh->prepare('INSERT INTO commentaires (pseudo, com, titre, jour)
						 VALUES (:pseudo, :com, :titre, :jour)');

$valeurs = array('pseudo' => $_SESSION['user'], 
                 'com' => $text, 
                 'titre'  => $arr['titre'],
             	'jour' => $date );

$sth->execute($valeurs);
 
 


 header('location:film.php?id='.$id.'');
?>