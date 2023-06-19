<?php
require_once("../Conexion/Conexion.php");
require_once("../Models/Models.php");
$Empleados = new Empleados();
$body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $Empleados->getEmpleados();
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$Empleados->insertEmpleados($body["Empleado_nombre"],$body["Telefono"],$body["Email"]);
            echo json_encode("Empleado insertado correctamente");
        break;

        case "Update":
            $datos=$Empleados->update_Empleados($body["id"],$body["CompanyName"],$body["Telefono"],$body["Email"]);
            echo json_encode("Empleados actualizado correctamente");
        break;
        
        case "Delete":
            $datos=$Empleados->deleteCliente($body["id"]);
            echo json_encode("Empleados eliminado correctamente");
        break;
    }
?>