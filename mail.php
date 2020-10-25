<?php
session_start();

$pseudo=htmlspecialchars($_POST['pseudo']);
$mail=htmlspecialchars($_POST['mail']);
$msg=htmlspecialchars($_POST['msg']);

mail('myoartyom@gmail.com','Contact de '.$pseudo.'','L\'adresse : ' .$mail.'  vous a envoyé : ' .$msg.'');

header('location:index.php');
?>