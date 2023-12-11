<?php

namespace RamirezGudar\Ignacio{

    class Neumatico{

        public string $marca;
    
        public string $medidas;
    
        public float $precio;
    
    
        public function __construct(string $marca, string $medidas, float $precio)
        {
            $this->marca = $marca;
            $this->medidas = $medidas;
            $this->precio = $precio;
        }
    
        private function ToJSON(): string
        {
    
            $obj = [
    
                "marca" => $this->marca,
                "medidas" => $this->medidas,
                "precio" => $this->precio,
    
            ];
    
            return json_encode($obj);
        }
    
        
        public function guardarJSON($path): bool
        {
    
            if (file_exists($path)) {
    
                $file = fopen($path, "a");
    
                fwrite($file, $this->ToJSON() . "\r\n");
    
                $bool = true;
            } else {
    
                $file = fopen($path, "x");
    
                fwrite($file, $this->ToJSON() . "\r\n");
    
                $bool = true;
            }
    
            fclose($file);
    
            return $bool;
        }
    
        public static function traerJSON(): array
        {
    
            $path = "./archivos/neumaticos.json";
    
            $retornoArray = array();
    
            if (file_exists($path)) {
    
                $file = fopen($path, "r");
    
                while (!feof($file)) {
    
                    $obj = fgets($file);
    
                    $obj = trim($obj);
    
                    if ($obj != "") {
    
                        $obj = json_decode($obj);
    
                        $users = new Neumatico($obj->marca, $obj->medidas, $obj->precio);
    
                        array_push($retornoArray, $users);
    
                    }
                }
            } else {
    
                echo "No exite el archivo";
            }
    
            fclose($file);
    
            return $retornoArray;
        }
    
        public static function verificarNeumaticoJSON($neumatico): array{
    
            $path = "./archivos/neumaticos.json";
    
            $retornoArray = array();
    
            $file = fopen($path, "r");
    
            while (!feof($file)) {
    
                $obj = fgets($file);
    
                $obj = trim($obj);
    
                if ($obj != ""){
    
                    $obj = json_decode($obj);
    
                    if($obj->marca == $neumatico->marca && $obj->medidas == $neumatico->medidas){
    
                        $users = new Neumatico($obj->marca, $obj->medidas, $obj->precio);
    
                        array_push($retornoArray, $users);
    
                    }
    
                }
    
            }
    
            fclose($file);
    
            return $retornoArray;
        }
    
        
    
    }
    
}


?>