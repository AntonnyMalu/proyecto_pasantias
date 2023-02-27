 <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Productos Aprobados</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th style="width: 5%;">#</th>
                                            <th >Producto</th>
                                            <th style="width: 10%;">Cantidad</th>
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                     $i=0;
                                            foreach($personas as $persona){
                                               $i++;
                                        ?>
                                        <td><?php echo $i ?></td>
                                        <td>
                                            <?php echo strtoupper($persona['producto']);?>
                                        </td>
                                        <td class="text-center">
                                        <?php echo strtoupper($persona['cantidad'] );?>
                                        </td>

                                       
                                            <td class="text-center">


                                          

                                            <button type="button" class="btn btn-warning btn-circle btn-sm edit-person"
                                                data-cedula="<?php echo $persona['producto']; ?>" data-nombre="<?php echo $persona['cantidad']; ?>" 
                                                data-id="<?php echo $persona['id']; ?>" >
                                                    <i class="fas fa-box"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-Person"
                                                        data-id="<?php echo $persona['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $persona['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="hidden" name="caso_id" value="<?php echo $_GET['id'] ?>" />
                                                    <input type="text" name="personas_id" value="<?php echo $persona['id']; ?>" />
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
