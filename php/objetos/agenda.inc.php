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
        class Agenda{
            private static $contactos = [];

            public function agregarContacto($contacto){
                //opcion para hacerla de manera estatica
            // public static function agregarContacto($contacto){
                self::$contactos[] = $contacto;
            }
            public function borrarContacto($idContacto){
                //opcion para hacerla de manera estatica
            // public static function borrarContacto($idContacto){
                foreach (self::$contactos as $indice => $contacto){
                    if($contacto['idContacto'] === $idContacto){
                        unset(self::$contactos[$indice]);
                    }
                }
            }
            public function __toString(){
                //opcion para hacerla de manera estatica
            // public static function toString(){
                $result = "";
                foreach (self::$contactos as $objeto){
                    $result .= $objeto .'<br>';
                }
                return $result;
            }
        }
    ?>
</body>

</html>