<?php
require "funciones.php";
require "../_layout/flash_message.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ALGUARISA - Registrar Oficio</title>

    <!-- Custom fonts for this template-->
    <link href="../../plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../plantilla/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../plantilla/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="../../plantilla/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plantilla/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            <?php require('../sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background: rgb(220,227,208);
background: linear-gradient(0deg, rgba(220,227,208,1) 29%, rgba(247,247,247,1) 90%);">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('../topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

            
               

                <div class="container-fluid">

                    <?php require "content.php" ?>

                </div>




                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require('../footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require ('../_layout/cargar_js.php') ?>
    <script src="app.js"></script>

  
</body>

</html>