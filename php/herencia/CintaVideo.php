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
        class CintaVideo extends Soporte{
            private $duracion;
            public function __construct($titulo,$numero,$precio,$duracion){
                $this -> titulo = $titulo;
                $this -> numero = $numero;
                $this -> precio = $precio;
                $this -> duracion = $duracion;
            }
            public function muestraResumen(){
                echo '<br>Titulo: '.$this -> titulo.'<br>Numero: '.$this->numero.'<br>Precio: '.$this->precio.'<br>Resumen: '.$this->duracion;
            }
        }
    ?>
</body>
</html>