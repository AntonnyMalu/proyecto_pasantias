 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Casos Sociales Registrados</h6>
     </div>
     <div class="card-body">

         <div class="table-responsive">

             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead class="thead-dark">
                     <tr>
                         <th style="width:5% ;">#</th>
                         <th class="text-center">Cédula</th>
                         <th class="text-center">Nombre y Apellido</th>
                         <th class="text-center">Fecha</th>
                         <th class="text-center">Hora</th>

                         <th style="width: 15%;"></th>
                     </tr>
                 </thead>

                 <tbody>

                     <?php
                        $i = 0;
                        foreach ($listarCasos as $caso) {
                            $i++;
                            $personas = new Persona();
                            $persona = $personas->find($caso['personas_id']);
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
                                    echo $newDate; 
                                   // echo compararFechas("2023-04-17",  $caso['fecha'])

                                    ?>
                             </td>

                             <td class="text-center">
                                 <?php
                                    $newHora = date("g:i a", strtotime($caso['hora']));
                                    echo $newHora;
                                    ?>
                             </td>

                             <td class="text-right">



                                 <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-circle btn-sm show-person" data-id="<?php echo $caso['id']; ?>" data-cedula="<?php echo $persona['cedula']; ?> " data-nombre="<?php echo strtoupper($persona['nombre']); ?> " data-direccion="<?php echo strtoupper($persona['direccion']); ?> " data-telefono="<?php if ($persona['telefono']) {
                                                                                                                                                                                                                                                                                                                                                                                                    echo $persona['telefono'];
                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                    echo "Sin Teléfono Registrado";
                                                                                                                                                                                                                                                                                                                                                                                                }  ?> " data-fecha="<?php $newDate = date("d-m-Y", strtotime($caso['fecha']));
                                                                                                                                                                                                                                                                                                                                                                                                                    echo $newDate; ?> " data-hora="<?php $newDate = date("h:i a", strtotime($caso['hora']));
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $newDate; ?> " data-donativo="<?php echo $caso['donativo']; ?> " data-tipo="<?php echo strtoupper($caso['tipo']); ?> " data-observacion="<?php echo strtoupper($caso['observacion']); ?> " data-xstatus="<?php echo $caso['status']; ?>">
                                     <i class="far fa-comment-alt"></i>
                                 </button>



                                 <a href="../registrar/index.php?id=<?php echo $caso['id']; ?>" type="button" class="btn btn-warning btn-circle btn-sm edit-usu" data-id="<?php echo $caso['id'] ?>" data-cedula="<?php echo $persona['cedula'] ?>" data-nombre="<?php echo $persona['nombre'] ?>" data-direccion="<?php echo $persona['direccion'] ?>" data-fecha="<?php echo $caso['fecha'] ?>" data-hora="<?php echo $caso['hora'] ?>" data-donativo="<?php echo $caso['donativo'] ?>" data-tipo="<?php echo $caso['tipo'] ?>" data-observacion="<?php echo $caso['observacion'] ?>">
                                     <i class="fas fa-user-edit"></i>
                                 </a>

                                 <?php if ($caso['status']) { ?>
                                     <a href="pdf_ficha.php?id=<?php echo $caso['id']; ?>" target="_blank" class="btn btn-success btn-circle btn-sm">
                                         <i class="fas fa-file-pdf"></i>
                                     </a>
                                 <?php } else {
                                    ?>
                                     <button type="button" class="btn btn-danger btn-circle btn-sm elim-caso" data-id="<?php echo $caso['id']; ?>">
                                         <i class="fas fa-trash-alt"></i>
                                     </button>
                                 <?php
                                    } ?>

                                 <form action="guardar.php" method="post" class="d-none" id="form_eliminar_<?php echo $caso['id']; ?>">
                                     <input type="text" name="opcion" value="eliminar" />
                                     <input type="text" name="id" value="<?php echo $caso['id']; ?>" />
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
                                             <span class="float-lg-right" id="ver_label_estatus"></span>
                                         </div>
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item">Cédula: <span class="text-primary float-right" id="modal_cedula"> jefe </span></li>
                                             <li class="list-group-item">Nombre: <span class="text-primary float-right" id="modal_nombre"> jefe </span></li>
                                             <li class="list-group-item">Teléfono: <span class="text-primary float-right" id="modal_telefono"> jefe </span></li>
                                             <li class="list-group-item">Dirección: <br><span class="text-primary" id="modal_direccion"> jefe </span></li>
                                             <li class="list-group-item">Fecha: <span class="text-primary float-right" id="modal_fecha"> jefe </span></li>
                                             <li class="list-group-item">Hora: <span class="text-primary float-right" id="modal_hora"> jefe </span></li>
                                             <li class="list-group-item">Donativo: <span class="text-primary float-right" id="modal_donativo"> jefe </span></li>
                                             <li class="list-group-item">Tipo: <span class="text-primary float-right" id="modal_tipo"> jefe </span></li>
                                             <li class="list-group-item">Observación: <br><span class="text-primary" id="modal_observacion"> jefe </span></li>
                                         </ul>
                                     </div>
                                 </div>

                             </div>


                         </div>
                         <div class="modal-footer">
                             <form id="formulario_status" method="POST" action="guardar.php">
                                 <span class="span" id="ver_botones_modal">
                                     <a href="../productos/index.php" class="btn btn-success" id="enlace_productos">Aprobado</a>
                                     <button type="button" class="btn btn-danger cambiar-status" data-hola="Sin producción">Sin producción</button>
                                 </span>
                                 <span class="d-none" id="ver_boton_reset">
                                     <button type="button" class="btn btn-warning cambiar-status" data-hola="<?php echo null; ?>">Reset Estatus</button>
                                 </span>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                 <input type="hidden" name="id" value="" placeholder="casos_id" id="casos_id">
                                 <input type="hidden" name="casos_status" value="" placeholder="casos_status" id="casos_status">
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