 <!-- DataTales Example -->
 <div class="card shadow mb-4">
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">Registradas</h6>
   </div>
   <div class="card-body">

     <div class="table-responsive">

       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr class="text-center">
             <th style="width: 10%;">#</th>
             <th>Fecha</th>
             <th>N° Guia</th>
             <th>Placa</th>
             <th>Lugar de Destino</th>
             <th style="width: 20%;"></th>
           </tr>
         </thead>

         <tbody>
           <?php
            $i = 0;
            foreach ($listarGuias as $guia) {
              $i++;
              $listarCargamento = $cargamento->getList('guias_id', '=', $guia['id']);
              $html = "";
              $editCarga = "";
              if(!empty($listarCargamento)){
                $j = 0;
                foreach ($listarCargamento as $carga) {
                  $j++;
                  $btn = '&nbsp;';
                  $html .= '<tr>';
                  $html .=  '<td>';
                  $html .=   $carga['cantidad'];
                  $html .=  '</td>';
                  $html .=  '<td class="text-center">';
                  $html .=  $carga['descripcion'];
                  $html .=  '</td>';
                  $html .= '</tr>';
                  if ($j != 1) {
                    $btn = '<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="btnRemove(\'item_'.$carga['id'].'\')"><i class="fa fa-minus"></i></button>';
                  }
                  
                  $editCarga .= '<div class="row" id="item_'.$carga['id'].'">';
                  $editCarga .= '<div class="col-3">';
                  $editCarga .= '<input type="text" class="form-control" name="cantidad_'.$j.'" value="'.$carga['cantidad'].'" placeholder="Cant." id="cantidad_'.$carga['id'].'"  />';
                  $editCarga .= '</div>';
                  $editCarga .= '<div class="col-7">';
                  $editCarga .= '<input type="text" class="form-control" name="descripcion_'.$j.'" value="'.$carga['descripcion'].'" placeholder="Descripción" id="descripcion_'.$carga['id'].'"  />';
                  $editCarga .= '</div>';
                  $editCarga .= '<div class="col-2 p-1">';
                  $editCarga .= $btn;
                  $editCarga .= '</div>';
                  $editCarga .= '</div>';
                  $editCarga .= '<input type="hidden" class="form-control" name="carga_id_'.$j.'" value="'.$carga['id'].'" placeholder="carga_id_'.$j.'">';
                  
                }
              }else{
                $html = '<tr><td colspan="2" class="text-center text-danger"><i class="fas fa-exclamation-triangle"></i> Sin Carga Definidad.</td></tr>';
              }
            ?>
             <tr>
               <td class="text-center">
                 <?php echo $i; ?>
               </td>
               <td class="text-center">
                 <?php echo verFecha($guia['fecha']); ?>
               </td>

               <td>
                 <?php echo $guia['codigo'] ?>
               </td>
               <td>
                <?php echo $guia['vehiculos_placa_batea'] ?>
                <input type="hidden" value="<?php echo htmlentities($html); ?>" id="data_carga_guia_<?php echo $guia['id'];  ?>">
                <input type="hidden" value="<?php echo htmlentities($editCarga); ?>" id="edit_carga_guia_<?php echo $guia['id'];  ?>">
              </td>
               <td>
                 <?php echo $guia['rutas_destino'] ?>
               </td>
               <td class="text-center">



                 <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-circle btn-sm" 
                 data-tipo="<?php echo $guia['tipos_nombre']; ?>" 
                 data-codigo="<?php echo $guia['codigo']; ?>" 
                 data-vehiculo="<?php echo $guia['vehiculos_placa_batea'] . " - " . $guia['vehiculos_tipo']; ?>" 
                 data-chofer="<?php echo $guia['choferes_nombre'] . " - " . $guia['choferes_telefono']; ?>" 
                 data-origen="<?php echo $guia['rutas_origen']; ?>" data-destino="<?php echo $guia['rutas_destino']; ?>" 
                 data-fecha="<?php echo verFecha($guia['fecha']); ?>"
                 onclick="btnShow('<?php echo $guia['id']; ?>')" 
                 id="btn_show_<?php echo $guia['id']; ?>">
                   <i class="far fa-comment-alt"></i>
                 </button>

                 <button type="button" class="btn btn-warning btn-circle btn-sm" onclick="btnEdit('<?php echo $guia['id'] ?>')"
                 data-id_guia="<?php echo $guia['id']; ?>"
                 data-tipos_id="<?php echo $guia['guias_tipos_id']; ?>"
                 data-codigo="<?php echo $guia['codigo']; ?>"
                 data-vehiculos_id="<?php echo $guia['vehiculos_id']; ?>"
                 data-choferes_id="<?php echo $guia['choferes_id']; ?>"
                 data-territorios_origen="<?php echo $guia['territorios_origen']; ?>"
                 data-territorios_destino="<?php echo $guia['territorios_destino']; ?>"
                 data-fecha="<?php echo $guia['fecha'] ?>"
                 data-contador="<?php echo $j ?>" 
                 id="btn_editar_<?php echo $guia['id']; ?>">
                   <i class="fas fa-edit"></i>
                 </button>

                 <button type="button" class="btn btn-danger btn-circle btn-sm" data-id="<?php echo $persona['id']; ?>">
                   <i class="fas fa-trash-alt"></i>
                 </button>

                 <form action="guardar.php" method="post" class="d-none" id="form_eliminar_<?php echo $persona['id']; ?>">
                   <input type="text" name="opcion" value="eliminar" />
                   <input type="text" name="instituciones_id" value="<?php echo $persona['id']; ?>" />
                 </form>

               </td>
             </tr>

           <?php } ?>
         </tbody>
       </table>


     </div>
     <?php require "modal.php"; ?>
   </div>
 </div>