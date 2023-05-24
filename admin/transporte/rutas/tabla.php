 <!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Registradas</h6>
    </div>

    <div class="card-body">
        
        <div class="table-responsive">        
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th style="width: 5%;">#</th> 
                        <th>Origen</th>
                        <th>Ruta</th>
                        <th>Destino</th>
                        <th style="width: 15%;"></th>
                    </tr>
                </thead>
                
                <tbody>
                  <?php
                    $i = 0; 
                    foreach($listarRutas as $ruta){ 
                      $getOrigen = $territorios->find($ruta['origen']);
                      $getDestino = $territorios->find($ruta['destino']);
                  ?>
                    <td>
                        <?php echo ++$i; ?>
                    </td>
                    <td>
                        <?php echo strtoupper( $getOrigen['parroquia']); ?>
                    </td>
                    <td>
                        <?php 
                          $getTerritorio = json_decode($ruta['ruta']);
                          $html = "";
                          $j = 0;
                          foreach($getTerritorio as $lugar){
                            $j++;
                            echo ucfirst($lugar).", ";
                            $html .= '<div class="row" id="item_'.$j.'">';
                            $html .= '<div class="col-10">';
                            $html .= '<input type="text" class="form-control" name="ruta_'.$j.'" value="'.ucfirst($lugar).'" placeholder="Lugar '.$j.'" id="ruta_'.$j.'" required />';
                            $html .= '</div><div class="col-2 p-1">';
                            if($j != 1){
                                $html .= '<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="btnRemove(\'item_'.$j.'\')"><i class="fa fa-minus"></i></button>';

                            }else{
                                $html .= '&nbsp;';
                            }
                            
                            $html .= '</div>';
                            $html .= '</div>';
                          }
                        ?>
                        <input type="hidden" value="<?php echo htmlspecialchars($html); ?>" id="html_editar_ruta_<?php echo $ruta['id']; ?>" data-contador="<?php echo $j; ?>">
                    </td>
                    <td>
                        <?php echo strtoupper( $getDestino['parroquia']); ?>
                    </td>
                        <td class="text-center">

                            <button type="button" class="btn btn-warning btn-circle btn-sm edit-ruta"
                                data-origen="<?php echo $ruta["origen"]; ?>" data-destino="<?php echo $ruta['destino'] ?>"
                                data-id="<?php echo $ruta['id']; ?>" data-id_html="html_editar_ruta_<?php echo $ruta['id']; ?>">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-circle btn-sm delete-ruta"
                              data-id="<?php echo $ruta['id']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <form action="guardar.php" method="post" class="d-none"  id="form_eliminar_<?php echo $ruta['id']; ?>">
                                <input type="text" name="opcion" value="eliminar" />
                                <input type="text" name="id" value="<?php echo $ruta['id']; ?>" />
                            </form>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
