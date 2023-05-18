 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header border-info py-3">
         <h6 class="m-0 font-weight-bold text-primary">Firmantes Registrados</h6>
     </div>
     <div class="card-body">

         <div class="table-responsive">

             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead class="thead-dark">
                     <tr>
                         <th>Nombre</th>
                         <th>Cargo</th>
                         <th style="width: 20%;"></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        foreach ($listarFirmantes as $firmante) {
                        ?>

                         <td>
                             <?php echo strtoupper($firmante['nombre']); ?>
                         </td>
                         <td>
                             <?php echo strtoupper($firmante['cargo']); ?>
                         </td>


                         <td class="text-center">

                             <button type="button" class="btn btn-warning btn-circle btn-sm edit-firm" 
                             data-nombre="<?php echo $firmante['nombre']; ?>" 
                             data-cargo="<?php echo $firmante['cargo']; ?>" 
                             data-id="<?php echo $firmante['id']; ?>">
                                 <i class="fas fa-user-edit"></i>
                             </button>
                             <button type="button" class="btn btn-danger btn-circle btn-sm elim-Firm" 
                             data-id="<?php echo $firmante['id']; ?>">
                                 <i class="fas fa-trash-alt"></i>
                             </button>

                             <form action="guardar.php" method="post" class="d-none" id="form_eliminar_<?php echo 
                             $firmante['id']; ?>">
                                 <input type="text" name="opcion" value="eliminar" />
                                 <input type="text" name="id" value="<?php echo $firmante['id']; ?>" />
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