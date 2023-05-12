<?php
$array = array();
for ($i=1; $i <= $_POST['contador'] ; $i++) { 
    $item = $_POST['ruta_'.$i];
    array_push($array, $item);
}

$ruta = json_encode($array);
$database = json_decode($ruta);

foreach($database as $item){
    echo '
    <div class="row" id="item_1">
        <div class="col-10">
            <input type="text" class="form-control" value="'.$item.'" name="ruta_1" placeholder="Lugar 1" id="ruta_1" required />
        </div>
        <div class="col-2 p-1">
            &nbsp;
        </div>
    </div>
    ';
}