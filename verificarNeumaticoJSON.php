<?php

require_once "./clases/Neumatico.php";

use RamirezGudar\Ignacio\Neumatico;

$neumatico = json_decode($_POST["neumatico"]);

$marca = $neumatico->marca;

$medidas = $neumatico->medidas;

$newNeumatico = new Neumatico($marca, $medidas, 0);

var_dump(Neumatico::verificarNeumaticoJSON($newNeumatico));


?>