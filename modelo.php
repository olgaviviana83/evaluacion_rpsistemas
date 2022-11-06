<?php
class Modelo{
    private $Modelo;
    private $db;
    private $personas;
    public function __construct(){
        $this->Modelo = array();
        $this->db = new PDO('mysql:host=localhost; dbname=sorteo', 'root', '');
    }

    public function mostrar($tabla){
        //$consulta = "SELECT * FROM " . $tabla. " WHERE " .$condicion. ";";
        $consulta = "SELECT * FROM " . $tabla;
        $resultado =$this ->db -> query($consulta);
        while($filas = $resultado -> FETCHALL(PDO::FETCH_ASSOC)){
            //el resultado es un objeto y lo paso al array
            $this -> personas[] =$filas;
        }
        return $this -> personas;
    }

    public function insertar($tabla, $data){

        $consulta = " INSERT INTO " . $tabla. " VALUES(NULL, " .$data. ")";
        $resultado =$this ->db -> query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function contar($tabla){
        
        $consulta = "SELECT COUNT(id) AS COUNT FROM " . $tabla;
        $resultado =$this ->db -> query($consulta);
        $filas = $resultado -> fetch();
        return $filas[0];
    }

    public function sorteo_sin_orden($tabla, $lista){
        //recibo la lista de numeros aleatorios
        $consulta = "SELECT *FROM " .$tabla. "  WHERE id IN (" .$lista. ")";
        $resultado =$this ->db -> query($consulta);
        while($filas = $resultado -> FETCHALL(PDO::FETCH_ASSOC)){
            //el resultado es un objeto y lo paso al array
            $this -> personas[] =$filas;
        }
        //devuelve lista de personas ganadoras
        return $this -> personas;
    }

    public function sorteo_con_orden($tabla, $nroganadores){
        //recibo la lista de numeros aleatorios
       
        $consulta = "SELECT *FROM " .$tabla. "  ORDER BY RAND() LIMIT " .$nroganadores;
        $resultado =$this ->db -> query($consulta);
        while($filas = $resultado -> FETCHALL(PDO::FETCH_ASSOC)){
            //el resultado es un objeto y lo paso al array
            $this -> personas[] =$filas;
        }
        //devuelve lista de personas ganadoras
        return $this -> personas;
    }

    public function actualizar(){
        
    }

    public function eliminar(){
        
    }
}
