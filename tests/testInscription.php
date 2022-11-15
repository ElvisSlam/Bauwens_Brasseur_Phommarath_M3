<?php

//on insère le fichier qui contient les fonctions
include_once '../modeles/mesFonctionsAccesBDD.php';

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();
var_dump($lePdo);

//var_dump(isset($case));
//var_dump permet d'afficher le contenu d'un objet. Utilisable uniquement lors de test de validation
var_dump(inscription($lePdo, 'test','test','test@gmail.com','test','test'));
