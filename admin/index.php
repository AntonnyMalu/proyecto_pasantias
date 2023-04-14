<?php
require "funciones.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>ALGUARISA - Dashboard</title>
    <?php require "../admin/_layout/cargar_css.php"; ?>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            <?php require('_layout/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background: rgb(220,227,208);
background: linear-gradient(0deg, rgba(220,227,208,1) 29%, rgba(247,247,247,1) 90%);">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('_layout/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

            
               

                <div class="container-fluid">
                    <?php require "content.php"; ?>
                </div>




                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require('_layout/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    

    <?php require "_layout/cargar_js.php"; ?>
</body>

</html>