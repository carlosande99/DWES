<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Redes Sociales</title>
        <style>
            img {
                width: 1.1%;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Página de redes sociales</h1>
        </header>
            <?php
                include("cabecera.php");
                include("contar.php");
            ?>
        <section>
            <p>Mi facebook: <a href="https://www.facebook.com/?locale=es_ES"><img src="fotos\facebook.png" alt="simbolo de facebook"></a></p>
            <p>Mi twitter: <a href="https://twitter.com/?lang=es"><img src="fotos\twitter.png" alt="simbolo twitter"></a></p>
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