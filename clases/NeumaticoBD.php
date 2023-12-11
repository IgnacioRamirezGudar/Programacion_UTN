<?php

namespace RamirezGudar\Ignacio{

        require_once './clases/Neumatico.php';
        require_once "./PDO/connectDB.php";
        include "IParte1.php";
        include "IParte2.php";
        include "IParte3.php";
        include "IParte4.php";

        use RamirezGudar\Ignacio\Neumatico;

        use connectDB;
        use PDO;
        use PDOException;
        use IParte1;
        use IParte2;
        use IParte3;
        use IParte4;

        class NeumaticoBD extends Neumatico implements IParte1, IParte2, IParte3, IParte4
        {

            public int $id;
            public $pathFoto;


            public function __construct($id , $marca, $medidas, $precio, $pathFoto)
            {
                parent::__construct($marca, $medidas, $precio);
                $this->id = $id;
                $this->pathFoto = $pathFoto;

            }

            public function ToJSON(): string
            {

                $obj = [

                    "id" => $this->id,
                    "pathFoto" => $this->pathFoto,
                    "marca" => $this->marca,
                    "medidas" => $this->medidas,
                    "precio" => $this->precio,

                ];

                return json_encode($obj);
            }

            public function agregar() : bool
            {
                $retorno = true;

                try{

                    $objDB = connectDB::objAccess();

                    $sql = $objDB->rtnSql("INSERT INTO `neumaticos`(`marca`, `medidas`, `precio`, `foto`)"
                        . "VALUES (:marca, :medidas, :precio, :foto)");


                        $sql->bindValue(':marca', $this->marca, PDO::PARAM_STR);
                        $sql->bindValue(':medidas', $this->medidas, PDO::PARAM_STR);
                        $sql->bindValue(':precio', $this->precio, PDO::PARAM_INT);
                        $sql->bindValue(':foto', $this->pathFoto, PDO::PARAM_STR);

                    $sql->execute();

                }catch(PDOException){

                    $retorno = false;

                }
                
                return $retorno;


            }

            public static function traer(){

                $query = connectDB::objAccess();

                $sql = $query->rtnSql("SELECT `id` AS id, `marca` AS marca ,`medidas` AS medidas, `precio` AS precio, `foto` AS foto FROM neumaticos");
        
                $sql->execute();
        
                return $sql->fetchAll();
            }

            public static function eliminar(NeumaticoBD $id_neumatico) : bool{

                $retorno = true;

                try{
        
                    $objDB = connectDB::objAccess();
        
                    $sql =$objDB->rtnSql("DELETE FROM `neumaticos` WHERE id = :id");
        
                    $sql->bindValue(':id', $id_neumatico->id, PDO::PARAM_INT);
        
                    $sql->execute();
        
                } catch(PDOException){
        
                    $retorno = false;
                }
        
                return $retorno;
            }

            public function modificar() : bool{

                $retorno = true;

                try{
        
                    $objDB = connectDB::objAccess();
        
                    $sql =$objDB->rtnSql("UPDATE `neumaticos` SET marca = :marca, medidas = :medidas, precio = :precio, foto = :foto WHERE id = :id");
                
                    $sql->bindValue(':id', $this->id, PDO::PARAM_INT);
                    $sql->bindValue(':marca', $this->marca, PDO::PARAM_STR);
                    $sql->bindValue(':medidas', $this->medidas, PDO::PARAM_STR);
                    $sql->bindValue(':precio', $this->precio, PDO::PARAM_STR);
                    $sql->bindValue(':foto', $this->pathFoto, PDO::PARAM_STR);

        
                    $sql->execute();
        
                } catch(PDOException) {
        
                    $retorno = false;
        
                }
                
                return $retorno;

            }

            public static function existe($marca, $medidas) : bool{

                $cds = NeumaticoBD::traer();

                foreach($cds as $obj){
                
                    if($marca == $obj['marca'] || $medidas == $obj['medidas']){
                
                        $retorno = true;
                
                    } else {

                        $retorno = false;

                    }
                
                }

                return $retorno;

            }

            public function guardarEnArchivo() : bool{

                $path = "./archivos/neumaticos_borrados.txt";

                $path2 = "./neumaticos/imagenes/" . $this->pathFoto;

                $destino = './neumaticosBorrados/';

                $fecha = date("h"). "" .date("i") . "" .date("s");

                if (file_exists($path)) {

                    $file = fopen($path, "a");
        
                    fwrite($file, $this->ToJSON() . "\r\n");
        
                    if (file_exists($path2)) {

                        $img = $this->id . "." . $this->marca. "." . "borrado" ."." .$fecha . "." . "jpg";
                    
                        if (copy($path2, $destino. $img)) {
                     
                            unlink($path2);

                            $bool = true;
                            
                        }

                    } else 
                    {
                        echo "no existe la imagen";
                    }
                    
                } else {
        
                    $file = fopen($path, "x");
        
                    fwrite($file, $this->ToJSON() . "\r\n");

                    if (file_exists($path2)) {
    
                        $img = $this->id . "." . $this->marca. "." . "borrado" ."." .$fecha . "." . "jpg";
                    
                        if (copy($path2, $destino. $img)) {
                     
                            unlink($path2);

                            $bool = true;
                            
                        }

                    } else 
                    {
                        echo "no existe la imagen";
                    }

                }
        
                fclose($file);
        
                return $bool;

            }

        }
  
}



?>