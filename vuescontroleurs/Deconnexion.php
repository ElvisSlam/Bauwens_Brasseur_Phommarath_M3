<?php
session_start();
unset($_SESSION['username']);
$_SESSION = array();
session_destroy();
header('Location: formInscription.php');
?>