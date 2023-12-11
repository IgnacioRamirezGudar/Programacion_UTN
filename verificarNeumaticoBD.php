<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$obj_neumatico = json_decode($_POST['obj_neumatico']);

$cds = NeumaticoBD::traer();

foreach($cds as $obj){

    if($obj_neumatico->marca == $obj['marca'] || $obj_neumatico->medidas == $obj['medidas']){

        $neumatico = new NeumaticoBD($obj['id'], $obj['marca'], $obj['medidas'], $obj['precio'], $obj['foto']);

        var_dump($neumatico->ToJSON());

    }

}


?>