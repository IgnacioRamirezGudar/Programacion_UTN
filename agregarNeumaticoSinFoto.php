<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$obj = json_decode($_POST['neumatico_json']);

$newNeumatico = new NeumaticoBD(0,$obj->marca, $obj->medidas, $obj->precio, "");


$result = $newNeumatico->agregar();

if($result == true){

    echo "Se agrego correctamente";

}else {

    echo "No se agrego correctamente";

}

?>