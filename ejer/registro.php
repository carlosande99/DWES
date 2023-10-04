<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <header>
    <?php
        include("cabecera.php");
        include("contar.php");
    ?>
    </header>
    <aside>
            <form name="input" action="#" method="post">
                <fieldset style="display: inline;">
                    <legend>Datos de Contacto</legend>
                    Nombre <input type="text" name="nombre"><br><br>
                    Apellidos <input type="text" name="apellidos"><br><br>
                    Nombre de Usuario <input type="text" name="nameUsuario"><br><br>
                    Contraseña <input type="password" name="contra"><br><br>
                    Correo electronico <input type="email" name="correo"><br><br>
                    Fecha de nacimineto <input type="date" name="nacimiento"><br><br>
                    Genero: <input type="checkbox" name="check" value="Hombre">Maculino
                    <input type="checkbox" name="check" value="Mujer">Femenino
                    <input type="checkbox" name="check" value="Otro">Otro<br><br>
                    <input type="radio" name="condiciones">Aceptacion de las condiciones<br><br>
                    <input type="radio" name="publicidad">Aceptacion de envio de publicidad<br><br>
                </fieldset>
            </form>
            <?php
                echo '<br>Nombre: '.$_POST['nombre'];
                echo '<br>Apellidos: '. $_POST['apellidos'];
                echo '<br>Contra es: '. $_POST['contra'];
                echo '<br>Usuario es: '. $_POST['nameUsuario'];
                echo '<br>Tu correo: '.$_POST['correo'];
                echo '<br>Tu opcion es: '.$_POST['check'];
                echo '<br>Tu fecha es: '.$_POST['nacimiento'];
                echo '<br>Aceptas la condiciones: '.$_POST['condiciones'];
            ?>
        </aside>
    <footer>
        <?php
            include("footer.inc.php");
            echo "<br>";
            include("contar.php");
        ?>
    </footer>
</body>

</html>