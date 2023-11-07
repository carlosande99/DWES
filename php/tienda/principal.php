<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nombre Corto</th>
            <th>Descripción</th>
            <th>Precio (PVP)</th>
            <th>Familia</th>
        </tr>
        <?php
        // Conexión a la base de datos (debes configurar tus propias credenciales)
        $mysqli = new mysqli("localhost", "carlos", "741852963sande", "dwes");

        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }

        // Consulta para obtener la lista de productos
        $result = $mysqli->stmt_init();
        $result->prepare('SELECT * FROM producto');
        $result->execute();
        $result->bind_result($cod, $nombre, $nombre_corto, $descricion, $pvp, $familia);
        
        while ($result->fetch()) {
            echo "<tr>";
            echo "<td><a href='../tienda/stock.php?cod=$cod' style=\"color: blue;\">" . $cod . "</a></td>";
            echo "<td>" . $nombre_corto . "</td>";
            echo "<td>" . $descricion . "</td>";
            echo "<td>" . $pvp . "€</td>";
            echo "<td>" . $familia . "</td>";
            echo "</tr>";
        }

        // Cerrar la conexión a la base de datos
        $mysqli->close();
        ?>
    </table>
    </body>
</html>
