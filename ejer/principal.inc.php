<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Principal</title>
    </head>
    <body>
        <header>
            <h1>Página Principal</h1>
        </header>
            <?php
                include("cabecera.php");
                include("contar.php");
            ?>

        <section>
            <p>Hola mi nombre es Carlos Sandemetrio Guerrero</p>
            <p>Mi correo electronico es: <a href="mailto:micorreo@correo.com">micorreo@correo.com</a></p>
            <p>Foto mia:<img src="fotos\foto_mia.png" alt="foto mia" style="width: 5%;"></p>
        </section>

        <aside>
            <form action="consulta.php" method="post">
                <fieldset style="display: inline;">
                    <legend>Datos de Contacto</legend>
                    Nombre <input type="text" name="nombre"><br><br>
                    Apellidos <input type="text" name="apellidos"><br><br>
                    Correo <input type="email" name="correo"><br><br>
                    Numero <input type="number" name="numero"><br><br>
                    <input type="checkbox" name="check" value="Opcion 1">Opcion 1<br><br>
                    <input type="checkbox" name="check" value="Opcion 2">Opcion 2<br><br>
                    Fecha de nacimiento <input type="date" name="fecha"><br><br>
                    <input type="radio" name="condiciones">Aceptacion de las condiciones<br><br>
                    <input type="submit" value="Enviar">
                </fieldset>
            </form>
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