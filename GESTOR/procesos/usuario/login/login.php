<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

    session_start(); //siempre al ocupar sesiones con est funcion si puedo crearlas
    require_once "../../../clases/Usuario.php";

    $usuario = $_POST['login'];
    $contraseña = sha1($_POST['contraseña']);//sha1 encripta la info

    $usuarioObj = new Usuario();

    echo $usuarioObj->login($usuario, $contraseña);

?>