<div class="card shadow mb-4 ">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-user-circle"></i> Actual</h6>
    </div>

    <div class="card-body">
        <div class="text-center">
            <img src="<?php echo $foto; ?>" class="rounded w-50 rounded-circle img-thumbnail" id="modal_imagen">
        </div>

        <div class="mt-3">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cedula
                    <span class="font-weight-bold text-primary" id="modal_ubicacion_administrativa"><?php echo $cedula; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nombre
                    <span class="font-weight-bold text-primary" id="modal_ubicacion_geografica"><?php echo $nombre; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cargo
                    <span class="font-weight-bold text-primary" id="modal_ubicacion_geografica"><?php echo $cargo; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ubicación Geográfica
                    <span class="font-weight-bold text-primary" id="modal_ubicacion_geografica"><?php echo $geografica; ?></span>
                </li>
            </ul>
        </div>

    </div>
</div>