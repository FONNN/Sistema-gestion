//agregarCategoria me lleva a: agregarCategoria.php
function agregarCategoria() {
    var categoria = $('#nombreCategoria').val();

    if (categoria == "")  {
        swal("Debe agregar una categoría");
        return false;
    } else {
        $.ajax({
            type:"POST",
            data:"categoria=" + categoria,
            url:"../procesos/categorias/agregarCategoria.php",
            success:function(respuesta){
                respuesta = respuesta.trim(); 
                if (respuesta == 1) {
                    $('#tablaCategoria').load("categorias/tablaCategoria.php");//recarga la tabla luego de agregar
                    $('#nombreCategoria').val("");
                    swal(":D", "Agregado con éxito", "success");
                } else {
                    swal(":(", "Falló al agregar", "error");    
                }       
            }
        });
    }
}
//elimino categoria desde tablaCategoria.php
function eliminarCategorias(idCategoria) {
    idCategoria = parseInt(idCategoria);
    if (idCategoria < 1) {
        swal("No tiene id categoría");
        return false;
    } else {
        //****************************sweet alert, pregunta para borrar categoria
        swal({
            title: "Desea eliminar esta categoría-proyecto?",
            text: "Una vez eliminada, no podrá recuperarse...",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:"POST",
                    data:"idCategoria=" + idCategoria,
                    url:"../procesos/categorias/eliminarCategoria.php",//creo eliminarCategoria.php
                    success:function(respuesta){
                        respuesta = respuesta.trim();
                        if (respuesta == 1) {
                            $('#tablaCategoria').load("categorias/tablaCategoria.php");//recargar la tabla luego de eliminar
                            swal("Eliminado con éxito!", {
                                icon: "success",
                            });
                        } else {
                            swal(":(", "Falló al eliminar", "error"); //la foreignkey sólo permite eliminar una categoria vacía
                        }

                    }
                });
            } 
          });
        //****************************
        
    }
}
//obtener categoria recibe id de categoria mediante post
function obtenerDatosCategoria(idCategoria){
    $.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../procesos/categorias/obtenerCategoria.php",//lo creo en categorias
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta); //recibe cadena json y lo transofrma en un objeto json valido

            $('#idCategoria').val(respuesta['idCategoria']);
            $('#categoriaU').val(respuesta['nombreCategoria']);

        }
    })
}

function actualizarCategoria(){
    if ($('#categoriaU').val() == "") {
        swal("No hay categoría");
        return false;
    } else {
        $.ajax({
            type:"POST",
            data:$('#frmActualizaCategoria').serialize(),
            url:"../procesos/categorias/actualizaCategoria.php",
            success:function(respuesta){
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    $('#tablaCategoria').load("categorias/tablaCategoria.php"); //se crea en procesos
                    swal(":D", "Actualizado con éxito", "success");
                } else {
                    swal(":(", "Falló al actualizar", "error");
                }

            }    
        })
    }
}