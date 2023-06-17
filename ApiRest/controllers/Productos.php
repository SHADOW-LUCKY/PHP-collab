<?php
require_once("../Conexion/Conexion.php");
require_once("../Models/Models.php");
$Productos = new Productos();
$body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $Productos->getProductos();
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$Productos->insertProductos($body["CompanyName"],$body["Telefono"],$body["Email"]);
            echo json_encode("Productos insertado correctamente");
        break;

        case "Update":
            $datos=$Productos->update_Productos($body["id"],$body["CompanyName"],$body["Telefono"],$body["Email"]);
            echo json_encode("Productos actualizado correctamente");
        break;
        
        case "Delete":
            $datos=$Productos->deleteCliente($body["id"]);
            echo json_encode("Productos eliminado correctamente");
        break;
    }
?>