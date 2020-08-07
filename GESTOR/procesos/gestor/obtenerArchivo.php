<?php

session_start();
require_once "../../clases/Gestor.php";
$Gestor = new Gestor(); //para new Gestor(), creo el método en la clase Gestor
$idArchivo = $_POST['idArchivo'];

echo $Gestor->obtenerRutaArchivo($idArchivo);

?>