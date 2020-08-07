<?php
//camino de vuelta es: agregarCategoria.php/categorias.js/categorias.php  


    require_once "Conexion.php";
    class Categorias extends Conectar {
        public function agregarCategoria($datos) {
            $conexion = Conectar::conexion();

            $sql = "INSERT INTO t_categorias (id_usuario, nombre) 
                            VALUES (?, ?)";
            
            $query = $conexion->prepare($sql);            
            $query->bind_param("is", $datos['idUsuario'],//is = integer, string
                                     $datos['categoria']);            
                                     
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }

        //metodo eliminar va en esta f(x)
        public function eliminarCategorias($idCategoria) {
            $conexion = Conectar::conexion();

            $sql = "DELETE FROM t_categorias 
                    WHERE id_categoria = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idCategoria);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        //esta f(x) regresa a obtenerCategoria.php
        public function obtenerCategoria($idCategoria) {
            $conexion = Conectar::conexion();

            $sql = "SELECT id_categoria, 
                           nombre 
                    FROM t_categorias 
                    WHERE id_categoria = '$idCategoria'";
            $result = mysqli_query($conexion, $sql);

            $categoria = mysqli_fetch_array($result);
            $datos = array(
                        "idCategoria" => $categoria['id_categoria'],  //esto se transforma en json para poder tratarlo en js en 
                        "nombreCategoria" => $categoria['nombre']     //  
                     );
            return $datos;
        }

        public function actualizarCategoria($datos) {
            $conexion = Conectar::conexion();

            $sql = "UPDATE t_categorias 
                    SET nombre = ?
                    WHERE id_categoria = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("si", $datos['categoria'],
                                     $datos['idCategoria']);//sigo el orden de actualizarCategoria
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }

    }

?>