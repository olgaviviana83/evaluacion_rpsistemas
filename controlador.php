<?php
require_once("modelo.php");

//conexion
class Controlador{
    public $modelo;
    public function __construct(){
        //asigno a la variable la conexion a la db
        //$this->$modelo = new Modelo();
    }

    //crear metodo para mostrar registro
    static function  inicio(){
        $modelo = new Modelo();
        $personas = $modelo->mostrar("personas");
        //paso resultado obtenido a la vista
        require_once("vista.php");
    }

    static function guardar(){
        $dni=$_REQUEST['dni'];
        $nombre=$_REQUEST['nombre'];
        $data = $dni.", '" .$nombre. "' ";
        //instancia de objeto
        $modelo = new Modelo();
        $personas = $modelo->insertar("personas", $data);
        
        //redireccionamos
        header("location:http://localhost/sorteo/");
    }
    
    static function noimportaorden(){
        //obtengo la cantidad de ganadores solicitada
       $nroganadores=$_REQUEST['nroganadores'];
          //obtengo cantidad de registros en db
          $modelo = new Modelo();
          $max = $modelo->contar("personas");
        //printf($max[0]);

        if($nroganadores < $max){
            //genero nuemeros aleatorios
            $aleatorios = array();
            while( sizeof($aleatorios) <= $nroganadores )
            {
                $nuevo = rand(0, $max);
                if (!in_array($nuevo, $aleatorios))
                    $aleatorios[] = $nuevo;
            }
            //transformo array en string
            $lista = implode(',', $aleatorios);

            //----
            //ahora realizo sorteo aleatorio en la base de datos
            $modelo = new Modelo();
            $personas = $modelo->sorteo_sin_orden("personas", $lista);

            //paso el resultado obtenido a la vista
            require_once("vista_ganadores_no_importa_orden.php");

            }
            else{
                //caso en el que el numero de ganadores supera al numero de registros en db

            }
        
}

        static function siimportaorden(){
             //obtengo la cantidad de ganadores solicitada
            $nroganadores=$_REQUEST['nroganadores'];

            //obtengo cantidad de registros en db
            $modelo = new Modelo();
            $max = $modelo->contar("personas");
            //printf($max[0]);

            if($nroganadores < $max){

                 //----
            //ahora realizo sorteo aleatorio en la base de datos
            $modelo = new Modelo();
            $personas = $modelo->sorteo_con_orden("personas", $nroganadores);

            //paso el resultado obtenido a la vista
            require_once("vista_ganadores_si_importa_orden.php");
            
            }else{
                //caso en el que el numero de ganadores supera al numero de registros en db
            }

    }

}
