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
            <th style="width: 5%;">#</th>
             <th>Placa Batea</th>
             <th>Tipo</th>
             <th>Marca</th>
             <!--<th>Color</th> -->
             <th>Capacidad</th>
             <th style="width: 18%;"></th>
           </tr>
         </thead>

         <tbody>

           <?php
           $i = 1;
            foreach ($listarVehiculos as $vehiculos) {
             $getEmpresas = $empresas->find($vehiculos['empresas_id']);
             if($getEmpresas['band']){
                $id_empresa = $getEmpresas['id'];
             }else{
              $id_empresa = "";
             }
            ?>
             <tr>

              <td>
                <?php echo $i++; ?>
              </td>
               <td>
                 <?php echo strtoupper($vehiculos['placa_batea']); ?>
               </td>

               <td>
                 <?php
                  $getTipo = $tipos->find($vehiculos['tipo']);
                  if ($getTipo) {
                    echo $getTipo['nombre'];
                  } else {
                    echo "NO DEFINIDO";
                  }
                  ?>
               </td>

               <td>
                 <?php echo strtoupper($vehiculos['marca']); ?>
               </td>

               <!--<td>
                 <?php echo strtoupper($vehiculos['color']); ?>
               </td>-->

               <td>
                 <?php echo strtoupper($vehiculos['capacidad']); ?>
               </td>

               <td class="text-center">


                 <button type="button" class="btn btn-info btn-circle btn-sm show-vehi" data-toggle="modal" data-target="#exampleModal"
                 data-rif="<?php echo strtoupper($getEmpresas['rif']); ?>" data-nombre="<?php echo strtoupper($getEmpresas['nombre']); ?>" data-responsable="<?php echo strtoupper($getEmpresas['responsable']); ?>" 
                 data-telefono="<?php echo strtoupper($getEmpresas['telefono']); ?>" data-color="<?php echo strtoupper($vehiculos['color']); ?>" data-chuto="<?php echo strtoupper($vehiculos['placa_chuto']) ?>">
                 <i class="far fa-comment-alt"></i>
                 </button>

                 <button type="button" class="btn btn-warning btn-circle btn-sm edit-vehiculo" data-empresa_id="<?php echo $id_empresa; ?>" 
                 data-placa="<?php echo $vehiculos['placa_batea']; ?>" data-tipo="<?php echo $vehiculos['tipo']; ?>" data-marca="<?php echo $vehiculos['marca']; ?>" 
                 data-color="<?php echo strtoupper($vehiculos['color']); ?>" data-capacidad="<?php echo $vehiculos['capacidad']; ?>" data-id="<?php echo $vehiculos['id']; ?>"
                 data-chuto="<?php echo strtoupper($vehiculos['placa_chuto']) ?>">
                   <i class="fas fa-edit"></i>
                 </button>
                 <button type="button" class="btn btn-danger btn-circle btn-sm elim-vehi" data-id="<?php echo $vehiculos['id']; ?>">
                   <i class="fas fa-trash-alt"></i>
                 </button>

                 <form action="guardar.php" method="post" class="d-none" id="form_eliminar_<?php echo $vehiculos['id']; ?>">
                   <input type="text" name="opcion" value="eliminar" />
                   <input type="text" name="vehiculos_id" value="<?php echo $vehiculos['id']; ?>" />
                 </form>

               </td>
             </tr>

           <?php
            }
            ?>



         </tbody>
       </table>
       