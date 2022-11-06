<?php
//llamo al controlador
require_once("controlador.php");

if(isset($_GET['metodo'])){
    if(method_exists("Controlador", $_GET['metodo'])){
        Controlador::{$_GET['metodo']}();
    }
}else{
        //invoco metodo del controlador
        Controlador::inicio();
    }


?>
