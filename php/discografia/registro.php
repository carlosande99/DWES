<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Crear Cuenta</h2>
    <form action="#" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="user" name="user" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="pass" name="pass" required><br><br>

        <input type="submit" value="Crear sesión">
    </form>
</body>
<?php
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
    }catch (PDOException $e){
        echo 'Falló la conexión: ' . $e->getMessage();
    }
    if (isset($_POST["user"])){
        $user = $_POST["user"];
        $contraseña = $_POST["pass"];
        $hash = password_hash($contraseña,PASSWORD_DEFAULT);
        $consulta = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass);');
        $consulta -> bindParam(':usuario',$user);
        $consulta -> bindParam(':pass',$hash);
        $consulta -> execute();
        header("Location: login.php");
    }
?>
</html>