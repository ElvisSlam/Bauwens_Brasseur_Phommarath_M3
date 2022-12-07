<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$pdo = connexionBDD();

$id = 0;
//$info = getDesc($pdo, $id);

$var = 'bonjour';
$br = '<br>';

//echo $var , $br;

//echo (json_encode($var));

//echo $br, $br, json_encode($info);


$methode=$_SERVER["REQUEST_METHOD"];
switch ($methode){
    case "GET":
        if (!isset($_GET['id'])){
            $info = getDesc($pdo, $id);
            echo json_encode($info);
            break;
        } else {
            $id = $_GET['id'];
            $info = getDesc($pdo, $id);
            echo json_encode($info);
            break;
        }
    break;
    
    case "POST":
    // Créer l’étudiant d’id $_POST[‘id’] - de nom $_POST[‘nom’] - etc..
    break;

    case "PUT":
        //parse_str(file_get_contents('php://input'), $_PUT) ;
        // Modifier l’étudiant d’id $_PUT[‘id’]
        break;
    case "DELETE":
        //parse_str(file_get_contents('php://input'), $_DELETE);
        // Supprimer l’étudiant
        break;
}

$retour = '<form action="webservice.php" name="retour">
<input type="submit" value="Retour au menu">
</form>';

echo $retour;