<?php
set_time_limit(300);
$arrayId = array();
$arrayName = array();
$urlRegion = "https://pokeapi.co/api/v2/pokedex/" . strtolower($nombreSinNumeros);
try {
    $respuesta2 = @file_get_contents($urlRegion);
    if ($respuesta2 !== false && !empty($respuesta2)){
        $region = json_decode($respuesta2, true);
        foreach ($region['pokemon_entries'] as $entry) {
            $nameEspecie = $entry['pokemon_species']['name'];
            $urlEspecie = $entry['pokemon_species']['url'];
            $id = sacarId($urlEspecie);
            array_push($arrayId,$id);
            array_push($arrayName, $nameEspecie);
        }
    }else{
        $urlRegion = "https://pokeapi.co/api/v2/pokedex/original-" . strtolower($nombreSinNumeros);
        $respuesta2 = @file_get_contents($urlRegion);
        if ($respuesta2 !== false && !empty($respuesta2)){
            $region = json_decode($respuesta2, true);
            foreach ($region['pokemon_entries'] as $entry) {
                $nameEspecie = $entry['pokemon_species']['name'];
                $urlEspecie = $entry['pokemon_species']['url'];
                $id = sacarId($urlEspecie);
                // ponerDatos($nameEspecie,$id);
                array_push($arrayId,$id);
                array_push($arrayName, $nameEspecie);
            }
        }else{
            echo "<h1 style='color:red;text-align:center;'>DATO NO ENCONTRADO</h1>";
        }

    }
}catch(Exception $e){

}
ponerDatos($arrayName,$arrayId);
function sacarId($urlEspecie){
    $respuesta4 = file_get_contents($urlEspecie);
    $especieData = json_decode($respuesta4, true);
    $id = $especieData['id'];
    return $id;
}
function ponerDatos($nombre,$id){

    for ($x = 0; $x < count($nombre); $x++) {
        $name = $nombre[$x];
        $iD = $id[$x];

        echo "<div class='todosPokemon'>";
        echo "<form action='datosPokemon.php' method='post' style='display: inline;'>";
        echo "<input type='hidden' name='nombre' value='$name'>";
        echo "<button type='submit' style='border: none; background: none; padding: 0; cursor: pointer;'>";
        echo "<img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$iD.png' alt='$name'>";
        echo "</button>";
        echo "</form>";
        echo "<p>" . $name . "</p>";
        echo "</div>";
    }
}
?>

