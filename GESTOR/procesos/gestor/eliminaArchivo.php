<?php

session_start();
require_once "../../clases/Gestor.php";
$Gestor = new Gestor(); //para new Gestor(), creo el método en la clase
$idArchivo = $_POST['idArchivo'];
$idUsuario = $_SESSION['idUsuario'];

$nombreArchivo = $Gestor->obtenNombreArchivo($idArchivo);

$rutaEliminar = "../../archivos/" . $idUsuario . "/" . $nombreArchivo;

if (unlink( $rutaEliminar)) {
    echo $Gestor->eliminarRegistroArchivo($idArchivo);
} else {
    echo 0;
}

?>