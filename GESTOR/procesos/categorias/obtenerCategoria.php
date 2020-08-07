<?php

    require_once "../../clases/Categorias.php";
    $Categorias = new Categorias();

    //creo obtenerCategoria en Categorias.php
    echo json_encode($Categorias->obtenerCategoria($_POST['idCategoria'])); //transforma el arreglo $datos de Categorias.php en una cadena json para ser tratado en categorias.js

?>