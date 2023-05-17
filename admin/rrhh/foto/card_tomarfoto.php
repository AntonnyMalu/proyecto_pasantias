<div class="card shadow mb-4 ">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Tomar Foto</h6>
    </div>

    <div class="card-body">

        <div class="embed-responsive embed-responsive-16by9">
            <video muted="muted" id="video"></video>
            <canvas id="canvas" style="display: none;"></canvas>
        </div>

        <div class="form-group mt-3">
            <label>Selecciona un dispositivo</label>
            <div>
                <select class="form-control" name="listaDeDispositivos" id="listaDeDispositivos"></select>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-circle btn-lg" id="boton"><i class="fas fa-camera"></i></button>
            <p class="mt-3" id="estado"></p>
        </div>



    </div>

</div>