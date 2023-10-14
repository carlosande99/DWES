<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:)</title>
</head>
<body>
    <form action="#" method="post">
        <fieldset style="display: inline;">
            <legend>Datos de Contacto</legend>
                Nombre <input type="text" name="nombre"><br><br>
                Primer apellido <input type="text" name="apellidos1"><br><br>
                Segundo apellido <input type="text" name="apellidos2"><br><br>
                Numero de telefono <input type="number" name="telefono"><br><br>
                <input type="submit" value="Enviar">
        </fieldset>
    </form>
    <?php
    // faltara comprobar que la informacion es correcta
    // se tendria que sacar la informacion de la base de datos
        $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
        $sql = "SELECT MAX(id) AS ultima_id FROM contactos";
        $result = $conexion->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row['ultima_id'] !== null){
            $id = $row['ultima_id'];
            $id++;
        }else{
            $id = 1;
        }
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellidos1'];
        $apellido2 = $_POST['apellidos2'];
        $telefono = $_POST['telefono'];
        // print $conexion->server_info;
        $resultado = "INSERT INTO contacto (id, nombre, apellido_1, apellido_2, telefono) VALUES ('$id','$nombre', '$apellido1', '$apellido2', '$telefono')";
        if ($conexion->query($resultado) === TRUE) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar los datos: " . $conexion->error;
        }
        $conexion->close();
    ?>
</body>
</html>