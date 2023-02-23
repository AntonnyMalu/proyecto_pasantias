 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Casos Sociales Registrados</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead  class="thead-dark">
                                        <tr>
                                            <th style="width:5% ;">#</th>
                                            <th class="text-center">Cédula</th>
                                            <th class="text-center">Nombre y Apellido</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Hora</th>
                                            
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php 
                                        $i=0;
                                            foreach($casos as $caso){ 
                                                $i++;
                                                $persona = getPersona($caso['personas_id']);
                                        ?>

                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td>
                                              <?php echo $persona['cedula']; ?>
                                            </td>
                                            <td>
                                               <?php echo strtoupper($persona['nombre']); ?>
                                            </td>
                                            
                                            <td class="text-center">
                                            <?php
                                                $newDate = date("d-m-Y", strtotime($caso['fecha']));
                                                echo $newDate; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php echo $caso['hora']; ?>
                                            </td>
                                            
                                            <td class="text-center">

                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-circle btn-sm show-person" 
                                                data-id="<?php echo $caso['id']; ?>" data-cedula="<?php echo $persona['cedula']; ?> "
                                                data-nombre="<?php echo strtoupper($persona['nombre']); ?> " data-direccion="<?php echo strtoupper($persona['direccion']); ?> " data-telefono="<?php echo $persona['telefono']; ?> " 
                                                data-fecha="<?php $newDate = date("d-m-Y", strtotime($caso['fecha']));
                                                echo $newDate; ?> " data-hora="<?php echo $caso['hora']; ?> " data-donativo="<?php echo $caso['donativo']; ?> "
                                                data-tipo="<?php echo strtoupper($caso['tipo']); ?> " data-observacion="<?php echo strtoupper($caso['observacion']); ?> ">
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                            <a href="pdf_ficha.php" target="_blank" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>

                                                <a href="../registrar/index.php?id=<?php echo $caso['id']; ?>" type="button" class="btn btn-warning btn-circle btn-sm edit-usu"
                                                data-id="<?php echo $caso['id'] ?>" data-cedula="<?php echo $persona['cedula'] ?>" data-nombre="<?php echo $persona['nombre'] ?>"
                                                data-direccion="<?php echo $persona['direccion'] ?>" data-fecha="<?php echo $caso['fecha'] ?>" data-hora="<?php echo $caso['hora'] ?>"
                                                data-donativo="<?php echo $caso['donativo'] ?>" data-tipo="<?php echo $caso['tipo'] ?>" data-observacion="<?php echo $caso['observacion'] ?>">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-caso"
                                                        data-id="<?php echo $caso['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $caso['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="casos_id" value="<?php echo $caso['id']; ?>" />
                                                </form>

                                            </td>
                                        </tr>
                                        

                                        <?php 
                                            }
                                        ?>
                                       
                            
                                        
                                    </tbody>
                                </table>
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
  <span class="text-primary" id="modal_titulo"> Caso </span>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cedula: <span class="text-primary float-right" id="modal_cedula"> jefe </span></li>
    <li class="list-group-item">Nombre: <span class="text-primary float-right" id="modal_nombre"> jefe </span></li>
    <li class="list-group-item">Telefono: <span class="text-primary float-right" id="modal_telefono"> jefe </span></li>
    <li class="list-group-item">Direccion: <span class="text-primary float-right" id="modal_direccion"> jefe </span></li>
    <li class="list-group-item">Fecha: <span class="text-primary float-right" id="modal_fecha"> jefe </span></li>
    <li class="list-group-item">Hora: <span class="text-primary float-right" id="modal_hora"> jefe </span></li>
    <li class="list-group-item">Donativo: <span class="text-primary float-right" id="modal_donativo"> jefe </span></li>
    <li class="list-group-item">Tipo: <span class="text-primary float-right" id="modal_tipo"> jefe </span></li>
    <li class="list-group-item">Observacion: <span class="text-primary float-right" id="modal_observacion"> jefe </span></li>
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

                            </div>
                        </div>
                    </div>
