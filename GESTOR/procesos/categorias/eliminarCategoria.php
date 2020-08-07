<?php

    session_start();
    require_once "../../clases/Categorias.php";
    $Categorias = new Categorias();

    echo $Categorias->eliminarCategorias($_POST['idCategoria']);//metodo eliminarCategoria está en Categorias.php (la de clases) y $_POST en categorias.js

?>