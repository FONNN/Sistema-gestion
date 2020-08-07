<?php
    session_start();

    if (isset($_SESSION['correo'])) {
        include "header.php"; 
?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Proyectos</h1>

                <div class="row">
                   <div class="col-sm-4">
                    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
                        <span class="fas fa-plus-circle"></span> Agregar nuevo proyecto
                    </span>
                   </div> 
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="tablaCategoria"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmCategorias">
                            <label>Nombre del proyecto</label>
                            <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmActualizaCategoria">
                    <input type="text" id="idCategoria" name="idCategoria" hidden="">
                    <label>Proyecto</label>
                    <input type="text" id="categoriaU" name="categoriaU" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
            </div>
            </div>
        </div>
        </div>



<?php
        include "footer.php";
?>
    <!--Dependencia de categorias, todas las funciones de js de categorias-->
    <script src="../js/categorias.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaCategoria').load("categorias/tablaCategoria.php");

            $('#btnGuardarCategoria').click(function(){//al hacer click permite ejecutar una accion
                agregarCategoria(); //funcion alojada en categoria.js
            });

            $('#btnActualizaCategoria').click(function(){
                actualizarCategoria();
            });
        });
    </script>   

<?php
    
    } else {
        header("location:../index.php");
    }
?>