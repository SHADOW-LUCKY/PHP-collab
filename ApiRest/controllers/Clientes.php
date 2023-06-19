<?php
require_once("../Conexion/Conexion.php");
require_once("../Models/Models.php");
$Clientes = new Clientes();
$body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $Clientes->get_Clientes();
            echo json_encode($datos);
        break;
        
        case "Insert":
            $datos=$Clientes->insertClientes($body["CompanyName"],$body["Telefono"],$body["Email"]);
            echo json_encode("Clientes insertado correctamente");
        break;
        
        case "Delete":
            $datos=$Clientes->deleteCliente($body["Cliente_ID"]);
            echo json_encode("Clientes eliminado correctamente");
        break;
    }
?>