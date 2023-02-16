 <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Personas Registradas</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            
                                            <th>Céduna</th>
                                            <th>Nombre</th>
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                            foreach($personas as $persona){
                                        ?>

                                        <td>
                                            <?php echo $persona['cedula'] ?>
                                        </td>
                                        <td>
                                        <?php echo $persona['nombre'] ?>
                                        </td>

                                       
                                            <td class="text-center">


                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-circle btn-sm show-person" 
                                                data-id="<?php echo $persona['id']; ?>" data-cedula="<?php echo $persona['cedula']; ?> "
                                                data-nombre="<?php echo strtoupper($persona['nombre']); ?> " data-direccion="<?php echo strtoupper($persona['direccion']); ?> " data-telefono="<?php echo $persona['telefono']; ?> " >
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                            <button type="button" class="btn btn-warning btn-circle btn-sm edit-person"
                                                data-cedula="<?php echo $persona['cedula']; ?>" data-nombre="<?php echo $persona['nombre']; ?>" 
                                                data-telefono="<?php echo $persona['telefono']; ?>" data-direccion="<?php echo $persona['direccion']; ?>"
                                                data-id="<?php echo $persona['id']; ?>" >
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-Person"
                                                        data-id="<?php echo $persona['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $persona['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
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
    <div class="col-md-8">
    <div class="card" style="width:100%">
  <div class="card-header">
  <span class="text-primary" id="modal_tipo"> persona </span>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cedula: <span class="text-primary float-right" id="modal_cedula"> jefe </span></li>
    <li class="list-group-item">Nombre: <span class="text-primary float-right" id="modal_nombre"> jefe </span></li>
    <li class="list-group-item">Telefono: <span class="text-primary float-right" id="modal_telefono"> jefe </span></li>
    <li class="list-group-item">Direccion: <span class="text-primary float-right" id="modal_direccion"> jefe </span></li>
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
