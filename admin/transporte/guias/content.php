<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;"><i class="far fa-file-alt"></i> Guías</h1>
    <a href="formatos/?id=1" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm evento">
        <i class="far fa-file-alt"></i>
        Descargar Excel
    </a>
</div>

<div class="row">

    <div class="col-md-12">

        <?php

        display_flash_message();

        ?>

    </div>

    <div class="col-md-8">

        <!-- <i class="fas fa-truck-loading"></i> -->

        <?php require "tabla.php" ?>

    </div>

    <div class="col-md-4">

        <?php require "form.php";  ?>

    </div>

</div>