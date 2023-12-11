<?php

use RamirezGudar\Ignacio\NeumaticoBD;

interface IParte2{

    public static function eliminar(NeumaticoBD $id_neumatico) : bool;

    public function modificar() : bool;

}

?>