<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); 

require_once "Conexion.php";

class Usuario extends Conectar{

    public function agregarUsuario($datos) {
        $conexion = Conectar::conexion();

        if (self::buscarUsuarioRepetido($datos['correo'])) {
            return 2;
        } else {
            //se crea el query
            $sql = "INSERT INTO t_usuarios (nombre,
                                            apellido,
                                            ci_usuario,
                                            correo,
                                            contraseña) 
                        VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql); //prepare es un metodo de la api sqli que prepara el query

            $query->bind_param('sssss', $datos['nombre'],
                                        $datos['apellido'],
                                        $datos['ci_usuario'],
                                        $datos['correo'],
                                        $datos['contraseña'],
                                        );
            $exito = $query->execute(); //ejecuto query
            $query->close(); //cierro query para liberar buffer y liberar la carga de trabajo
            return $exito;//ejecuta la respuesta
        }
    }

    //método para que busque en la base de datos si existe ese usuario
    public function buscarUsuarioRepetido($usuario) {
        //conexion a la tabla de usuarios
        $conexion = Conectar::conexion(); 

        $sql = "SELECT correo
                FROM t_usuarios
                WHERE correo = '$usuario'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);
        if (is_array($datos)) {
            if (count($datos) > 0) {
                if ($datos['correo'] != "" || $datos['correo'] == $usuario) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }else {
            return false;
        } 
        /*
        if ($datos['correo'] != "" || $datos['correo'] == $usuario) {
            return 1;
        } else {
            return 0;
        }
        */
    }

    public function login($usuario, $contraseña) {
        $conexion = Conectar::conexion(); //llamo a la conexion

        $sql = "SELECT count(*) as existeUsuario /*alias del count para catchearlo facil*/
                FROM t_usuarios 
                WHERE correo = '$usuario' 
                AND contraseña = '$contraseña'";
        $result = mysqli_query($conexion, $sql);

        /*regresa un contador de registro con los parametros $usuario y $contraseña*/
        $respuesta = mysqli_fetch_array($result)['existeUsuario'];//manda a llamar por nombre (existeUsuario)

        if ($respuesta > 0) {
            $_SESSION['correo'] = $usuario; //creo usuario

            $sql = "SELECT id_usuario
                    FROM t_usuarios 
                    WHERE correo = '$usuario' 
                    AND contraseña = '$contraseña'";
            $result = mysqli_query($conexion, $sql);
            $idUsuario = mysqli_fetch_row($result)[0];//llamo por número de arreglo, los campos se transforman en arreglos

            $_SESSION['idUsuario'] = $idUsuario; //creo idUsuario

            return 1;
        } else {
            return 0;
        }
    }
}

?>