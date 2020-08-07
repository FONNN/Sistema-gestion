<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login</title>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/login.png" id="icon" alt="User Icon" />
      <h1>Iniciar sesión</h1>
    </div>

    <!-- Login Form -->
    <form method="post" id="frmLogin" onsubmit="return logear()" autocomplete="off"> <!--regresar funcion login-->
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="correo" required="">
      <input type="password" id="contraseña" class="fadeIn third" name="contraseña" placeholder="contraseña" required="">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="registro.php">Registrar</a>
    </div>

  </div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<script type="text/javascript">
  function logear() {
    $.ajax({
      type:"POST",
      data:$('#frmLogin').serialize(),
      url:"procesos/usuario/login/login.php",
      success:function(respuesta){
          respuesta = respuesta.trim();
          if (respuesta == 1) {
            window.location = "vistas/inicio.php";
          } else {
              swal(":(", "Error al ingresar", "Error");
          }
      }

    });

    return false;

  }
</script>

</body>
</html>