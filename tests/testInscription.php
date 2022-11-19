<?php

//on insère le fichier qui contient les fonctions
include_once '../modeles/mesFonctionsAccesBDD.php';

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();

var_dump(Inscription($lePdo, 'test','test','test@gmail.com','test1234!','test1234!'));
