<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="#" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br><br>

        <input type="submit" value="Iniciar sesión">
        
        <a href="registrarUsuario.php">
        <button type="button">Crear cuenta</button>
        </a>
    </form>
<?php
    session_start();
    try{
        if (isset($_POST["usuario"])){
            $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
            $user = $_POST["usuario"];
            $contraseña = $_POST["contrasena"];
            $busqueda = $conexion -> prepare('SELECT usuario, pass FROM tabla_usuarios WHERE usuario = :usuario');
            $busqueda -> bindParam(":usuario",$user);
            $busqueda -> execute();
            $logNo = true;
            if($busqueda->rowCount() > 0){
                while($datos = $busqueda->fetch()){
                    $user = $datos["usuario"];
                    $contra = $datos["pass"];
                    // verifica la contraseña
                    if (password_verify($contraseña, $contra)) {
                        echo "Login correcto";
                        // sesion de usuario
                        $_SESSION['usuario']=$user;
                        $logNo = false;
                        header("Location: index.php");
                    }
                }
                if($logNo) {
                    echo "<br>Contraseña incorrecta";
                }
                
            }else{
                echo "<br>No existe ese usuario";
            }
        }
    }catch(PDOException $e){
        echo "<BR>ERROR AL CONECTARSE A LA BASE DE DATOS";
    }
    ?>
</body>
</html>