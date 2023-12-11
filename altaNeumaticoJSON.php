<?php

require_once "./clases/Neumatico.php";

use RamirezGudar\Ignacio\Neumatico;

$neumatico = json_decode($_POST["neumatico"]);
$marca = $neumatico->marca;
$medidas = $neumatico->medidas;
$precio = $neumatico->precio;
$path = "./archivos/neumaticos.json";
$newNeumatico = new Neumatico($marca, $medidas, $precio);

$result = $newNeumatico->guardarJSON($path);

if($result == true){

    echo "Se guardo correctamente";

}else {

    echo "No se guardo correctamente";

}

?>