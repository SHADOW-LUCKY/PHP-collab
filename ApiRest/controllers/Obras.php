<?php
require_once("../Conexion/Conexion.php");
require_once("../Models/Models.php");
$Obras = new Obras();
$body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $Obras->getObras();
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$Obras->insertObras($body["Obra_nombre"],$body["ClienteObra"]);
            echo json_encode("Obras insertado correctamente");
        break;
        
        case "Delete":
            $datos=$Obras->deleteObra($body["Obra_ID"]);
            echo json_encode("Obras eliminado correctamente");
        break;   
    }
?>