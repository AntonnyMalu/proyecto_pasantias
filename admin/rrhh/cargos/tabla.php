 <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cargos Registradas</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            
                                            <th style="width: 10px;">#</th>
                                            <th>Cargo</th>
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                            $i = 1;
                                            foreach($listarCargos as $cargo){

                                        ?>

                                        <td>
                                            <?php echo $i++ ?> 
                                            
                                        </td>
                                        <td>
                                        <?php echo strtoupper($cargo['cargo'] );?>
                                        
                                        </td>

                                       
                                            <td class="text-center">

                                            <button type="button" class="btn btn-warning btn-circle btn-sm edit-cargo"
                                                data-cargo="<?php echo $cargo['cargo']; ?>"
                                                data-id="<?php echo $cargo['id']; ?>" >
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm eliminar"
                                                        data-id="<?php echo $cargo['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $cargo['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="cargos_id" value="<?php echo $cargo['id']; ?>" />
                                                </form>

                                            </td>
                                        </tr>

                                        <?php 
                                           }
                                        ?>
                                       
                            
                                        
                                    </tbody>
                                </table>
                                                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



    <div class="row col-md-12 justify-content-center">
    <div class="col-md-10">
    <div class="card" style="width:100%">
  <div class="card-header">
  <span class="text-primary" id="modal_titulo"> persona </span>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cédula: <span class="text-primary float-right" id="modal_cedula"> jefe </span></li>
    <li class="list-group-item">Teléfono: <span class="text-primary float-right" id="modal_telefono"> jefe </span></li>
    <li class="list-group-item">Dirección: <br><span class="text-primary" id="modal_direccion"> jefe </span></li>
  </ul>
</div>                              
    </div>

    </div>


      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            
        </div>
    </div>
  </div>
</div>


                            </div>
                        </div>
                    </div>
