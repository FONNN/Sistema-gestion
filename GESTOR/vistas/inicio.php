<?php
    session_start();

    if (isset($_SESSION['correo'])) {
        include "header.php"; 
?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                </div>
            </div>
        </div>

     

<?php
    include "footer.php";
    }
?>
