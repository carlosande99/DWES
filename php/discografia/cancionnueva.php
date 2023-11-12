<?php
    session_start();
    if(isset($_SESSION['usuario'])){

    }else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Contacto</title>
</head>
<body>
    <?php
    $album = isset($_GET['album']) ? $_GET['album'] : '';
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
    }catch (PDOException $e){
        echo 'Falló la conexión: ';
    }
    $consulta = $conexion ->prepare('SELECT max(posicion) as posicion FROM cancion where album = :prec');
    $consulta->bindParam(':prec',$album);
    $consulta ->execute();
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
        $posicion = $fila['posicion'];
    }
    $posicion++;
    echo "<h2>Album: $album</h2>";
    ?>
    <form action="#" method="post" style="align-items:center">
    <fieldset style="display: inline;">
        <label>Titulo</label>
        <input type="text" name="nombre">
        <br><br>

        <label>Album</label>
        <input type="text" value="<?php echo $album?>" name="album" readonly>
        <br><br>

        <label>Posicion:</label>
        <input type="text" value="<?php echo $posicion?>" name="posicion" readonly>
        <br><br>

        <label>Duracion:</label>
        <input type="time" name="duracion">
        <br><br>

        <label>Genero:<br>
        <input type="radio" name="genero" value="Clasica">Clasica
        </label>
        <label>
        <input type="radio" name="genero" value="BSO">BSO
        </label>
        <label>
        <input type="radio" name="genero" value="Blues">Blues
        </label><br>
        <label>
        <input type="radio" name="genero" value="Electronica">Electronica
        </label>
        <label>
        <input type="radio" name="genero" value="Jazz">Jazz
        </label>
        <label>
        <input type="radio" name="genero" value="Metal">Metal
        </label><br>
        <label>
        <input type="radio" name="genero"value="Pop">Pop
        </label>
        <label>
        <input type="radio" name="genero" value="Rock">Rock
        </label>
        <br><br>
        <a href="prueba.php">
            <button type="button">Volver</button>
        </a>
        <button type="submit" name="boton" value="guardar" style="float: left; margin-right:20px">Guardar</button>
    </fieldset>
    </form>
    <?php
    if(isset($_POST['nombre'])){
        try{
            $nombre = $_POST['nombre'];
            $albumm = $_POST['album'];
            $posi = $_POST['posicion'];
            $duracion = $_POST['duracion'];
            if(isset($_POST['genero'])){
                $genero = $_POST['genero'];
            } 
            $consulta2 = $conexion ->prepare('INSERT INTO cancion(titulo,album,posicion,duracion,genero) values(?,?,?,?,?);');
            $consulta2 -> bindParam(1,$nombre);
            $consulta2 -> bindParam(2,$albumm);
            $consulta2 -> bindParam(3,$posi);
            $consulta2 -> bindParam(4,$duracion);
            $consulta2 -> bindParam(5,$genero);
            if($consulta2 -> execute()){
                echo "DATOS INTRODUCIDOS CON EXITO";
                // header("Location: ../cancionnueva.php");
            }else{
                echo "ERROR";
            }
        }catch(Throwable $e){
            
        }


    }
    ?>
</body>
</html>