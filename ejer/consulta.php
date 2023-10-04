<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
        include("cabecera.php");
        include("contar.php");
    ?>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "<h2>Datos del formulario recibidos:</h2>";
            echo  "Nombre: ".$_POST['nombre']."<br>";
            echo  "Apellidos: ".$_POST['apellidos']."<br>";
            echo "Correo: ".$_POST['correo']."<br>";
            echo "Numero: ".$_POST['numero']."<br>";
            $opcion = isset($_POST["opcion"]) ? "Marcado" : "No marcado";
            echo "<p>Opcion: $opcion</p>";
            echo "Fecha: ".$_POST['fecha']."<br>";
        }

    ?>
    <?php
        include("footer.inc.php");
        echo "<br>";
        include("contar.php");
    ?>
</body>
</html>
