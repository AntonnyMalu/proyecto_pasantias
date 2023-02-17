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
                                            <th>Cédula</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Donativo</th>
                                            <th>Estatus</th>
                                            <th>Fecha</th>
                                            
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php 
                                            foreach($casos as $caso){ 
                                                $persona = getPersona($caso['personas_id']);
                                        ?>

                                        <tr>
                                            <td>
                                              <?php echo $persona['cedula']; ?>
                                            </td>
                                            <td>
                                               <?php echo strtoupper($persona['nombre']); ?>
                                            </td>
                                            
                                            <td>
                                               <?php echo strtoupper($caso['donativo']); ?>
                                            </td>

                                            <td>
                                               <?php echo strtoupper($caso['status']); ?>
                                            </td>

                                            <td>
                                               <?php echo $caso['fecha']; ?>
                                            </td>
                                            
                                            <td class="text-center">

                                            <a href="pdf_ficha.php" target="_blank" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>

                                                <button type="button" class="btn btn-warning btn-circle btn-sm edit-usu"
                                                data-id="<?php echo $caso['id']; ?>" data-cedula="<?php echo $persona['cedula']; ?>" 
                                                data-nombre="<?php echo $persona['nombre']; ?>" data-fecha="<?php echo $caso['fecha']; ?>" data-hora="<?php echo $caso['hora']; ?>"
                                                data-donativo="<?php echo $caso['donativo']; ?>" data-donativo="<?php echo $caso['donativo']; ?> " data-tipo="<?php echo $caso['tipo']; ?>" 
                                                data-status="<?php echo $caso['status']; ?>" data-observacion="<?php echo $caso['observacion']; ?>">
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm elim-usu"
                                                        data-id="<?php echo $caso['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $caso['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="users_id" value="<?php echo $caso['id']; ?>" />
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
