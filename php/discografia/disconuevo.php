<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Añadir nuevos discos</h1>
<form action="#" method="post" style="align-items:center">
<fieldset style="display: inline;">
        <label>Codigo</label>
        <input type="number" name="codigo">
        <br><br>

        <label>Titulo</label>
        <input type="text" name="titulo">
        <br><br>

        <label>Discografia</label>
        <input type="text" name="discografia">
        <br><br>

        <label>Formato:</label><br>
        <input type="radio" name="formato" value="Vinilo">Vinilo
        </label>
        <label>
        <input type="radio" name="formato" value="CD">CD
        </label>
        <label>
        <input type="radio" name="formato" value="DVD">DVD
        </label>
        <label>
        <input type="radio" name="formato" value="MP3">MP3
        </label><br><br>

        <label>Fecha lanzamiento</label>
        <input type="date" name="fecha_lanzamiento">
        <br><br>

        <label>Fecha compra</label>
        <input type="date" name="fecha_compra">
        <br><br>

        <label>Precio</label>
        <input type="number" name="precio" step="any" inputmode="decimal">
        <br><br>

        <button type="submit" name="boton" value="guardar" style="float: left; margin-right:20px">Guardar</button>
        
        <a href="prueba.php">
        <button type="button">Volver</button>
        </a>
</fieldset>
</form>
    <?php
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
        }catch (PDOException $e){
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        if(isset($_POST['codigo'])){
            try{
                $codigo = $_POST['codigo'];
                $titulo = $_POST['titulo'];
                $discografia = $_POST['discografia'];
                if(isset($_POST['formato'])){
                    $formato = $_POST['formato'];
                }
                $fecha_lanzamiento = $_POST['fecha_lanzamiento'];
                $fecha_compra = $_POST['fecha_compra'];
                $precio = $_POST['precio'];
                $conexion = $conexion ->prepare('INSERT INTO album(cod,titulo,discografia,formato,fecha_lanzamiento,fecha_compra,precio) values(?,?,?,?,?,?,?);');
                $conexion -> bindParam(1,$codigo);
                $conexion -> bindParam(2,$titulo);
                $conexion -> bindParam(3,$discografia);
                $conexion -> bindParam(4,$formato);
                $conexion -> bindParam(5,$fecha_lanzamiento);
                $conexion -> bindParam(6,$fecha_compra);
                $conexion -> bindParam(7,$precio);
                if($conexion -> execute()){
                    header("Location: prueba.php");
                    echo "DATOS INTRODUCIDOS CON EXITO";
                }else{
                    echo "ERROR";
                }
            }catch(Throwable $e){
                echo "ERROR CON LOS DATOS INTRODUCIDOS";
            }
        }
    ?>

</body>
</html>