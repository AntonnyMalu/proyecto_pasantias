<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;"><i class="far fa-file-alt"></i> Guías</h1>
    <!--<a href="formatos/?id=1" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm evento">
        <i class="far fa-file-alt"></i>
        Descargar Excel
    </a>-->
    <form action="guardar.php" method="post" id="formulari_guia_init">
        <div class="input-group  is-invalid">
        <input type="text" class="form-control" name="guias_num_init" value="<?php echo $num_init; ?>" size="6" placeholder="Num. Sig." id="guias_num_init">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-save"></i></button>
            </div>
        </div>
        <input type="hidden" name="opcion" value="incrementar_contador">
    </form>
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