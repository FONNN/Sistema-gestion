<?php

    require_once "Conexion.php";

    class Gestor extends Conectar {
        public function agregaRegistroArchivo($datos) { //metodo agregaRegistroArchivo agrega un registro a la base de datos que va relacionada al archivo que se sube en el formulario
            $conexion = Conectar::conexion();
            $sql = "INSERT INTO t_archivos (id_usuario,
                                            id_categoria,
                                            nombre,
                                            tipo,
                                            ruta) 
                                VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iisss", $datos['idUsuario'],
                                        $datos['idCategoria'],
                                        $datos['nombreArchivo'],
                                        $datos['tipo'],
                                        $datos['ruta']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        //nombre lo utilizo para acceder a la ruta
        public function obtenNombreArchivo($idArchivo) {
            $conexion = Conectar::conexion();
            $sql = "SELECT nombre 
                    FROM t_archivos 
                    WHERE id_archivo = '$idArchivo'";
            $result = mysqli_query($conexion, $sql);

            return mysqli_fetch_array($result)['nombre'];
        }

        public function eliminarRegistroArchivo($idArchivo) {
            $conexion = Conectar::conexion();
            $sql = "DELETE FROM t_archivos WHERE id_archivo = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idArchivo);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerRutaArchivo($idArchivo) {
            $conexion = Conectar::conexion();
            $sql = "SELECT nombre, tipo 
                    FROM t_archivos 
                    WHERE id_archivo = '$idArchivo'";
            $result = mysqli_query($conexion, $sql);
            $datos = mysqli_fetch_array($result);
            $nombreArchivo = $datos['nombre'];
            $extension = $datos['tipo'];
            return self::tipoArchivo($nombreArchivo, $extension);
        }

        public function tipoArchivo($nombre, $extension) {
            $idUsuario = $_SESSION['idUsuario'];

            $ruta = "../archivos/" . $idUsuario . "/" . $nombre;

            switch ($extension) {
                case 'png':
                    return '<img src="'. $ruta .'" width="50%">';
                    break;
                
                case 'jpg':
                    return '<img src="'. $ruta .'" width="50%">';
                    break;

                case 'jpeg':
                    return '<img src="'. $ruta .'" width="50%">';
                    break;
                    
                case 'pdf':
                    return '<embed src="'. $ruta .'#toolbar=0&navpanes=0&scrolbar=0" type"application/pdf" width="100%" height="600px" />';
                    break;

                case 'docx':
                    # code...
                    break;
    
                case 'txt':
                    # code...
                    break;
                        
                case 'xls':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        
    }
   

?>