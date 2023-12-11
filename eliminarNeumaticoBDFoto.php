<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$obj = json_decode($_POST['neumatico_json']);

$neumatico = new NeumaticoBD($obj->id, $obj->marca, $obj->medidas, $obj->precio, $obj->pathFoto);

$result_deleted = $neumatico->eliminar($neumatico);

if($result_deleted == true){

    $result_save = $neumatico->guardarEnArchivo();

    if($result_save == true){

        echo "Se guardo la imagen borrada";

    } else {
        echo "No se guardo la imagen borrada";
    }

} else {

    echo "No se pudo eliminar de la bd";

}


?>