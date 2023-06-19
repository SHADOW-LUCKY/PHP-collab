<?php
require_once("../Conexion/Conexion.php");

class Clientes extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    #metodos
    public function get_Clientes(){
        try {
            $sql = "SELECT * FROM Cliente";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getClientesID($ID){
        try {
            $sql = "SELECT * FROM Cliente WHERE Cliente_ID = ?";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$ID);
            $stm -> execute();
            return $stm -> fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    #insert
    public function insertClientes($company,$telefono,$email){
        try {
            $sql = "INSERT INTO Cliente(CompanyName,Telefono,Email) VALUES (?, ?, ?)"; 
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$company);
            $stm->bindValue(2,$telefono);
            $stm->bindValue(3,$email);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteCliente($ID){
        try {
            $sql = "DELETE FROM Cliente WHERE Cliente_ID = ?";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1, $ID);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
#empleados
#empleados
#empleados
class Empleados extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    #metodos
    function getEmpleados(){
        try {
            $sql = "SELECT * FROM empleado";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function getEmpleadosID($ID) {
        try {
            $sql = "SELECT * FROM empleado WHERE Empleado_ID = ?";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$ID);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    #insert
    function insertEmpleados( $nombre,$telefono,$email){
        try {
            $sql = "INSERT INTO empleado(Empleado_nombre,Telefono,Email) VALUES (?, ?, ?)"; 
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$telefono);
            $stm->bindValue(3,$email);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
#Productos
#Productos
#Productos
Class Productos extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    #metodos
    function getProductos(){
        try {
            $sql = "SELECT * FROM productos";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    #insert
    function insertProductos($nombre,$descripcion,$precio,$stock){
        try {
            $sql = "INSERT INTO productos(Producto_nombre,Producto_descripcion,Producto_precio,Producto_stock) VALUES (?, ?, ?, ?)"; 
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$descripcion);
            $stm->bindValue(3,$precio);
            $stm->bindValue(4,$stock);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }

}
#Obras
#Obras
#Obras
Class Obras extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    #metodos
    function getObras(){
        try {
            $sql = "SELECT * FROM Obras";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    #insert
    function insertObras($Obra_nombre,$ClienteObra){
        try {
            $sql = "INSERT INTO Obras(Obra_nombre,ClienteObra) VALUES (?, ?)"; 
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$Obra_nombre);
            $stm->bindValue(2,$ClienteObra);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function INNERObras(){
        try {
            $sql = "SELECT Obras.Obra_nombre, Cliente.CompanyName FROM Obras Obras INNER JOIN Cliente ON Obras.ClienteObra = Cliente.Cliente_ID;";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>