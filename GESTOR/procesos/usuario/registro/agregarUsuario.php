<?php 
error_reporting(E_ALL);
ini_set('display_errors', 0);
    require_once "../../../clases/Usuario.php";

    $contraseña = sha1($_POST['contraseña']); //sha1, f(x) para encriptar
    $datos = array(
                "nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido'],
                "ci_usuario" => $_POST['ci_usuario'],
                "correo" => $_POST['correo'],
                "contraseña" => $contraseña
                );
    
    $usuario = new Usuario();
    echo $usuario->agregarUsuario($datos); //agrego datos como parámetros
    
/*    
    $b = new Usuario();
    
    echo "si paso2";
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$carnet = $_POST['carnet'];
$correo = $_POST['Correo'];
$password = $_POST['password'];

$b->agregarUsuario($nombre,$apellido,$carnet,$correo,$password);



    print_r($_POST);
*/
?>