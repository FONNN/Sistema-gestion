function agregarArchivosGestor() {
    var formData = new FormData(document.getElementById('frmArchivos'));//FormData() objeto javascript nativo que permite enviar archivos

    //ahorro ingresar controles 1 por 1, reconoce el formulario como html aunque traiga archivos
    $.ajax({
        url:"../procesos/gestor/guardarArchivos.php",
        type:"POST",
        datatype:"html",
        data: formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
            console.log(respuesta);
            
            respuesta = respuesta.trim();

            if(respuesta == 1) {
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                swal(":D", "Agregado con éxito", "success");
            } else {
                swal(":(", "Falló al agregar", "error");
            }
        }
    });
}
//f(x) va en la tabla gestor
function eliminarArchivo(idArchivo){
    //prompt
    swal({
        title: "Esta seguro que desea eliminar el archivo?",
        text: "Una vez eliminado, no podrá ser recuperado",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type:"POST",
            data:"idArchivo=" + idArchivo,
            url:"../procesos/gestor/eliminaArchivo.php",
            success:function(respuesta){

                respuesta = respuesta.trim();
                if(respuesta == 1) {
                    $('#tablaGestorArchivos').load("gestor/tablaGestor.php");//refresca tabla
                    swal("Eliminado con éxito", {
                        icon: "success",
                    });
                } else {
                    swal("Error al eliminar", {
                        icon: "error",
                    });
                }

                
            }    
          });
        }
      });
}
//indica nombre documento al click visualizar
function obtenerArchivoPorId(idArchivo) {
    $.ajax({
        type:"POST",
        data:"idArchivo=" + idArchivo,
        url:"../procesos/gestor/obtenerArchivo.php",
        success:function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    })
}