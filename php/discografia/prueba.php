<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Lista de todos los Discos</h1>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Discografia</th>
            <th>Formato</th>
            <th>Fecha lanzamiento</th>
            <th>Fecha compra</th>
            <th>Precio</th>
        </tr>
    <?php
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
    }catch (PDOException $e){
        echo 'Falló la conexión: ' . $e->getMessage();
    }
    $consulta = $conexion ->query('SELECT * FROM album');
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $cod = $fila['cod'];
        $titulo = $fila['titulo'];
        $discografia = $fila['discografia'];
        $formato = $fila['formato'];
        $fecha_lan = $fila['fecha_lanzamiento'];
        $fecha_com = $fila['fecha_compra'];
        $precio = $fila['precio'];
        echo "<tr>";
        echo "<td><a href='discos.php?album=$cod' style='color:blue;text-decoration:none;'>$cod</a></td>";
        echo "<td>$titulo</td>";
        echo "<td>$discografia</td>";
        echo "<td>$formato</td>";
        echo "<td>$fecha_lan</td>";
        echo "<td>$fecha_com</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
    }
    ?>
    </table>
    <a href="disconuevo.php">
    <button style="margin-top:5px;margin-right:10px;">Agregar disco</button>
    </a>

    <a href="canciones.php">
    <button style="margin-top:5px;margin-right:10px;">Buscar canciones</button>
    </a>
</body>
</html>