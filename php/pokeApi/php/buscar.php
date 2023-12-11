<?php

?>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $nombre = $_GET["nombre"];
		$nombreSinNumeros = $nombre;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php
			if($nombre !== null){
				echo $nombre;
			}else{
				echo "ERROR";
			}
		?>
	</title>
	<link rel="icon" href="../img/pelota.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/miEstilo.css">
</head>
<body>
 
<header> Mi blog de &nbsp;&nbsp;
	<a href="../index.php"> 
	<img src="../img/International_Pokémon_logo.svg.png">
	</a>
</header>

<div></div>

<nav>
	<!-- arreglar -->
	<strong>
		<a href="redigirir.php?nombre=Kanto">
		G1 Kanto &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Johto">
			G2 Johto &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Hoenn">
		G3 Hoenn  &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Sinnoh">
		G4 Sinnoh  &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Unova">
		G5 Unova  &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Kalos"> 
		G6 Kalos  &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Alola"> 
		G7 Alola &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Galar">
		G8 Galar &nbsp;&nbsp;
		</a>
		<a href="redigirir.php?nombre=Paldea">
		G9 Paldea &nbsp;&nbsp;
		</a>
		<button id="mostrarBuscador">
		Búsqueda
		</button>
		
		<div id="buscadorContainer">

		<form action="buscar.php" method="get">
        <input type="text" id="buscadorInput" name="nombre" placeholder="Buscar...">
        <button id="cerrarBuscador">Buscar</button>
		</form>
    	
		</div>
	</strong> 
</nav>
    <?php
	if(!empty($nombre)){
		$urlRegion = "https://pokeapi.co/api/v2/pokemon/" . strtolower($nombre);
		$respuesta2 = @file_get_contents($urlRegion);
		if ($respuesta2 !== false && !empty($respuesta2)){
			// echo " encontrado";
			$pokemon = json_decode($respuesta2, true);
			pokemon($pokemon);
		}else{			
			$urlRegion = "https://pokeapi.co/api/v2/type/" . strtolower($nombre);
			$respuesta2 = @file_get_contents($urlRegion);
			if ($respuesta2 !== false && !empty($respuesta2)){
				$tipo = json_decode($respuesta2, true);
				tipo($tipo);
			}else{
				include("sacaPokeRegion.php");
			}
		}
	}else{
		echo "<h1 style='color:red;text-align:center;'>DATO NO ENCONTRADO</h1>";
	}
    ?>
<footer>
	Trabajo &nbsp;
	<strong> Desarrollo Web en Entorno Servidor </strong>
	&nbsp; 2023/2024 IES Serra Perenxisa.
