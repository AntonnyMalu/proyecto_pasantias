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
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Tipo</th>
                                            <th>created_at</th>
                                            <th style="width: 25%;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php 
                                            foreach($usuarios as $usuario){
                                        ?>

                                        <tr>
                                            <td>
                                                <?php echo $usuario['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario['email']; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($usuario['role'] == 100){
                                                    echo "Root";
                                                }
                                                if($usuario['role'] == 99){
                                                    echo "Administrador";
                                                }
                                                if($usuario['role'] == 1){
                                                    echo "Atención al Ciudadano";
                                                }
                                                if($usuario['role'] == 2){
                                                    echo "Recursos Humanos";
                                                }
      
                                                ?>
                                            </td>
                                            <td>
                                                <?php /*echo $usuario['role']; */?>
                                                <?php
                                                $newDate = date("d-m-Y", strtotime($usuario['created_at']));
                                                echo $newDate; ?>
                                            </td>
                                            <td class="text-center">

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
