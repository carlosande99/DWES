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
        class Juego extends Soporte{
            public $consola;
            private $minNumJugadores;
            private $maxNumJugadores;
            public function __construct($titulo,$numero,$precio,$consola,$minNumJugadores,$maxNumJugadores){
                $this -> titulo = $titulo;
                $this -> numero = $numero;
                $this -> precio = $precio;
                $this -> consola = $consola;
                $this -> minNumJugadores = $minNumJugadores;
                $this -> maxNumJugadores = $maxNumJugadores;
            }
            public function muestraJugadoresPosibles(){
                if($this -> minNumJugadores == 1 && $this -> maxNumJugadores == 1){
                    return "Para un jugador";
                }else if($this -> minNumJugadores<$this -> maxNumJugadores){
                    return "De ".$this->minNumJugadores." a ".$this->maxNumJugadores." jugadores";
                }else{
                    return "Para ".$this->maxNumJugadores." jugadores";
                }
            }

            public function muestraResumen(){
                echo '<br>Titulo: '.$this -> titulo.'<br>Numero: '.$this->numero.'<br>Precio: '.$this->precio.'<br>Consola: '.$this->consola.'<br>Jugadores: '. $this -> muestraJugadoresPosibles();
            }
        }
    ?>
</body>
</html>