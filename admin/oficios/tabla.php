 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Oficios Recibidos</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead  class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Rif</th>
                                            <th class="text-center">Nombre de la Institución</th>
                                            <th class="text-center">Persona Contacto</th>
                                            <th class="text-center">Fecha</th>
                                        
                                            <th hora="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php 
                                        $i=0;
                                            foreach($oficios as $oficio){
                                                $i++;
                                                $institucion = getInstituciones($oficio['instituciones_id']);
                                                $persona = getPersona($oficio['personas_id']);
                                        ?>

                                        <tr>
                                            <td class="text-center">
                                               <?php echo $i; ?>
                                            </td>
                                            <td>
                                               <?php echo strtoupper($institucion['rif']); ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($institucion['nombre']); ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($persona['nombre']) ?>
                                            </td>
                                            <td class="text-center">
                                               <?php $newDate = date("d-m-Y", strtotime($oficio['fecha']));
                                                echo $newDate; ?>
                                            </td>
                                            
                                            <td class="text-center">

                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-circle btn-sm show-person" 
                                                data-id="<?php echo $oficio['id']; ?>" data-cedula="<?php echo $persona['cedula']; ?> "
                                                data-nombre="<?php echo strtoupper($persona['nombre']); ?> " data-direccion="<?php echo strtoupper($persona['direccion']); ?> " data-telefono="<?php echo $persona['telefono']; ?> " 
                                                data-fecha="<?php $newDate = date("d-m-Y", strtotime($oficio['fecha'])); echo $newDate; ?> " data-rif="<?php echo strtoupper($institucion['rif']); ?>" 
                                                data-nombrei="<?php echo strtoupper($institucion['nombre']); ?>" data-requerimientos="<?php echo strtoupper($oficio['requerimientos']); ?>">
                                                
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                                <a href="../registraroficio/index.php?id=<?php echo $oficio['id']; ?>" type="button" class="btn btn-warning btn-circle btn-sm edit-usu"
                                                data-id="<?php echo $oficio['id'] ?>" data-cedula="<?php echo $persona['cedula'] ?>" data-nombre="<?php echo strtoupper($persona['nombre']); ?>"
                                                data-direccion="<?php echo $persona['direccion'] ?>" data-fecha="<?php echo $oficio['fecha'] ?>" data-hora="<?php echo $caso['hora'] ?>"
                                                data-requerimientos="<?php echo $oficio['requerimientos'] ?>"  >
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-ofi"
                                                        data-id="<?php echo $oficio['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $oficio['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="oficios_id" value="<?php echo $oficio['id']; ?>" />
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
    <div class="col-md-12">
    <div class="card" style="width:100%">
  <div class="card-header">
  <span class="text-primary" id="modal_titulo"> Oficio </span>
  </div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item">Rif: <span class="text-primary float-right" id="modal_rif"> jefe </span></li>
  <li class="list-group-item">Fecha: <span class="text-primary float-right" id="modal_fecha"> jefe </span></li>
  <li class="list-group-item">Requerimientos: <br><span class="text-primary" id="modal_requerimientos"> jefe </span></li>
    <li class="list-group-item">Persona Contacto: <span class="text-primary float-right" id="modal_nombre"> jefe </span></li>
    <li class="list-group-item">Cédula del Contacto: <span class="text-primary float-right" id="modal_cedula"> jefe </span></li>
    <li class="list-group-item">Teléfono del Contacto: <span class="text-primary float-right" id="modal_telefono"> jefe </span></li>
    <li class="list-group-item">Dirección del Contacto: <br><span class="text-primary" id="modal_direccion"> jefe </span></li>

  </ul>

</div>                              
    </div>

    </div>


      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-success" data-dismiss="modal">Aprobado</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Sin producción</button>
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

                            </div>
                        </div>
                    </div>
