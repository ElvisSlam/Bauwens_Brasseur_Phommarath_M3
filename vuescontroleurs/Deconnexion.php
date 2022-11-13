<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo = connexionBDD();
insertDeconnexion($pdo, $_SESSION['username']);

unset($_SESSION['username']);
session_destroy();
header('Location:formConnexion.php');
