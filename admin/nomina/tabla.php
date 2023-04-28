 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Trabajadores Registrados</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead  class="thead-dark">
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
                                        $i=1;
                                           foreach($listar_nomina as $nomina){
                                            

                                
                                        ?>

                                        <tr>
                                            <td class="text-center">
                                                <?php echo $i++; ?>
                                            </td>
                                            <td class="text-right">
                                                <span class="text-small"><?php echo $nomina['cedula']; ?></span>
                                            </td>
                                            <td>
                                                <span class="text-small"><?php echo $nomina['nombre']; ?></span>
                                            </td>
                                            <td>
                                               <span class="text-small"><?php echo getCargo($nomina['cargos_id']); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-small"><?php echo $nomina['ubicacion_administrativa'] ?></span>
                                            </td>
                                            <td class="text-center">

                                            <?php 
                                                if(empty($nomina['carnet'])){
                                                    $nomina['carnet'] = "SIN CARNET";
                                                }
                                            ?>
                                            <button type="button" class="btn btn-primary btn-circle btn-sm show-nomina"
                                                 data-id="<?php echo $nomina['id']; ?>" data-nombre="<?php echo $nomina['nombre'] ?>"
                                                 data-geografica="<?php echo $nomina['ubicacion_geografica'] ?>" 
                                                 data-estatus="<?php echo $nomina['carnet'] ?>"
                                                 data-administrativa="<?php echo $nomina['ubicacion_administrativa'] ?>"
                                                 data-mini="<?php echo $nomina['mini'] ?>"
                                                data-toggle="modal" data-target="#modal_show">
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                                <!--<button type="button" class="btn btn-warning btn-circle btn-sm <?php if ($usuario['role'] != 100 && $usuario['id'] != $_SESSION['id']){ echo "edit-usu"; }else{ echo "disabled";}  ?>"
                                                data-name="<?php echo $usuario['name']; ?>" data-email="<?php echo $usuario['email']; ?>" 
                                                data-role="<?php echo $usuario['role']; ?>" data-id="<?php echo $usuario['id']; ?>" data-toggle="modal" data-target="#modal_form" >
                                                    <i class="fas fa-user-edit"></i>
                                                </button>-->
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-nomi"
                                                        data-id="<?php echo $nomina['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $nomina['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="nomina_id" value="<?php echo $nomina['id']; ?>" />
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
