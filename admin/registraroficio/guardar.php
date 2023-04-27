<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Persona.php";
require "../../model/Institucion.php";
require "../../model/Oficio.php";
require "../_layout/flash_message.php";
$modulo = "resoluciones";

$alert = null;
$message = null;

function existeGlobal($cedula, $id_cedula, $rif, $id_rif)
{
    $row = null;
    $query = new Query();
    $array = array(false, 'mensaje', false, 'mensaje');

    if($id_cedula == -1){
        $mensaje_cedula = 1;
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'";
    }else{
        $mensaje_cedula = 2;
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id_cedula'";
    }
    $persona = $query->getFirst($sql1);
    if($persona){
        $array[0]  = true;
        $array[1] = $mensaje_cedula;
    }

    if($id_rif == -1){
        $mensaje_rif = 3;
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1'";
    }else{
        $mensaje_rif = 4;
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1' AND `id` != '$id_rif'";
    }
    $institucion = $query->getFirst($sql1);
    if($institucion){
        $array[2]  = true;
        $array[3] = $mensaje_rif;
    }
    return $array;
}

function persona($id, $cedula, $nombre, $telefono, $direccion){
    $row = null;
    $query = new Query();
    $persona = new Persona();
    $hoy = date("Y-m-d");

    if($id == -1){ 
        //nuevo
        $row = $persona->save($id, $cedula, $nombre, $telefono, $direccion);
        $sql = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'; ";
        $row = $query->getFirst($sql);
        $array = array(true, $row['id']);
        return $array;
    }else{
        //editar
        $row = $persona->update($id,$cedula, $nombre, $telefono, $direccion);
        $array = array(true, $id);
        return $array;
    
    }
}

function instituciones($id,$rif, $nombre, $telefono, $direccion){
    $row = null;
    $query = new Query();
    $institucion = new Institucion();
    $hoy = date("Y-m-d");

    if($id == -1){ 
        //nuevo
        $row = $institucion->save($rif, $nombre, $telefono, $direccion);
        $sql = "SELECT * FROM `instituciones` WHERE `rif` = '$rif'  AND `band` = '1';";
        $row = $query->getFirst($sql);
        $array = array(true, $row['id']);
        return $array;
    
    }else{
        //editar
        $row = $institucion->update($id, $rif, $nombre, $telefono, $direccion);
        $array = array(true, $id);
        return $array;
    }
}

function crearOficio($instituciones_id, $personas_id, $persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion, 
                        $institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion,$fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $oficio = new Oficio();
    $hoy = date("Y-m-d");
    $existe = existeGlobal($persona_cedula, $personas_id, $institucion_rif, $instituciones_id);

    if(!$existe[0] && !$existe[2]){
        $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);
        $institucion = instituciones($instituciones_id,$institucion_rif, $institucion_nombre, $institucion_telefono, $institucion_direccion);
        $row = $oficio->save($institucion[1], $persona[1], $fecha, $requerimientos);
        $array = array(true, $row, true, $row);
    }else{

        if($existe[0] && !$existe[2]){
            $array = array(false, $existe[1], true, $existe[3]);
        }else{
            $array = array(true, $existe[1], false, $existe[3]);
        }

        if($existe[0] && $existe[2]){
            $array = array(false, $existe[1], false, $existe[3]);
        }
        
    }
    return $array;

}

function editarOficio($id, $instituciones_id, $personas_id,$persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion ,
                    $institucion_rif,$institucion_nombre,$institucion_telefono, $institucion_direccion, $fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $oficio = new Oficio();
    $hoy = date("Y-m-d");
    $existe = existeGlobal($persona_cedula, $personas_id, $institucion_rif, $instituciones_id);

    if(!$existe[0] && !$existe[2]){

        $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);
        $institucion = instituciones($instituciones_id,$institucion_rif, $institucion_nombre, $institucion_telefono, $institucion_direccion);
        $row = $oficio->update($id, $institucion[1], $persona[1], $fecha, $requerimientos);
        $array = array(true, $row, true, $row);

    }else{

        if($existe[0] && !$existe[2]){
            $array = array(false, $existe[1], true, $existe[3]);
        }else{
            $array = array(true, $existe[1], false, $existe[3]);
        }

        if($existe[0] && $existe[2]){
            $array = array(false, $existe[1], false, $existe[3]);
        }
        
    }
    return $array;

}

