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
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <label for="imagen">Foto:</label>
        <input type="file" name="imagen" id="imagen"><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="user" name="user" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="pass" name="pass" required><br><br>

        <input type="submit" value="Crear sesión">
        <a href="login.php">
            <button type="button">Volver</button>
        </a>
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
        $exite_user = $conexion -> prepare('SELECT * FROM tabla_usuarios WHERE usuario = :usuario');
        $exite_user -> bindParam(':usuario',$user);
        $exite_user -> execute();
        if($exite_user->rowCount() == 0){
            $contraseña = $_POST["pass"];
            $hash = password_hash($contraseña,PASSWORD_DEFAULT);

            //control de la imagen
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $archivo_nombre = $_FILES["imagen"]["name"];
                // echo $archivo_nombre ."<br>";
                if($archivo_nombre != null){
                    $archivo_tipo = $_FILES["imagen"]["type"];
                    $archivo_temporal = $_FILES["imagen"]["tmp_name"];
                    // $archivo_tamano = $_FILES["imagen"]["size"];
                    // echo $archivo_tamano;
                    // $permitidos = array("image/jpg", "image/png");
                    if ($archivo_tipo == "image/jpeg" || $archivo_tipo == "image/png"){
                            $ruta_relativa = "img\\users\\".$user;
                            // crea la carpeta en la ruta
                            if (!file_exists($ruta_relativa)){
                                mkdir($ruta_relativa, 0777, true);
                            }
        
                            $ruta_destino = realpath($ruta_relativa)."\\".$archivo_nombre;
                            if (is_uploaded_file($_FILES['imagen']['tmp_name']) === true) {
                                if (move_uploaded_file($archivo_temporal, $ruta_destino)){
                                    echo "El archivo se ha subido correctamente.";
                                } else {
                                    echo "Hubo un error al subir el archivo.";
                                }
                            }
                            $peque = $ruta_relativa."\\".$archivo_nombre;
                            $grande = $ruta_relativa."\\".$archivo_nombre;
                            $consulta = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass, imagen_ruta_peque, imagen_ruta_grande) VALUES (NULL, :usuario, :pass, :peque, :grande);');
                            $consulta -> bindParam(':usuario',$user);
                            $consulta -> bindParam(':pass',$hash);
                            $consulta -> bindParam(':peque',$peque);
                            $consulta -> bindParam(':grande',$grande);
                            $consulta -> execute();
                        
                    }else{
                        echo "solo se permiten jpg, png";
                    }

                }else{
                    echo "seleccione una foto";
                }

            }


            // header("Location: login.php");
        }else{
            echo "<br>ESTE USUARIO YA EXISTE";
        }

    }
?>
</html>