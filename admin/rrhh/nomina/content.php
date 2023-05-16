<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;"><i class="fas fa-clipboard-list"></i> Nómina</h1>

    <div class="float-right">
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_form">
            <i class=" fa-sm text-white-50"></i>
            Registrar Trabajador
    </button>

    <a href="descargar_excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm evento">
            <i class=" fa-sm text-white-50"></i>
            Descargar Excel
        </a>
    </div>
    </div>
    


    

         <div class="row">
    
        <div class="col-md-12">

        <?php
            display_flash_message();
        ?>
        <?php require "tabla.php"; ?>
        <?php require "modal_form.php"; ?>
        <?php require "modal_show.php"; ?>
            
        </div>


        
   
</div>