</footer>
<script src="../js/prueba.js"></script>
</body>
</html>
<?php
	function pokemon($pokemon){
		$nombre = $pokemon['name'];
		$tipo = $pokemon['types'];
		$id = $pokemon['id'];
		$peso = $pokemon['weight'];
		$stats = $pokemon['stats'];
		$altura = $pokemon['height'];
		$fotoNormal = "";
		if($pokemon['sprites']['other']['official-artwork']['front_default'] === null){
			$fotoNormal = $pokemon['sprites']['other']['dream_world']['front_default'];
			$fotoShiny = $pokemon['sprites']['front_shiny'];
		}else{
			$fotoNormal = $pokemon['sprites']['other']['official-artwork']['front_default'];
			$fotoShiny = $pokemon['sprites']['other']['official-artwork']['front_shiny'];
		}

		$imagenes = array($fotoNormal,$fotoShiny);
			$urlPoke = 'https://pokeapi.co/api/v2/pokemon-species/'.$id;
			$respuesta2 = file_get_contents($urlPoke);
			$pokemonDatos = json_decode($respuesta2, true);

			$descripcion_spanish = '';
			foreach ($pokemonDatos['flavor_text_entries'] as $entry) {
				if($entry['language']['name'] === 'es'){
					$descripcion_spanish = $entry['flavor_text'];
					break;
				}else if ($entry['language']['name'] === 'en') {
					$descripcion_spanish = $entry['flavor_text'];
				}
			}

			echo "<p id='titulo'><strong>". primeraLetraMayuscula($nombre)."</strong> N.".agregarCeros($id)."</p>";
			echo "<div id='cajaGrande'>";
			
			echo "<div id='cajaImagen'>";
			echo "<img src='$fotoNormal' id='imagenPokemon'>";	
			echo "<button id='botonImagen' onclick='cambiarImagen(".json_encode(array_map('addslashes', $imagenes)).")'><img src='../img/proximo.svg'></button>";
			echo "</div>";

			echo "<div id='datosPokemon'>";

				echo "<div id='descripcion'>";
				echo "<p><strong>Descripcion: </strong><br>";
				echo $descripcion_spanish . "</p>";
				echo "</div>";

				echo "<div id='contenedorDatos'>";
				echo "<div id='datos'>";
				echo "<p><strong>Altura: </strong>".$altura/10 ." m</p>";
				echo "<p><strong>Peso: </strong>".$peso/10 ." kg</p>";
				echo "<p><strong>Tipo: </strong>";
				foreach($tipo as $tipos){
					echo " ".$tipos['type']['name'];
				}
				echo "</p>";
				echo "</div>";

				echo "<div id='debilidades'>";
				$debilidadesBulbasaur = obtenerDebilidadesPokemon($nombre);
				echo "<p><strong>Debilidades: </strong><br><br>";
				if ($debilidadesBulbasaur !== null) {
					foreach ($debilidadesBulbasaur as $debilidad){
						echo $debilidad."<br>";
					}
					echo "</p>";
				}
				echo "</div>";

				echo "<div id='estadisticas'>";
				echo "<p><strong>Stats: </strong><br><br>";
				foreach($stats as $stat){
					echo "<em>".$stat['stat']['name'].": </em>";
					echo $stat['base_stat']. "<br>";
				}
				echo "</div>";
				echo "</div>";
			echo "</div>";
			echo "</div>";
		}
		function agregarCeros($numero) {
			$maxDigitos = 4;
			$numeroConCeros = str_pad($numero, $maxDigitos, '0', STR_PAD_LEFT);
			return $numeroConCeros;
		}
		function primeraLetraMayuscula($cadena) {
			$primeraLetra = strtoupper(substr($cadena, 0, 1));
			$restoCadena = strtolower(substr($cadena, 1));
			$cadenaMayuscula = $primeraLetra . $restoCadena;	
			return $cadenaMayuscula;
		}
		function obtenerDebilidadesPokemon($nombrePokemon) {
			$urlPokemon = "https://pokeapi.co/api/v2/pokemon/{$nombrePokemon}";
			$respuestaPokemon = file_get_contents($urlPokemon);
		
			if ($respuestaPokemon !== false) {
				$datosPokemon = json_decode($respuestaPokemon, true);
		
				// Obtener tipos del Pokémon
				$tiposPokemon = array_column($datosPokemon['types'], 'type', 'slot');
		
				// Obtener debilidades de cada tipo del Pokémon
				$debilidades = [];
				$fortalezas = [];
				$mitadDaño = [];
				foreach ($tiposPokemon as $tipoPokemon) {
						$urlTipo = $tipoPokemon['url'];
						$respuestaTipo = file_get_contents($urlTipo);
						if ($respuestaTipo !== false) {
							$datosTipo = json_decode($respuestaTipo, true);
			
							// Obtener debilidades del tipo
							$debilidadesTipo = array_column($datosTipo['damage_relations']['double_damage_from'], 'name');
			
							// obtiene lo que le haze mitad daño
							$mitadTipo = array_column($datosTipo['damage_relations']['half_damage_from'], 'name');
	
							// obtiene las inmunidades
							$inmune = array_column($datosTipo['damage_relations']['no_damage_from'],'name');
	
							// Agregar debilidades a la lista
							$debilidades = array_merge($debilidades, $debilidadesTipo);
			
							// Agregar fortalezas a la lista
							$fortalezas = array_merge($fortalezas, $mitadTipo);
							$fortalezas = array_merge($fortalezas, $inmune);
						} else {
							return null;
						}
				}
		
				// Eliminar duplicados de la lista de debilidades y fortalezas
				$debilidades = array_unique($debilidades);
				$fortalezas = array_unique($fortalezas);
		
				// Eliminar debilidades que también son fortalezas
				$debilidades = array_diff($debilidades, $fortalezas);
		
				return $debilidades;
			} else {
				return null;
			}
		}
function tipo($tipo){
	foreach ($tipo['pokemon'] as $pokemons) {
		$url = $pokemons['pokemon']['url'];
		$respuesta = file_get_contents($url);
		$pokemon = json_decode($respuesta, true);
			$num = $pokemon['id'];
			$name = $pokemon['name'];
			if($num<=1017){
				echo "<div class='todosPokemon'>";
                echo "<form action='datosPokemon.php' method='post' style='display: inline;'>";
                echo "<input type='hidden' name='nombre' value='$name'>";
                echo "<button type='submit' style='border: none; background: none; padding: 0; cursor: pointer;'>";
                echo "<img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$num.png' alt='$name'>";
                echo "</button>";
                echo "</form>";
                echo "<p>".$name . "</p>";
                echo "</div>";
			}			

	}
}
?>