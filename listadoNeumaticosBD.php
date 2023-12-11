<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$cds = NeumaticoBD::traer();

foreach($cds as $obj){

    echo  "| " . $obj['id']. " - " . $obj['marca'] . " - " . $obj['medidas'] . " - " . $obj['precio'] . " - " . $obj['foto'] . " | " ;


}


?>