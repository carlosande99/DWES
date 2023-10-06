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
        include("contacto.inc.php");
        include("agenda.inc.php");
        $agenda = new Agenda();
        $agenda -> agregarContacto(new Contacto($_POST['nombre'],$_POST['apellidos1'],$_POST['apellidos2'],$_POST['telefono']));
        $id = $agenda -> devolverPosi(0);
        $nombre = $agenda ->devolverPosi(0);
        $apellido1 = $agenda -> devolverPosi(0);
        $apellido2 = $agenda -> devolverPosi(0);
        $telefono = $agenda -> devolverPosi(0);
        $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
        // print $conexion->server_info;
        $resultado = ('INSERT INTO contacto(id,nombre,apellido_1,apellido_2,telefono) VALUES (:id,:nombre,:apellidos1,:apellidos2,:telefono);');
        $conexion->close();
    ?>
</body>
</html>