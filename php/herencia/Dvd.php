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
        class Dvd extends Soporte{
            public $idiomas;
            private $formatPantalla;
            public function __construct($titulo,$numero,$precio,$idiomas,$formatPantalla){
                $this -> titulo = $titulo;
                $this -> numero = $numero;
                $this -> precio = $precio;
                $this -> idiomas = $idiomas;
                $this -> formatPantalla = $formatPantalla;
            }
            public function muestraResumen(){
                echo '<br>Titulo: '.$this -> titulo.'<br>Numero: '.$this->numero.'<br>Precio: '.$this->precio.'<br>Idioma: '.$this->idiomas.'<br>Formato: '.$this->formatPantalla;
            }
        }
    ?>
</body>
</html>