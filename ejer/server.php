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
    <section>
        <table border="1">
        <?php
            foreach ($_SERVER as $clave => $valor){
                echo "<tr>";
                echo "<td>$clave</td>"; 
                echo "<td>$valor</td>";
                echo "</tr>";
            }
        ?>
        </table>
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