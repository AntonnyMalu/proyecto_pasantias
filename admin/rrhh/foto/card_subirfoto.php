<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form"> <i class="far fa-image"></i> Subir Foto</h6>
    </div>
    <div class="card-body">

        <form action="guardar.php" method="POST" enctype="multipart/form-data" id="form_foto">

            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="../../../img/img_placeolder.png" alt="..." id="vista_previa_foto">
            </div>

            <div class="form-group mt-3">
                <label>Foto</label>
                <div class="custom-file">
                    <input type="file" name="img_subida" class="custom-file-input" accept="image/png" lang="es" id="file_img">
                    <label class="custom-file-label" for="file_img">Seleccionar Archivo</label>
                </div>
            </div>


            <input type="hidden" name="ruta_img" placeholder="ruta_img" id="input_ruta_img"  />
            <input type="hidden" name="id" placeholder="id" value="<?php echo $id; ?>" id="input_cargos_id" />

            <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
            <button type="submit" class="btn btn-primary float-right" id="btn_submit_form" disabled >Guardar</button>

        </form>

    </div>
</div>