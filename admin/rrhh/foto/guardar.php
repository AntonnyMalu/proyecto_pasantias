<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../_layout/flash_message.php";
require "../../../model/Nomina.php";

$ruta = '../foto/';


if ($_POST) {

    $id = $_POST['id'];
    $ruta = '../foto/?id=' . $id;
    $ruta_img = $_POST['ruta_img'];

    $nomina = new Nomina();
    $getNomina = $nomina->find($id);

    if ($getNomina) {
        if ($ruta_img == "img_subida") {
            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['img_subida']['name'];
            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {
                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['img_subida']['type'];
                $tamano = $_FILES['img_subida']['size'];
                $temp = $_FILES['img_subida']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 8000000))) {
                    $message = '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/> - Se permiten archivos .gif, .jpg, .png. y de 800KB como máximo.</b></div>';
                    $alert = 'danger';
                } else {
                    //creo la carpeta del trabajador
                    $micarpeta = '../../../img/fotos_carnet/nomina_id_' . $id;
                    if (!file_exists($micarpeta)) {
                        mkdir($micarpeta, 0777, true);
                    }
                    //establesco ruta
                    $path = $micarpeta . '/' . $archivo;
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    if (move_uploaded_file($temp, $path)) {
                        //guardo en base de datos la ruta
                        $nomina->update($id, 'path', str_replace('../../../', '', $path));
                        $nomina->update($id, 'updated_at', date("Y-m-d"));
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod($path, 0777);
                        //Mostramos el mensaje de que se ha subido co éxito
                        $message = '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        $alert = "success";
                        //Mostramos la imagen subida
                        /*echo '<p class="text-center"><img src="'.$path.'" class="img-thumbnail"></p>';*/
                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        $message = '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                        $alert = "danger";
                    }
                }
            }
        } else {
            //creo la carpeta del trabajador
            $micarpeta = '../../../img/fotos_carnet/nomina_id_' . $id;
            if (!file_exists($micarpeta)) {
                mkdir($micarpeta, 0777, true);
            }

            //obtengo el archivo capturado
            $currentLocation = $ruta_img;
            $explode = explode('/', $ruta_img);
            //establesco la ruta
            $newLocation = $micarpeta . '/' . $explode[1];
            //valido si existe el capturado
            if (file_exists($currentLocation)) {
                //se mueve de carpeta
                $moved = rename($currentLocation, $newLocation);
                if ($moved) {
                    //guardo en la base de datos
                    $nomina->update($id, 'path', str_replace('../../../', '', $newLocation));
                    $nomina->update($id, 'updated_at', date("Y-m-d"));
                    $message = '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    $alert = "success";
                }
            } else {
                $message = '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                $alert = "danger";
            }
            //elimino los capturados restantes
            $files = glob($explode[0] . '/*.png'); //obtenemos todos los nombres de los ficheros
            foreach ($files as $file) {
                if (is_file($file))
                    unlink($file); //elimino el fichero
            }
        }
    } else {
        $alert = "warning";
        $message = "ID NO Encontrado.";
    }
} else {
    $alert = "danger";
    $message = "Deben Enviarse los datos por Method POST";
}

//echo $message;
crearFlashMessage($alert, $message, $ruta);
