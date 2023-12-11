<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$obj = json_decode($_POST['neumatico_json']);

$newneumatico = new NeumaticoBD($obj->id, $obj->marca, $obj->medidas, $obj->precio, $obj->foto);

$result = $newneumatico->eliminar($newneumatico);

$path = "./archivos/neumaticos_eliminados.json";

if($result == true){

    if (file_exists($path)) {
    
        $file = fopen($path, "a");

        fwrite($file, $newneumatico->ToJSON() . "\r\n");

    } else {

        $file = fopen($path, "x");

        fwrite($file, $newneumatico->ToJSON() . "\r\n");
    }

    fclose($file);

}else {

    echo "No se elimino correctamente";

}

?>