if ($_POST) {
    $institucion = new Institucion();
    if ($_POST['opcion'] == "guardar") {
        
        if(!empty($_POST['instituciones_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['requerimientos'])){

            $instituciones_id = $_POST['instituciones_id'];
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $requerimientos = $_POST['requerimientos'];
            $persona_cedula = $_POST['persona_cedula'];
            $persona_nombre = $_POST['persona_nombre'];
            $persona_telefono = $_POST['persona_telefono'];
            $persona_direccion = $_POST['persona_direccion'];
            $institucion_rif = $_POST['institucion_rif'];
            $institucion_nombre = $_POST['institucion_nombre'];
            $institucion_telefono = $_POST['institucion_telefono'];
            $institucion_direccion = $_POST['institucion_direccion'];

            if(empty($institucion_rif))
            {
                //$institucion_rif = ritTemporal();
                $institucion_rif = $institucion->ritTemporal();
            }

            $oficio = crearOficio($instituciones_id, $personas_id, $persona_cedula,  $persona_nombre,  $persona_telefono,  
            $persona_direccion,$institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion, $fecha, $requerimientos);

            if ($oficio[0] && $oficio[2]) {

                $alert = "success";
                $message = "Oficio Registrado Exitosamente";
                crearFlashMessage($alert,$message, '../oficios/');


            } else {
                $alert = "warning";

                if(!$oficio[0] && $oficio[2] ){
                    if($oficio[1] == 1){
                        $message = "El campo <strong>Cédula</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                    }else{
                        $message = "La <strong>Cédula</strong> ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                    }
                }

                if($oficio[0]  && !$oficio[2]){
                    if($oficio[3] == 3){
                        $message = "El campo <strong>Rif</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos de la Institución</strong>.";
                    }else{
                        $message = "El <strong>Rif</strong> ya esta registrada. Busque en <strong>Datos de la Institución</strong>. ";
                    }
                }

                if(!$oficio[0] && !$oficio[2]){
                    $message = "Tanto el <strong>Rif</strong> como la <strong>Cédula</strong> ya estan registrados. Por favor verifique.";
                }
                
                crearFlashMessage($alert, $message, '../registraroficio/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos"; 
            crearFlashMessage($alert,$message, '../oficios/');
        }

        }
       
        }
    

        if ($_POST['opcion'] == "editar") {

            if(!empty($_POST['registraroficio_id']) && !empty($_POST['instituciones_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['requerimientos'])){
               
                $id = $_POST['registraroficio_id'];
                $instituciones_id = $_POST['instituciones_id'];
                $personas_id = $_POST['personas_id'];
                $fecha = $_POST['fecha'];
                $requerimientos = $_POST['requerimientos'];
                $persona_cedula = $_POST['persona_cedula'];
                $persona_nombre = $_POST['persona_nombre'];
                $persona_telefono = $_POST['persona_telefono'];
                $persona_direccion = $_POST['persona_direccion'];
                $institucion_rif = $_POST['institucion_rif'];
                $institucion_nombre = $_POST['institucion_nombre'];
                $institucion_telefono = $_POST['institucion_telefono'];
                $institucion_direccion = $_POST['institucion_direccion'];

                if(empty($institucion_rif))
                {
                    //$institucion_rif = ritTemporal();
                    $institucion_rif = $institucion->ritTemporal();
                }
                $oficio = editarOficio($id, $instituciones_id, $personas_id,$persona_cedula,  $persona_nombre,  $persona_telefono,  
                $persona_direccion,$institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion, $fecha, $requerimientos);
                
                if ($oficio[0] && $oficio[2]) {

                    $alert = "success";
                    $message = "Oficio Editado Exitosamente";
                    crearFlashMessage($alert,$message, '../oficios/');
    
    
                } else {
                    $alert = "warning";
    
                    if(!$oficio[0] && $oficio[2] ){
                        if($oficio[1] == 1){
                            $message = "El campo <strong>Cédula</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                        }else{
                            $message = "La <strong>Cédula</strong> ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                        }
                    }
    
                    if($oficio[0]  && !$oficio[2]){
                        if($oficio[3] == 3){
                            $message = "El campo <strong>Rif</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos de la Institución</strong>.";
                        }else{
                            $message = "El <strong>Rif</strong> ya esta registrada. Busque en <strong>Datos de la Institución</strong>. ";
                        }
                    }
    
                    if(!$oficio[0] && !$oficio[2]){
                        $message = "Tanto el <strong>Rif</strong> como la <strong>Cédula</strong> ya estan registrados. Por favor verifique.";
                    }
                    
                    crearFlashMessage($alert, $message, '../registraroficio/index.php?id='.$id);
                }
    
    
    
            } else {
                $alert = "danger";
                $message = "faltan datos"; 
                crearFlashMessage($alert,$message, '../oficios/');
            }
    
            
            }
        




?>