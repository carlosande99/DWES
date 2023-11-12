<?php
    // usuarios
    $usuario = "carlos";
    $usuario2 = "carlosande99";
    $usuario3 = "sergio";
    $usuario4 = "fran";
    $usuario5 = "xXcarlos_gamerXx69";
    // contraseñas
    $pass = "contraseña1";
    $pass2 = "contraseña2";
    $pass3 = "contraseña3";
    $pass4 = "contraseña4";
    $pass5 = "contraseña5";
    $hash = password_hash($pass,PASSWORD_DEFAULT);
    $hash2 = password_hash($pass2,PASSWORD_DEFAULT);
    $hash3 = password_hash($pass3,PASSWORD_DEFAULT);
    $hash4 = password_hash($pass4,PASSWORD_DEFAULT);
    $hash5 = password_hash($pass5,PASSWORD_DEFAULT);
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
        }catch (PDOException $e){
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        $busqueda = $conexion -> prepare('SELECT usuario FROM tabla_usuarios WHERE usuario = :usuario');
        $busqueda -> bindParam(":usuario",$usuario);
        $busqueda -> execute();
        if($busqueda->rowCount() == 0){
            // conexion a la base de datos
            $consulta = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass);');
            $consulta -> bindParam(':usuario',$usuario);
            $consulta -> bindParam(':pass',$hash);
            
            $consulta2 = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass);');
            $consulta2 -> bindParam(':usuario',$usuario2);
            $consulta2 -> bindParam(':pass',$hash2);

            $consulta3 = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass);');
            $consulta3 -> bindParam(':usuario',$usuario3);
            $consulta3 -> bindParam(':pass',$hash3);

            $consulta4 = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass);');
            $consulta4 -> bindParam(':usuario',$usuario4);
            $consulta4 -> bindParam(':pass',$hash4);

            $consulta5 = $conexion ->prepare('INSERT INTO tabla_usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass);');
            $consulta5 -> bindParam(':usuario',$usuario5);
            $consulta5 -> bindParam(':pass',$hash5);
            
            $consulta -> execute();
            $consulta2 -> execute();
            $consulta3 -> execute();
            $consulta4 -> execute();
            $consulta5 -> execute();
        }
?>