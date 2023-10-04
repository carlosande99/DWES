<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tecnologias</title>
    </head>
    <body>
        <header>
            <h1>Página de Tecnologias</h1>
        </header>
            <?php
                include("cabecera.php");
                include("contar.php");
            ?>
        <section>
            <p>Tecnologias utilizadas:</p>
            <ul>
                <li>Html</li>
                <li>CSS</li>
                <li>JAVA</li>
                <li>JavaScript</li>
            </ul>
        </section>
        <footer>
        <?php
            include("footer.inc.php");
            echo "<br>";
            include("contar.php");
        ?>
        </footer>
    </body>
</html>