<?php
if($nombre == "Kanto"){
    $pokemons = rango(1,151);
    $count = 1;
    $x = true;
}
if($nombre == "Johto"){
    $pokemons = rango(152,251);
    $count = 152;
    $x = true;
}
if($nombre == "Hoenn"){
    $pokemons = rango(252,386);
    $count = 252;
    $x = true;
}
if($nombre == "Sinnoh"){
    $pokemons = rango(387,493);
    $count = 387;
    $x = true;
}
if($nombre == "Unova"){
    $pokemons = rango(494,649);
    $count = 494;
    $x = true;
}
if($nombre == "Kalos"){
    $pokemons = rango(650,721);
    $count = 650;
    $x = true;
}
if($nombre == "Alola"){
    $pokemons = rango(722,809);
    $count = 722;
    $x = true;
}
if($nombre == "Galar"){
    $pokemons = rango(810,905);
    $count = 810;
    $x = true;
}
if($nombre == "Paldea"){
    $pokemons = rango(906,1017);
    $count = 906;
    $x = true;
}
function rango($inicio, $fin){
    return $url = "https://pokeapi.co/api/v2/pokemon/?limit=" . ($fin - $inicio + 1) . "&offset=" . ($inicio - 1);
}
    if($x){
        $respuesta = file_get_contents($pokemons);
        $pokemonLista = json_decode($respuesta, true);
        if($pokemonLista !== null && isset($pokemonLista['results'])){
            foreach($pokemonLista['results']as $pokemon){
                $nombre = $pokemon['name'];
                echo "<div class='todosPokemon'>";
                echo "<form action='datosPokemon.php' method='post' style='display: inline;'>";
                echo "<input type='hidden' name='nombre' value='$nombre'>";
                echo "<button type='submit' style='border: none; background: none; padding: 0; cursor: pointer;'>";
                echo "<img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$count.png' alt='$nombre'>";
                echo "</button>";
                echo "</form>";
                echo "<p>".$nombre . "</p>";
                echo "</div>";
                $count++;
            }
        }
    }
?>