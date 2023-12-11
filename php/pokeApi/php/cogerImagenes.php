<?php
$director = "./img/";
$archivos = scandir($director);
$archivos = array_diff($archivos, array('..', '.'));

$excluidas = array('container_bg.png', 'International_Pokémon_logo.svg.png', 'pelota.png','proximo.svg');

$regiones = "https://pokeapi.co/api/v2/region/";
$respuesta = file_get_contents($regiones);
$regionLista = json_decode($respuesta, true);

$contador = 0;

echo "<div class='regiones'>";

foreach ($archivos as $archivo) {
    if (!in_array($archivo, $excluidas)) {
        $rutaimg = $director . $archivo;

        $nombreSinExtension = pathinfo($archivo, PATHINFO_FILENAME);
        $nombreSinNumeros = preg_replace("/[0-9]/", "", $nombreSinExtension);
        $enlace = "todasRegiones.php";

        echo '<div class="imagen-contenedor">';
        echo "<form action='./php/todasRegiones.php' method='post' style='display: inline;' class='imagen-contenedor2'>";
        echo "<input type='hidden' name='region' value='$nombreSinNumeros'>";
        echo "<button type='submit' style='border: none; background: none; padding: 0; cursor: pointer;' class='imagen-contenedor2'>";
        echo '<img src="' . $rutaimg . '" alt="' . $archivo . '">';
        echo "</button>";
        echo "</form>";
        echo '<p>' . $nombreSinNumeros . '</p>';
        echo '</div>';        
        $contador++;
        if ($contador % 3 == 0 || $contador == count($archivos)) {
            echo "</div>";           
            if ($contador != count($archivos)) {
                echo "<div class='regiones'>";
            }
        }
    }
}

?>