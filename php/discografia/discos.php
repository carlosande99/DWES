<?php
    session_start();
    if(isset($_SESSION['usuario'])){

    }else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>discos</title>
</head>
<body>
    <h1>Lista de todas las canciones</h1>
    <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Álbum</th>
            <th>Posicion</th>
            <th>Duracion</th>
            <th>Genero</th>
        </tr>
    <?php
    $cod_album = isset($_GET['album']) ? $_GET['album'] : '';
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
    }catch (PDOException $e){
        echo 'Falló la conexión: ' . $e->getMessage();
    }
    $consulta = $conexion ->prepare('SELECT * FROM cancion where album = :prec');
    $consulta->bindParam(':prec',$cod_album);
    $consulta ->execute();
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $titulo = $fila['titulo'];
        $album = $fila['album'];
        $posicion = $fila['posicion'];
        $duracion = $fila['duracion'];
        $genero = $fila['genero'];
        echo "<tr>";
        echo "<td>$titulo</td>";
        echo "<td>$album</td>";
        echo "<td>$posicion</td>";
        echo "<td>$duracion</td>";
        echo "<td>$genero</td>";
        echo "</tr>";
    }
    ?>
    </table>
    <a href="prueba.php">
    <button style="margin-top:5px;margin-right:10px;">Volver</button>
    </a>
    <?php
    echo "<a href='cancionnueva.php?album=$cod_album'>";
    echo "<button style='margin-top:5px;margin-right: 10px;'>Añadir cancion</button></a>";

    echo "<a href='borrardisco.php?cod=$cod_album'>";
    echo "<button>Borrar disco</button></a>";
    ?>


</body>
</html>