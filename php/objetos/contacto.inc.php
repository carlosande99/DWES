<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        class Contacto{
            // private $idContacto;
            private static $idContacto = 0;
            private $nombre;
            private $apellido1;
            private $apellido2;
            private $telefono;

            public function __construct($nombre, $apellido1,$apellido2,$telefono){
                // $this->idcontacto++;
                self::$idContacto++;
                $this->nombre = $nombre;
                $this->apellido1 = $apellido1;
                $this->apellido2 = $apellido2;
                $this->telefono = $telefono;
            }
            public function __set($propiedad, $valor){
                $this->$propiedad = $valor;
            }
            public function __get($propiedad){
                return $this->$propiedad;
            }
            public function __toString(){
                return 'Nombre: '.$this->nombre.'<br>Apellidos: '.$this->apellido1.' '.$this->apellido2 . '<br>Telefono: '.$this->telefono.'<br>';            
            }
        }
    ?>
</body>

</html>