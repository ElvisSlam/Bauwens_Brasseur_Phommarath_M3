<?php
$methode=$_SERVER["REQUEST_METHOD"];
switch ($methode){
    case "GET":
        if ( !isset($_GET['reference'])){
// Retourner tous les étudiants en json
        } else {
// Retournerl’étudiant d’id $_GET[‘id’] en json
        }
        break;
    case "POST":
// Créer l’étudiant d’id $_POST[‘id’] - de nom $_POST[‘nom’] - etc..
        break;
    case "PUT":
        parse_str(file_get_contents('php://input'), $_PUT) ;
    // Modifier l’étudiant d’id $_PUT[‘id’]
        break;
    case "DELETE":
        parse_str(file_get_contents('php://input'), $_DELETE);
    // Supprimer l’étudiant
        break;
}
?>