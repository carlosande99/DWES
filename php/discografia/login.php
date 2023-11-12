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
        <a href="registro.php">
        <button type="button">Crear cuenta</button>
        </a>
    </form>
<?php
    session_start();
    include("script.php");
    include("cookie.php");
        if (isset($_POST["usuario"])){
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
                    // verifica la contra
                    if (password_verify($contraseña, $contra)) {
                        echo "Login correcto";
                        // setcookie('usuario',$user,time()+3600);
                        // setcookie('contra',$contra,time()+3600);
                        $_SESSION['usuario']=$user;
                        $logNo = false;
                        header("Location: prueba.php");
                    }
                }
                if($logNo) {
                    echo "Contraseña incorrecta";
                }
                
            }else{
                echo "no existe ese usuario";
            }
        }

    ?>
</body>
</html>