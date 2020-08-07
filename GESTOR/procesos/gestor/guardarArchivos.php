<?php
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();

    //creo clase que se llame Gestor.php

    $idCategoria = $_POST['categoriasArchivos'];
    $idUsuario = $_SESSION['idUsuario'];

    if($_FILES['archivos']['size'] > 0){

        $carpetaUsuario = '../../archivos/' .$idUsuario;

        if(!file_exists($carpetaUsuario)) {
            mkdir($carpetaUsuario, 0777, true);
        }

        $totalArchivos = count($_FILES['archivos']['name']); //todos los archivos que vengan en un total (del arreglo archivos[] del formulario)

        for ($i=0; $i < $totalArchivos; $i++) {//1. inicializado en 0, lo envia al arreglo y agrega un aumento, [$i] es el contador
            $nombreArchivo = $_FILES['archivos']['name'][$i];//2. imprime todos los archivo que vengan (nombre/atributo/indice)
            $explode = explode('.', $nombreArchivo);
            $tipoArchivo = array_pop($explode);

            $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];   
            $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;

            $datosRegistroArchivo = array(
                                        "idUsuario" => $idUsuario,
                                        "idCategoria" => $idCategoria,
                                        "nombreArchivo" => $nombreArchivo,
                                        "tipo" => $tipoArchivo,
                                        "ruta" => $rutaFinal
                                         );

            if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                $respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
            }

                        
        }

        echo $respuesta;
    } else {
        echo 0;
    }

    //echo $_FILES['archivos']['name'][$i];//2. imprime todos los archivo que vengan (nombre/atributo/indice)
    
?>