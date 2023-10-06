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
                Segundo apellido <input type="email" name="apellidos2"><br><br>
                Numero de telefono <input type="number" name="telefono"><br><br>
                <input type="submit" value="Enviar">
        </fieldset>
    </form>
    <?php
        include("contacto.inc.php");
        include("agenda.inc.php");
        $agenda = new Agenda();
        $agenda -> agregarContacto(new Contacto());
        $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
        print $conexion->server_info;
        $resultado = $dwes->query('INSERT INTO agenda ();');
        $conexion->close();
    ?>
</body>
</html>