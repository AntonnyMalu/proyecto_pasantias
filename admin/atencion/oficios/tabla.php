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
                                            foreach($listarOficios as $oficio){
                                                $i++;  
                                                $getInstitucion = $instituciones->find($oficio['instituciones_id']);
                                                if(!$getInstitucion){
                                                    $getInstitucion = [
                                                        "rif" => 'NO DEFINIDO',
                                                        "nombre" => 'NO DEFINIDO'
                                                    ];
                                                   
                                                }
                                                $getPersonas = $personas->find($oficio['personas_id']);
                                        ?>

                                        <tr>
                                            <td class="text-center">
                                               <?php echo $i; ?>
                                            </td>
                                            <td>
                                               <?php echo strtoupper($getInstitucion['rif']); ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($getInstitucion['nombre']); ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($getPersonas['nombre']) ?>
                                            </td>
                                            <td class="text-center">
                                               <?php $newDate = date("d-m-Y", strtotime($oficio['fecha']));
                                                echo $newDate; ?>
                                            </td>
                                            
                                            <td class="text-center">

                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-circle btn-sm show-person" 
                                                data-id="<?php echo $oficio['id']; ?>" data-cedula="<?php echo $getPersonas['cedula']; ?> "
                                                data-nombre="<?php echo strtoupper($getPersonas['nombre']); ?> " data-direccion="<?php echo strtoupper($getPersonas['direccion']); ?> " data-telefono="<?php echo $getPersonas['telefono']; ?> " 
                                                data-fecha="<?php $newDate = date("d-m-Y", strtotime($oficio['fecha'])); echo $newDate; ?> " data-rif="<?php echo strtoupper($getInstitucion['rif']); ?>" 
                                                data-nombrei="<?php echo strtoupper($getInstitucion['nombre']); ?>" data-requerimientos="<?php echo strtoupper($oficio['requerimientos']); ?>" data-xstatus="<?php echo $oficio['status']; ?>">
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                                <a href="../registraroficio/index.php?id=<?php echo $oficio['id']; ?>" type="button" class="btn btn-warning btn-circle btn-sm edit-usu"
                                                data-id="<?php echo $oficio['id'] ?>" data-cedula="<?php echo $getPersonas['cedula'] ?>" data-nombre="<?php echo strtoupper($getPersonas['nombre']); ?>"
                                                data-direccion="<?php echo $getPersonas['direccion'] ?>" data-fecha="<?php echo $oficio['fecha'] ?>" 
                                                data-requerimientos="<?php echo $oficio['requerimientos'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-ofi"
                                                        data-id="<?php echo $oficio['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $oficio['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="id" value="<?php echo $oficio['id']; ?>" />
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
  <span class="float-lg-right" id="ver_label_estatus"></span>
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
        <form id="formulario_status" method="POST" action="guardar.php">
        <span class="span" id="ver_botones_modal">
            <button type="button" class="btn btn-success cambiar-status" data-hola="Aprobado">Aprobado</button>
            <button type="button" class="btn btn-danger cambiar-status" data-hola="Sin producción">Sin producción</button>
        </span>
        <span class="d-none" id="ver_boton_reset">
            <button type="button" class="btn btn-warning cambiar-status" data-hola="<?php echo null; ?>">Reset Estatus</button>
        </span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="hidden" name="id" value="" placeholder="casos_id" id="casos_id">
        <input type="hidden" name="status" value="" placeholder="casos_status" id="casos_status">
        <input type="hidden" name="opcion" value="cambiar_status" placeholder="opcion">
        </form>             
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
