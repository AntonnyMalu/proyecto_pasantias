 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Trabajadores Registrados</h6>
     </div>
     <div class="card-body">

         <div class="table-responsive">

             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead class="thead-dark">
                     <tr>
                         <th style="width: 5%;" class="text-center">#</th>
                         <th class="text-center">Cédula</th>
                         <th class="text-center">Nombre Completo</th>
                         <th class="text-center">Cargo</th>
                         <th class="text-center">Ubicación</th>
                         <th style="width: 15%;"></th>
                     </tr>
                 </thead>

                 <tbody>

                     <?php
                        $i = 1;
                        foreach ($listarNomina as $nomina) {
                            $getCargo = $cargos->find($nomina['cargos_id']);
                            if ($nomina['path']) {
                                if (file_exists('../../../'.$nomina['path'])) {
                                    $path = '../../../'.$nomina['path'];
                                }else{
                                    $path = '../../../img/img_placeolder.png';
                                }
                            }else {
                                $path = '../../../img/img_placeolder.png';
                            }
                            
                        ?>

                         <tr>
                             <td class="text-center">
                                 <?php echo $i++; ?>
                             </td>
                             <td class="text-right">
                                 <span class="text-small"><?php echo $nomina['cedula']; ?></span>
                             </td>
                             <td>
                                 <span class="text-small"><?php echo strtoupper($nomina['nombre']); ?></span>
                             </td>
                             <td>
                                 <span class="text-small"><?php echo $getCargo['cargo']; ?></span>
                             </td>
                             <td class="text-center">
                                 <?php
                                    if ($nomina['administrativa_id']) {
                                        $getAdministrativa = $ubicaciones->find($nomina['administrativa_id']);
                                        $label_admin = strtoupper($getAdministrativa['nombre']);
                                    } else {
                                        $label_admin = strtoupper($nomina['ubicacion_administrativa']);
                                    }
                                    if ($nomina['geografica_id']) {
                                        $getGeografica = $ubicaciones->find($nomina['geografica_id']);
                                        $label_geo = strtoupper($getGeografica['nombre']);
                                        echo '<span class="text-small">' . strtoupper($getGeografica['nombre']) . '</span>';
                                    } else {
                                        $label_geo = strtoupper($nomina['ubicacion_geografica']);
                                        echo '<span class="text-small">' . strtoupper($nomina['ubicacion_geografica']) . '</span>';
                                    }
                                    ?>
                             </td>
                             <td class="text-center">

                                 <?php
                                    if (empty($nomina['carnet'])) {
                                        $nomina['carnet'] = "SIN CARNET";
                                    }
                                    ?>
                                 <button type="button" class="btn btn-info btn-circle btn-sm show-nomina" data-toggle="modal" data-target="#modal_show" 
                                 data-cedula="<?php echo $nomina['cedula']; ?>"
                                 data-nombre="<?php echo $nomina['nombre']; ?>"
                                 data-geografica_id="<?php echo $label_geo; ?>"
                                 data-administrativa_id="<?php echo $label_admin; ?>"
                                 data-path="<?php echo $path; ?>"
                                 onclick="btnShow(<?php echo $nomina['id'] ?>)"
                                 id="btn_show_<?php echo $nomina['id'] ?>">
                                     <i class="far fa-comment-alt"></i>
                                 </button>

                                 <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modal_form"
                                 data-cedula="<?php echo $nomina['cedula']; ?>"
                                 data-nombre="<?php echo $nomina['nombre']; ?>"
                                 data-geografica_id="<?php echo $nomina['geografica_id']; ?>"
                                 data-administrativa_id="<?php echo $nomina['administrativa_id']; ?>"
                                 data-cargos_id="<?php echo $nomina['cargos_id']; ?>"
                                 onclick="btnEditar(<?php echo $nomina['id'] ?>)"
                                 id="btn_editar_<?php echo $nomina['id'] ?>">
                                     <i class="fas fa-user-edit"></i>
                                 </button>

                                 <button type="button" class="btn btn-danger btn-circle btn-sm elim-nomi" 
                                 onclick="btnEliminar('<?php echo $nomina['id'] ?>')">
                                     <i class="fas fa-trash-alt"></i>
                                 </button>

                                 <form action="guardar.php" method="post" class="d-none" id="form_eliminar_<?php echo $nomina['id']; ?>">
                                     <input type="text" name="opcion" value="eliminar" />
                                     <input type="text" name="id" value="<?php echo $nomina['id']; ?>" />
                                 </form>

                             </td>
                         </tr>
                     <?php
                        }
                        ?>




                 </tbody>
             </table>

         </div>
     </div>
 </div>