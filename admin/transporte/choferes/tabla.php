 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary"> Registrados</h6>
     </div>
     <div class="card-body">

         <div class="table-responsive">

             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead class="thead-dark">
                     <tr>
                        <th class="text-center">#</th>
                         <th>Cédula</th>
                         <th>Nombre y Apellido</th>
                         <th>Teléfono</th>
                         <th>Placa Batea</th>
                         <th style="width: 20%;"></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        $i = 0;
                        foreach ($listarChoferes as $choferes) {
                            $getEmpresas = $empresas->find($choferes['empresas_id']);
                            $getVehiculo = $vehiculos->find($choferes['vehiculos_id']);
                            $getTipo = $tipos->find($getVehiculo['tipo']);
                            $label_vehiculo_input = strtoupper($getVehiculo['placa_batea']." - ".$getTipo['nombre']);
                        ?>

                        <td class="text-center">
                             <?php echo ++$i ?>
                         </td>

                         <td>
                             <?php echo strtoupper($choferes['cedula']); ?>
                         </td>
                         <td>
                             <?php echo strtoupper($choferes['nombre']); ?>
                         </td>

                         <td>
                             <?php 
                             //echo strtoupper($label_vehiculo_input);
                             echo strtoupper($choferes['telefono']); 
                             ?>
                         </td>

                         <td>
                            <?php 
                              if($getVehiculo){
                                echo strtoupper($getVehiculo['placa_batea']);
                              }
                            ?>
                         </td>

                         <td class="text-center">

                             <button type="button" class="btn btn-info btn-circle btn-sm show-choferes" data-toggle="modal" data-target="#exampleModal" 
                             data-rif="<?php echo strtoupper($getEmpresas['rif']); ?>" data-nombre="<?php echo strtoupper($getEmpresas['nombre']); ?>" 
                             data-responsable="<?php echo strtoupper($getEmpresas['responsable']); ?>" data-telefono="<?php echo strtoupper($getEmpresas['telefono']); ?>"
                             data-placa="<?php echo strtoupper($getVehiculo['placa_batea']); ?>" data-marca="<?php echo strtoupper($getVehiculo['marca']) ?>"
                             data-tipo="<?php echo strtoupper($getTipo['nombre']) ?>" data-color="<?php echo strtoupper($getVehiculo['color']); ?>"
                             data-chofer_nombre="<?php echo strtoupper($choferes['nombre'] .   " Tlf: "  . $choferes['telefono']); ?>" 
                             data-chuto="<?php echo strtoupper($getVehiculo['placa_chuto']); ?>">
                                 <i class="far fa-comment-alt"></i>
                             </button>

                             <button type="button" class="btn btn-warning btn-circle btn-sm edit-choferes" 
                             data-id="<?php echo $choferes['id']; ?>" data-cedula="<?php echo $choferes['cedula']; ?>" 
                             data-nombre="<?php echo $choferes['nombre']; ?>" data-telefono="<?php echo $choferes['telefono']; ?>"
                             data-empresa_id="<?php echo $choferes['empresas_id'] ?>" data-vehiculo_id="<?php echo $choferes['vehiculos_id'] ?>">
                                 <i class="fas fa-user-edit"></i>
                             </button>

                             <button type="button" class="btn btn-danger btn-circle btn-sm elim-chof" data-id="<?php echo $choferes['id']; ?>">
                                 <i class="fas fa-trash-alt"></i>
                             </button>

                             <form action="guardar.php" method="post" class="d-none" id="form_eliminar_<?php echo $choferes['id']; ?>">
                                 <input type="text" name="opcion" value="eliminar" />
                                 <input type="text" name="choferes_id" value="<?php echo $choferes['id']; ?>" />
                             </form>

                         </td>
                         </tr>

                     <?php
                        }
                        ?>



                 </tbody>
             </table>
             