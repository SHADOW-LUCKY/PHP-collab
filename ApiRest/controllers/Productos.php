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
            $datos=$Productos->insertProductos($body["Producto_nombre"],$body["Producto_descripcion"],$body["Producto_precio"],$body["Producto_stock"],);
            echo json_encode("Productos insertado correctamente");
        break;
        
        case "Delete":
            $datos=$Productos->deleteProducto($body["Producto_ID"]);
            echo json_encode("Productos eliminado correctamente");
        break;
    }
?>