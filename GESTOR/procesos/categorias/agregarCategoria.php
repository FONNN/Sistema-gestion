<?php
//me lleva a: Categorias.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    session_start();

    require_once "../../clases/Categorias.php";
    $Categorias = new Categorias();

    $datos = array (
            "idUsuario" => $_SESSION['idUsuario'],
            "categoria" => $_POST['categoria']
                   );
    
    echo $Categorias->agregarCategoria($datos);

?>