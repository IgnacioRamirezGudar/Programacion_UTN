<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$obj = json_decode($_POST['neumatico_json']);

$newneumatico = new NeumaticoBD($obj->id, $obj->marca, $obj->medidas, $obj->precio, "");

$result = $newneumatico->modificar();

if($result == true){

    echo "se modifico correctamente";

}else {

    echo "No se modifico correctamente";

}

?>