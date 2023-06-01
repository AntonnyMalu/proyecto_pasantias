<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;"><i class="fas fa-address-card"></i> Choferes</h1>

    <div>
    <a href="descargar_excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm evento">
            <i class=" fa-sm text-white-50"></i>
            Descargar Excel
        </a>

        <a href="choferes_pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" target="_blank">
            <i class=" fa-sm text-white-50"></i>
            Choferes QR
        </a>
    </div>
    
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
        <?php require "modal.php" ?>

    </div>



    <div class="col-md-4">
        
        <?php require "form.php";  ?>

    </div>

</div>



