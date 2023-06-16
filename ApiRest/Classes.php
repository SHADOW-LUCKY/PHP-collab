<?php
require_once("conexion/Conexion.php");
Class Salidas extends Conectar{
    /* Variables */
    private $id;
    private $fecha;
    private $hora;
    private $cliente;
    private $matricula;
    private $empleado;
    private $peso;
    private $observaciones;
    /* Variables Detalles */
    private $id_alquiler;
    private $id_producto;
    private $id_obra;
    private $cantidadSalida;
    private $cantidadPropia;
    private $cantidadSub;
    private $valorUnit;
    private $diasAlquila;
    private $estado;
    /* conexion a la base de datos */
    protected $dbCnx;
    /* Constructor */
    public function __construct($id=0,$fecha="",$hora="",$cliente=0,$matricula="",$empleado=0,$peso="",$observaciones="",$id_alquiler=0,$id_producto=0,$id_obra=0,$cantidadSalida=0,$cantidadPropia=0,$cantidadSub=0,$valorUnit=0,$diasAlquila=0,$estado=""){
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->cliente = $cliente;
        $this->matricula = $matricula;
        $this->empleado = $empleado;
        $this->peso = $peso;
        $this->observaciones = $observaciones;
        $this->id_alquiler = $id_alquiler;
        $this->id_producto = $id_producto;
        $this->id_obra = $id_obra;
        $this->cantidadSalida = $cantidadPropia+$cantidadSub;
        $this->cantidadPropia = $cantidadPropia;
        $this->cantidadSub = $cantidadSub;
        $this->valorUnit = $valorUnit;
        $this->diasAlquila = $diasAlquila;
        $this->estado = $estado;
        parent::__construct($dbCnx);
    }
    /* Getters */
        
} 
Class Empleados extends Conectar{
    /* Variables */
    private $id;
    private $nombre;
    private $email;
    private $telefono;
    /* conexion a la base de datos */
    protected $dbCnx;
    /* Constructor */
    public function __construct($id=0,$nombre="",$email="",$telefono=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        parent::__construct($dbCnx);
    }
    /* Getters */
    public function getID(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    /* Setters */
    public function setID($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    /* Metodos */
    public function Insert(){
        try {
            $stat = $this->dbCnx->prepare("INSERT INTO Empleado(Empleado_nombre,Email,Telefono) VALUES(?,?,?)");
            $stat -> execute([$this->nombre,$this->email,$this->telefono]);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function selectAll() {
        try {
            $stat=$this->dbCnx->prepare("SELECT * FROM Empleado");
            $stat->execute();
            return $stat->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        } 
    }
}
class Clientes extends Conectar{
    /* Variables */
    private $id;
    private $company;
    private $email;
    private $telefono;
    /* conexion a la base de datos */
    protected $dbCnx;
    /* Constructor */
    public function __construct($id=0,$company="",$email="",$telefono=""){
        $this->id = $id;
        $this->company = $company;
        $this->email = $email;
        $this->telefono = $telefono;
        parent::__construct($dbCnx);
    }
    /* Getters */
    public function getID(){
        return $this->id;
    }
    public function getCompany(){
        return $this->company;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    /* Setters */
    public function setID($id){
        $this->id = $id;
    }
    public function setCompany($company){
        $this->company = $company;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    /* Metodos */
    public function Insert(){
        try {
            $stat = $this->dbCnx->prepare("INSERT INTO Cliente(CompanyName,Email,Telefono) VALUES(?,?,?)");
            $stat -> execute([$this->company,$this->email,$this->telefono]);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function selectAll() {
        try {
            $stat=$this->dbCnx->prepare("SELECT * FROM Cliente");
            $stat->execute();
            return $stat->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        } 
    }
    
    
}    
?>