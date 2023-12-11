<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pokemon</title>
	<link rel="stylesheet" type="text/css" href="css/miEstilo.css">
	<link rel="icon" href="img/pelota.png" type="image/x-icon">
</head>
<body>
 
<header> Mi blog de &nbsp;&nbsp;
	<a href="index.php"> 
	<img src="img/International_Pokémon_logo.svg.png">
	</a>
</header>

<div></div>

<nav>
	<!-- arreglar -->
	<strong>
		<a href="./php/redigirir.php?nombre=Kanto">
		G1 Kanto &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Johto">
		G2 Johto &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Hoenn">
		G3 Hoenn  &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Sinnoh">
		G4 Sinnoh  &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Unova">
		G5 Unova  &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Kalos"> 
		G6 Kalos  &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Alola"> 
		G7 Alola &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Galar">
		G8 Galar &nbsp;&nbsp;
		</a>
		<a href="./php/redigirir.php?nombre=Paldea">
		G9 Paldea &nbsp;&nbsp;
		</a>
		<button id="mostrarBuscador">
		Búsqueda
		</button>
		
		<div id="buscadorContainer">

		<form action="./php/buscar.php" method="get">
        <input type="text" id="buscadorInput" name="nombre" placeholder="Buscar...">
        <button type="submit" id="cerrarBuscador">Buscar</button>
		</form>
    	
		</div>
	</strong> 
</nav>

<div id="iniciales">
<?php
 	include("./php/cogerImagenes.php");
?>
</div>

<footer>
	Trabajo &nbsp;
	<strong> Desarrollo Web en Entorno Servidor </strong>
	&nbsp; 2023/2024 IES Serra Perenxisa.
</footer>
<script src="./js/prueba.js"></script>
</body>
</html>