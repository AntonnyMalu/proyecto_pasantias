<!-- Modal -->
<div class="modal fade" id="modal_show" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary font-weight-bold" id="modal_nombre_trabajador">NOMBRE TRABAJADOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="../../../img/img_placeolder.png" class="rounded w-50 rounded-circle" id="modal_imagen">
        </div>

        <div class="mt-3">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Ubicación Administrativa
              <span class="font-weight-bold text-primary" id="modal_ubicacion_administrativa">Sede</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Ubicación Geográfica
              <span class="font-weight-bold text-primary" id="modal_ubicacion_geografica">Camagua</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Estatus del Carnet
              <span class="font-weight-bold text-primary" id="modal_estatus_carnet">NO DEFINIDO</span>
            </li>
          </ul>
        </div>



      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" id="btn_pdf"> <i class="fas fa-file-pdf "></i> PDF </a>
        <a href="#" class="btn btn-success d-none m-0" download="" id="btn_descargar"> <i class="fas fa-download"></i> Descargar Foto </a>
        <a class="btn btn-primary" href="#" id="link_modal_id"> <i class="fas fa-images"></i> Cambiar Foto</a>
        <button type="button" class="btn btn-secondary m-0" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>