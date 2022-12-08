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
        $info = (AjoutBien($pdo, $_POST['ref'], $_POST['ville'], $_POST['type'], $_POST['prix'], 
        $_POST['desc'], $_POST['surf'], $_POST['nbpiece'], $_POST['jardin']));
        echo json_encode($info);
    break;

    case "PUT":
        parse_str(file_get_contents('php://input'), $_PUT);
        $info = ModifBien($pdo, $_PUT['ref'], $_PUT['ville'], $_PUT['type'], $_PUT['prix'], 
        $_PUT['desc'], $_PUT['surf'], $_PUT['nbpiece'], $_PUT['jardin']);
        echo json_encode($info);
        break;
    case "DELETE":
        parse_str(file_get_contents('php://input'), $_DELETE);
        $info = Supprimerbiens($pdo, $_DELETE['ref']);
        echo json_encode($info);
        break;
}

$retour = '<form action="webservice.php" name="retour">
<input type="submit" value="Retour au menu">
</form>';

//echo $retour;