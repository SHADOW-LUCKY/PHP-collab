<?php
require_once("../Conexion/Conectar.php");

class Clientes extends Conectar{
    public function __construct(){
        parent::__construct();
    }

    public function get_Clientes(){
        try {
            $sql = "SELECT * FROM Clientes";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getClientesID($ID){
        try {
            $sql = "SELECT * FROM Clientes WHERE id_Cliente = ?";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$ID);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertClientes($company,$telefono,$email){
        try {
            $sql = "INSERT INTO Clientes (CompanyName,Telefono,Email) VALUES (?, ?, ?)"; 
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$edad);
            $stm->bindValue(3,$telefono);
            $stm->bindValue(4,$sexo);
            $stm->bindValue(5,$direccion);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteCliente($ID){
        try {
            $sql = "DELETE FROM campers WHERE id = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1, $ID);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
class Empleados extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    function getEmpleados(){
        try {
            $sql = "SELECT * FROM Empleados";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function getEmpleadosID($ID) {
        try {
            $sql = "SELECT * FROM Empleados WHERE id_Empleado = ?";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindValue(1,$ID);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function insertEmpleados( $nombre,$telefono,$email){
        try {
            $sql = "INSERT INTO Empleados(Empleado_nombre,Telefono,Email) VALUES (?, ?, ?)"; 
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

}
?>