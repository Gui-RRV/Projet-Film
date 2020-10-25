<?php
session_start();
session_destroy();

setcookie('identifiant', NULL, -1);
setcookie('password', NULL, -1);

header('location:index.php')


?>