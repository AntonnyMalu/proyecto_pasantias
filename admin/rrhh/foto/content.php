<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;">
        <i class="far fa-image"></i> Cambiar Foto
    </h1>



    <a href="../nomina/" class="btn btn-light btn-icon-split">
        <span class="icon text-gray-600">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Volver a Nomina</span>
    </a>
</div>

<div class="row">

    <div class="col-md-12">

        <?php

        display_flash_message();

        ?>

    </div>

    <div class="col-md-4">
        <?php require "card_show.php"; ?>
    </div>

    <div class="col-md-4">
        <?php require "card_tomarfoto.php"; ?>
    </div>

    <div class="col-md-4">
        <?php require "card_subirfoto.php";  ?>
    </div>

</div>