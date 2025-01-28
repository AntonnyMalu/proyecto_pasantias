<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;"><i class="fas fa-user-alt"></i>  
    <?php echo strtoupper($get_persona['nombre']) ?>
</h1>
<form id="formulario_status" method="POST" action="guardar.php">
        <input type="hidden" name="casos_id" value="<?php echo $caso_id; ?>" placeholder="casos_id">
        <input type="hidden" name="casos_status" value="Aprobado" placeholder="casos_status">
        <input type="hidden" name="opcion" value="cambiar_status" placeholder="opcion">
        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm evento">
            <i class="fas fa-save"></i> Guardar Productos
        </button>
        </form>  
    

</div>

<div class="row">

    <div class="col-md-12">

    <?php

     display_flash_message();

    ?>

    </div>
    
    <div class="col-md-8">
        
    
        <?php require "tabla.php" ?>


    </div>



    <div class="col-md-4">
        
        <?php require "form.php";  ?>

    </div>

</div>



