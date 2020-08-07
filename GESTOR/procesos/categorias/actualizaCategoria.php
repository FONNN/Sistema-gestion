<?php

   require_once "../../clases/Categorias.php";
   $Categorias = new Categorias();

   $datos = array (
            "idCategoria" => $_POST['idCategoria'],
            "categoria" => $_POST['categoriaU']
            );
   
   echo $Categorias->actualizarCategoria($datos);

?>