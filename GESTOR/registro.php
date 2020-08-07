<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Registro</title>

    <!--CSS-->    
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

   <!--=============CONTENIDO=============-->
   <div class="container">
        <h1 class="text-center">Registro de usuario</h1>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label>Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" required="">
                    <label>Número de carnet</label>
                    <input type="text" name="ci_usuario" id="ci_usuario" class="form-control" required="">
                    <label>Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control" required="">
                    <label>Cree su contraseña</label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control" required="">
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-success">Registrar</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-warning">Login</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
<!--para utilizar ajax-->     
<script src="js/jquery-3.5.1.min.js"></script>

<script src="js/sweetalert.min.js"></script>

<script type="text/javascript">
    function agregarUsuarioNuevo() {

        $.ajax({
            type: "POST",
            data: $('#frmRegistro').serialize(),
            url: "procesos/usuario/registro/agregarUsuario.php",
            success:function(respuesta){
                respuesta = respuesta.trim(); /*trim es una f(x) que elimina los espacios de derecha e izquierda */
                //alert(respuesta);
                if (respuesta == 1) {
                    $("#frmRegistro")[0].reset(); /*resetea formulario */
                    swal(":D", "Agregado con éxito!", "Success");
                } else if (respuesta = 2){
                    swal("Este usuario ya existe, por favor ingrese otro.");
                } else {
                    swal(":(", "Falló al agregar!", "Error");
                }
            }
        });

        return false;
    };
</script>    
</body>
</html>