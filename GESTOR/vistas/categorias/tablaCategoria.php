<?php
    session_start();
    require_once "../../clases/Conexion.php";//solicita conexion de la carpeta clases
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();
?>



<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaCategoriasDataTable">
        <thead>
            <tr style="text-align: center;">
            <td>Nombre</td>
            <td>Fecha</td>
            <td>Editar</td>
            <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>

        <?php
            $sql = "SELECT id_categoria,
                           nombre,
                           fechaInsert
                    FROM t_categorias
                    WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_array($result)){
                $idCategoria = $mostrar['id_categoria']; //con idCategoria creo una funcion en categoria.js para eliminar un elemento
        ?>

            <tr style="text-align: center;">
                <td><?php echo $mostrar['nombre']; ?></td>
                <td><?php echo $mostrar['fechaInsert']; ?></td>
                <td>
                    <span class="btn-warning btn-sm" 
                          onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-toggle="modal" data-target="#modalActualizarCategoria"> <!--esta f(x) la declaro en categorias.js-->
                        <span class="far fa-edit"></span>
                    </span>

                </td>
                <td>
                    <span class="btn-danger btn-sm" 
                          onclick="eliminarCategorias('<?php echo $idCategoria ?>')"> 
                        <span class="far fa-trash-alt"></span>
                    </span>

                </td>
            </tr>
        <?php
            } //es un bucle en tr (se debe repetir las veces necesarias)
        ?>    
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategoriasDataTable').DataTable();        
    })
</script>