<?php
    session_start();
    if(isset($_SESSION['usuario'])){

    }else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Lista de todos los Discos</h1>
    <table border="1">
        <tr>
            <th>Imagen</th>
            <th>Usuario</th>
        </tr>
        <?php
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
            }catch (PDOException $e){
                echo 'Falló la conexión: ' . $e->getMessage();
            }
            $user = $_SESSION['usuario'];
            $consulta = $conexion ->prepare('SELECT * FROM tabla_usuarios where usuario = :user');
            $consulta -> bindParam(':user',$user);
            $consulta -> execute();
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                $peque = $fila['imagen_ruta_peque'];
                echo "<tr>";
                echo "<td><img src='./$peque' style='width: 72px; height: 96px;'></td>";
                echo "<td>$user</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>