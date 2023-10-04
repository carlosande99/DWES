<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        abstract class Soporte implements muestra{
            public $titulo;
            protected $numero;
            protected $precio;
            const IVA = 1.21;
            // private $IVA = 1.21;
            // public static $IVA = 1.21;
            public function __construct($titulo,$numero,$precio){
                $this -> titulo = $titulo;
                $this -> numero = $numero;
                $this -> precio = $precio;
            }
            public function getPrecio(){
                return $this -> precio;
            }
            public function getPrecioConIva(){
                return $this -> precio * self::IVA;
            }
            public function getNumero(){
                return $this -> numero;
            }
        }
        interface muestra{
            public function muestraResumen();
        }
    ?>
</body>
</html>