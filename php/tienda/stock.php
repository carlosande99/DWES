<!DOCTYPE html>
<html>
<head>
    <title>Stock de Producto</title>
</head>
<body>
    <h1>Stock de Producto</h1>
    <?php
    // Conexión a la base de datos (debes configurar tus propias credenciales)
    $mysqli = new mysqli("localhost", "carlos", "741852963sande", "dwes");

    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Obtener el código del producto de la URL
    $producto_cod = isset($_GET['cod']) ? $_GET['cod'] : '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Iniciar una transacción
        $mysqli->begin_transaction();

        // Obtener la lista de tiendas y las cantidades de stock a actualizar
        $tiendas = $_POST['tiendas'];
        $cantidades = $_POST['cantidades'];

        // Crear una consulta preparada para actualizar el stock en cada tienda
        $stmt = $mysqli->prepare("UPDATE stock SET unidades = ? WHERE producto = ? AND tienda = ?");

        if ($stmt) {
            for ($i = 0; $i < count($tiendas); $i++) {
                $stmt->bind_param("iss", $cantidades[$i], $producto_cod, $tiendas[$i]);
                $stmt->execute();
            }

            // Confirmar la transacción
            $mysqli->commit();

            // Cerrar la consulta preparada
            $stmt->close();

            echo "Stock actualizado correctamente.";
        } else {
            // Si hay un error en la consulta preparada, realizar un rollback
            $mysqli->rollback();

            echo "Error al actualizar el stock.";
        }
    }

    // Consulta para obtener el stock actual del producto en cada tienda
    $sql = "SELECT * FROM stock WHERE producto = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $producto_cod);
        $stmt->execute();
        $stmt->bind_result($producto,$tienda, $unidades);

        echo "<form method='post'>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Producto</th>
                <th>Tienda</th>
                <th>Unidades</th>
                </tr>";

        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>$producto</td>";
            echo "<td>$tienda</td>";
            echo "<td>
                <input type='text' name='cantidades[]' value='$unidades'>
                <input type='hidden' name='tiendas[]' value='$tienda'>
                </td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<input type='submit' value='Actualizar Stock'>";
        echo "</form>";

        $stmt->close();
    } else {
        echo "Error en la consulta preparada.";
    }

    // Cerrar la conexión a la base de datos
    $mysqli->close();
    ?>
    <a href="../tienda/principal.php" style="color: blue;">Volver a la lista de productos</a>
</body>
</html>
