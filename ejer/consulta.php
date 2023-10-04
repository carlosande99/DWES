
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Principal</title>
    </head>
    <body>
        <?php
            include("cabecera.php");
            include("contar.php");
        ?>
        <?php
            echo '<br>Nombre: '.$_POST['nombre'];
            echo '<br>Apellidos: '. $_POST['apellidos'];
            echo '<br>Tu correo: '.$_POST['correo'];
            echo '<br>Tu numero es: '.$_POST['numero'];
            echo '<br>Tu opcion es: '.$_POST['check'];
            echo '<br>Tu fecha es: '.$_POST['fecha'];
            echo '<br>Aceptas la condiciones: '.$_POST['condiciones'];
        ?>
        <?php
            include("footer.inc.php");
            echo "<br>";
            include("contar.php");
        ?>
        </footer>
    </body>
</html>