<?php
    session_start();
    if (isset($_SESSION['correo'])) {

        include "header.php"; 
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Archivos</h1>
            <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
                <span class="fas fa-plus-circle"></span> Agregar archivos
            </span>
            <hr>
            <div id="tablaGestorArchivos"></div>
        </div>
    </div>


<!-- Ventana Modal para agregar archivos -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar archivos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmArchivos" enctype="multipart/form-data" method="post"> <!--id para llamar el formulario, enctype catchar archivos del front al back -->
            <label>Proyecto</label>
            <div id="categoriasLoad"></div><!--es la vista que se carga-->
            <label>Seleccionar proyecto</label>
            <input type="file" name="archivos[]" id="archivos" class="form-control" multiple="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal visualizar archivo tabla -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vista archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id= "archivoObtenido" class=""></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <?php include "footer.php"; ?>
    
    <script src="../js/gestor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
            $('#categoriasLoad').load("categorias/selectCategorias.php");

            $('#btnGuardarArchivos').click(function(){
                agregarArchivosGestor();
            });

        });
    </script>

<?php
    } else {
        header("location:../index.php");
    }
?>