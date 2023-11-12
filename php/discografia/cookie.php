<?php
if (isset($_COOKIE['usuario'])) {
    $usuario = $_COOKIE['usuario'];
    $pass = $_COOKIE['contra'];
    // Verificar si se ha enviado el formulario
    if (isset($_POST['confirmacion'])) {
        $confirmacion = $_POST['confirmacion'];
        if ($confirmacion == 'true') {
            echo "Login correcto";
            $busqueda = $conexion -> prepare('SELECT usuario, pass FROM tabla_usuarios WHERE usuario = :usuario AND pass = :pass');
            $busqueda -> bindParam(":usuario",$usuario);
            $busqueda -> bindParam(":pass",$pass);
            $busqueda -> execute();
        } else {
            echo 'Cookie eliminada';
            setcookie('usuario',$usuario,time()-3600);
            setcookie('contra',$pass,time()-3600);
        }
    } else{
        ?>
        <form method="post" action="">
            <label for="confirmacion">Desea iniciar sesion?:</label>
            <select name="confirmacion" id="confirmacion">
                <option value="true">Aceptar</option>
                <option value="false">No</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
        <?php
    }
}
?>
