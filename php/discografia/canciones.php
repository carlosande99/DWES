<?php
session_start();
if (isset($_SESSION['usuario'])) {

} else {
    header("Location: login.php");
}

// Arreglo para almacenar las búsquedas
$busquedas = [];

// Comprobar si la cookie existe y contiene búsquedas previas
if (isset($_COOKIE['ultimas_busquedas'])) {
    $busquedas = json_decode($_COOKIE['ultimas_busquedas'], true);
}

// Manejar el formulario de búsqueda
if (isset($_POST["opcion"])) {
    $opcion = $_POST["opcion"];
    $texto = $_POST["texto"];
    $genero = $_POST['genero'];

    // Agregar la búsqueda actual al arreglo de búsquedas
    $busquedaActual = [
        'opcion' => $opcion,
        'texto' => $texto,
        'genero' => $genero,
    ];

    // Agregar la búsqueda al inicio del arreglo para mostrar las más recientes primero
    array_unshift($busquedas, $busquedaActual);

    // Limitar el número de búsquedas guardadas (puedes ajustar este número)
    $busquedas = array_slice($busquedas, 0, 5);

    // Guardar el arreglo de búsquedas en la cookie
    setcookie('ultimas_busquedas', json_encode($busquedas), time() + 3600, '/');
}
if (!empty($busquedas)) {
    echo "<h2>Últimas búsquedas:</h2>";
    echo "<ul>";
    foreach ($busquedas as $busqueda) {
        echo "<li>Buscando en: " . $busqueda['opcion'] . ", Texto: " . $busqueda['texto'] . ", Género: " . $busqueda['genero'] . "</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar canciones</title>
</head>
<body>
<form action="#" method="post" style="align-items:center">
    <fieldset style="display: inline;">
        <h1>Busqueda de canciones</h1>
        <label>Texto a buscar:</label>
        <input type="text" name="texto">
        <br><br>
        <label>Buscar en:
        <input type="radio" name="opcion" value="titulo_cancion">Titulos de cancion
        </label>
        <label>
        <input type="radio" name="opcion" value="nombre_album">Nombres de álbum
        </label>
        <label>
        <input type="radio" name="opcion" value="ambos">Ambos campos
        </label><br><br>
        <label>Género musical:
        <select name="genero">
            <option value="Clasica">Clásica</option>
            <option value="BSO">BSO</option>
            <option value="Blues">Blues</option>
            <option value="Electronica">Electrónica</option>
            <option value="Jazz">Jazz</option>
            <option value="Metal">Metal</option>
            <option value="Pop">Pop</option>
            <option value="Rock">Rock</option>
        </select>
        </label><br><br>
        <a href="prueba.php">
            <button type="button">Volver</button>
        </a>
        <button type="submit" name="boton" value="guardar" style="float: left; margin-right:20px">Buscar</button>
    </fieldset>
</form>
<?php
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
    }catch (PDOException $e){
        echo 'Falló la conexión: ' . $e->getMessage();
    }
        
        if (isset($_POST["opcion"])){
            $opcion = $_POST["opcion"];
            $texto = $_POST["texto"];
            $genero = $_POST['genero'];
            switch ($opcion){               
                case "titulo_cancion":
                    ?>
                    <table border="1">
                    <tr>
                        <th>Titulo</th>
                        <th>Álbum</th>
                        <th>Posicion</th>
                        <th>Duracion</th>
                        <th>Genero</th>
                    </tr>
                    <?php
                    $consulta = $conexion->prepare('SELECT * FROM cancion WHERE titulo=:titulo AND genero=:genero');
                    $consulta->bindParam(':titulo', $texto);
                    $consulta->bindParam(':genero',$genero);
                    $consulta->execute();
                    while(($resultado = $consulta->fetch())){
                        $titulo = $resultado['titulo'];
                        $album = $resultado['album'];
                        $posicion = $resultado['posicion'];
                        $duracion = $resultado['duracion'];
                        $genero2 = $resultado['genero'];
                        echo "<tr>";
                        echo "<td>$titulo</td>";
                        echo "<td>$album</td>";
                        echo "<td>$posicion</td>";
                        echo "<td>$duracion</td>";
                        echo "<td>$genero2</td>";
                        echo "</tr>";
                    }
                    break;
                case "nombre_album":
                    ?>
                    <table border="1">
                    <tr>
                        <th>Titulo</th>
                        <th>Álbum</th>
                        <th>Posicion</th>
                        <th>Duracion</th>
                        <th>Genero</th>
                    </tr>
                    <?php
                    $consulta = $conexion->prepare('SELECT * FROM cancion WHERE album=:titulo AND genero=:genero');
                        $albumm = (int)$texto;
                        $consulta->bindParam(':titulo', $albumm);
                        $consulta->bindParam(':genero',$genero);
                        $consulta->execute();
                    while(($resultado = $consulta->fetch())){
                        $titulo = $resultado['titulo'];
                        $album = $resultado['album'];
                        $posicion = $resultado['posicion'];
                        $duracion = $resultado['duracion'];
                        $genero2 = $resultado['genero'];
                        echo "<tr>";
                        echo "<td>$titulo</td>";
                        echo "<td>$album</td>";
                        echo "<td>$posicion</td>";
                        echo "<td>$duracion</td>";
                        echo "<td>$genero2</td>";
                        echo "</tr>";
                    }
                    break;
                case "ambos":
                    ?>
                    <table border="1">
                    <tr>
                        <th>Titulo</th>
                        <th>Álbum</th>
                        <th>Posicion</th>
                        <th>Duracion</th>
                        <th>Genero</th>
                    </tr>
                    <?php
                    $consulta = $conexion->prepare('SELECT * FROM cancion WHERE album=:albumm OR titulo=:titulo AND genero=:genero');
                    $albumm = (int)$texto;
                    $consulta->bindParam(':albumm', $albumm);
                    $consulta->bindParam(':titulo', $texto);
                    $consulta->bindParam(':genero',$genero);
                    $consulta->execute();
                    while(($resultado = $consulta->fetch())){
                        $titulo = $resultado['titulo'];
                        $album = $resultado['album'];
                        $posicion = $resultado['posicion'];
                        $duracion = $resultado['duracion'];
                        $genero2 = $resultado['genero'];
                        echo "<tr>";
                        echo "<td>$titulo</td>";
                        echo "<td>$album</td>";
                        echo "<td>$posicion</td>";
                        echo "<td>$duracion</td>";
                        echo "<td>$genero2</td>";
                        echo "</tr>";
                    }
                break;
            }
        }
?>
</table>
</body>
</html>