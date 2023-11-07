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
            <legend>Eliminar Contacto</legend>
                Id de contacto <input type="number" name="id" required><br><br>
                <input type="image" src="../contacto/papelera.png" width="20px" height="20px" style="float: left;">
                <a href="../contacto/prueba.php" style="float: right;">Volver</a>
        </fieldset>
    </form>
    <?php
        session_start();
        if(isset($_SESSION['datos']) && !empty($_SESSION['datos'])){
            $datos = $_SESSION['datos'];
            if(isset($_POST['id'])){
                $boolean = false;
                for($i=0;$i<count($datos);$i++){
                    if($datos[$i]==$_POST['id']){
                        $boolean = true;
                    }
                }
                if($boolean){
                    $id = $_POST['id'];
                    $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
                    $sql = "DELETE FROM contacto WHERE id = $id";
                    $result = $conexion->query($sql);
                    header("Location: ../contacto/prueba.php");
                }else{
                    echo "Ese contacto a borrar no existe<br>";
                }
            }else{
                echo "Ningun dato introducido<br>";
            }
        }else{
            echo "No existe ningun contacto<br>";
        }

    ?>
</body>
</html>