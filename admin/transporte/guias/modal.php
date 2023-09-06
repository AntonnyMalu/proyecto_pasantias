<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_chofer_nombre">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <div class="row col-md-12 justify-content-center">
          <div class="col-md-6">
            <div class="card" style="width:100%">
              <div class="card-header">
                <span class="text-primary"> Datos de la Guía </span>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Tipo Guía: <br><span class="text-primary" id="modal_tipo"> jefe </span></li>
                <li class="list-group-item">Código Guía: <br><span class="text-primary" id="modal_codigo"> jefe </span></li>
                <li class="list-group-item">Vehículo: <br><span class="text-primary" id="modal_vehiculo"> jefe </span></li>
                <li class="list-group-item">Chofer: <br><span class="text-primary" id="modal_chofer"> jefe </span></li>
                <li class="list-group-item">Lugar de Origen: <br><span class="text-primary" id="modal_origen"> jefe </span></li>
                <li class="list-group-item">Lugar de Destino: <br><span class="text-primary" id="modal_destino"> jefe </span></li>
                <li class="list-group-item">Fecha Guía: <br><span class="text-primary" id="modal_fecha"> jefe </span></li>
                <li class="list-group-item d-none" id="li_precinto">Precinto: <br><span class="text-primary" id="modal_precinto"> jefe </span></li>
                <li class="list-group-item d-none" id="li_precinto_2">Precinto 2: <br><span class="text-primary" id="modal_precinto_2"> jefe </span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card" style="width:100%">
              <div class="card-header">
                <span class="text-primary"> Cargamento </span>
              </div>
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th class="text-rigth" style="width: 30%;">Cantidad</th>
                      <th class="text-center">Descripción</th>
                    </tr>
                  </thead>

                  <tbody id="modal_tbody_data_carga">
                    <!-- data inyectada con JS -->
                  </tbody>
                </table>


              </div>
            </div>
          </div>

        </div>


      </div>
      <div class="modal-footer">
        <div class="col-12">
        <form action="guardar.php" method="post">
          <input type="hidden" name="id" id="modal_input_id">
          <input type="hidden" name="opcion" value="anular" id="modal_input_opcion">
          <span class="btn d-none" id="span_modal_anulado">Guía Anulada <i class="fas fa-backspace text-danger"></i></span>
          <button type="submit" class="btn btn-danger" id="btn_anular_guia"> 
          <i class="fas fa-ban"></i> Anular Guía
        </button>
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cerrar</button>
        <a href="#" type="button" class="btn float-right mr-1" id="btn_generar_pdf">
          Ver Guía
        </a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>