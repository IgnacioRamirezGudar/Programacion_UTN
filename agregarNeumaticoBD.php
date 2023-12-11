<?php

require_once './clases/NeumaticoBD.php';

use RamirezGudar\Ignacio\NeumaticoBD;

$marca = $_POST['marca'];
$medidas = $_POST['medidas'];
$precio = $_POST['precio'];
$photo = $_FILES['foto'];

$fecha = date("h"). "" .date("i") . "" .date("s");

$extension = pathinfo($photo['name'], PATHINFO_EXTENSION);

$img = $marca. "." . $fecha . "." . $extension;

$neumatico = new NeumaticoBD(0, $marca, $medidas, $precio, $img);

$result = NeumaticoBD::existe($marca, $medidas);

if($result == true){

    echo "El neumatico ya existe";

} else {

    $result2 = $neumatico->agregar();

    if($result2 == true){

        move_uploaded_file($photo['tmp_name'], "./neumaticos/imagenes/$img");

    } else {

        echo "no se pudo agregar";
    }

}

?>