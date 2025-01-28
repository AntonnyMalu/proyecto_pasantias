<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Agregar Productos</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_usuarios">

        <div class="form-group">
            <label>Producto</label>
            <input type="text" class="form-control" name="producto" placeholder="Ingrese el Producto" id="input_cedula" required />
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="text" class="form-control" name="cantidad" placeholder="Ingrese la Cantidad" id="input_nombre" required />
        </div>

        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="caso_id" value="<?php echo $_GET['id'] ?>" />
        <input type="hidden" name="personas_id" id="input_personas_id" />

        <a href="../casos/" class="btn btn-info" id="btn_cancelar">Atras</a>
        <button type="submit" class="btn btn-primary float-right ml-1">Agregar</button>
        <button type="reset" class="btn btn-secondary float-right" id="btn_cancelar">Cancelar</button>

    </form>
        
    </div>
</div>