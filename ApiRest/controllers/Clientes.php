<?php
require_once("../Models/Models.php");
$Clientes = new Clientes();

 */
    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $Clientes->get_Clientes();
            echo json_encode($datos);
        break;

        case 'GetId':
            $datos = $Clientes->get_Clientes_id($_POST["id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$Clientes->insert_Clientes($_POST["nombre_Clientes"],$_POST["edad_Clientes"],$_POST["especialidad"],$_POST["cargo"]);
            echo json_encode("Psicologa insertado correctamente");
        break;

        case "Update":
            $datos=$Clientes->update_Clientes($body["id"], $body["imagen"],$body["nombre"],$body["edad"] ,$body["promedio"] ,$body["nivelCAmpus"], $body["nivelIngles"] , $body["especialidad"] , $body["direccion"] , $body["celular"] , $body["ingles"] , $body["Ser"] , $body["Review"] , $body["Skills"] , $body["Asitencia"]);
            echo json_encode("Clientes actualizado correctamente");
        break;
        
        case "Delete":
            $datos=$Clientes->delete_Persona($_POST["id"]);
            echo json_encode("Psicologa eliminado correctamente");
        break;
    }
?>