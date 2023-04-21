 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead  class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Cédula</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Cargo</th>
                                            <th>Ubicación Administrativa</th>
                                            <th style="width: 15%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php 
                                        $i=1;
                                           foreach($listar_nomina as $nomina){
                                            

                                
                                        ?>

                                        <tr>
                                            <td>
                                                <?php echo $i++; ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo $nomina['cedula']; ?>
                                            </td>
                                            <td>
                                                <?php echo $nomina['nombre']; ?>
                                            </td>
                                            <td>
                                               <?php echo $nomina['cargo']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $nomina['ubicacion_administrativa'] ?>
                                            </td>
                                            <td class="text-center">

                                            
                                            <button type="button" class="btn btn-primary btn-circle btn-sm <?php if ($usuario['role'] != 100 && $usuario['id'] != $_SESSION['id']){ echo "edit-usu"; }else{ echo "disabled";}  ?>"
                                                data-name="<?php echo $usuario['name']; ?>" data-email="<?php echo $usuario['email']; ?>" 
                                                data-role="<?php echo $usuario['role']; ?>" data-id="<?php echo $usuario['id']; ?>" >
                                                    <i class="far fa-comment-alt"></i>
                                                </button>

                                                <button type="button" class="btn btn-warning btn-circle btn-sm <?php if ($usuario['role'] != 100 && $usuario['id'] != $_SESSION['id']){ echo "edit-usu"; }else{ echo "disabled";}  ?>"
                                                data-name="<?php echo $usuario['name']; ?>" data-email="<?php echo $usuario['email']; ?>" 
                                                data-role="<?php echo $usuario['role']; ?>" data-id="<?php echo $usuario['id']; ?>" >
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm <?php if ($usuario['role'] != 100 && $usuario['id'] != $_SESSION['id']){ echo "elim-usu"; }else{ echo "disabled";} ?>"
                                                        data-id="<?php echo $usuario['id']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $usuario['id']; ?>">
                                                    <input type="text" name="opcion" value="eliminar" />
                                                    <input type="text" name="users_id" value="<?php echo $usuario['id']; ?>" />
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
