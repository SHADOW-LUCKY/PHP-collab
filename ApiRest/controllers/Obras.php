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

        case "Update":
            $datos=$Obras->update_Obras($body["id"],$body["CompanyName"],$body["Telefono"],$body["Email"]);
            echo json_encode("Obras actualizado correctamente");
        break;
        
        case "Delete":
            $datos=$Obras->deleteCliente($body["id"]);
            echo json_encode("Obras eliminado correctamente");
        break;   
    }
?>