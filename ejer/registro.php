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
    <h1>Registro de Usuario</h1>
    <form method="post" action="registro.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia" required><br><br>

        <label for="confirmar_contrasenia">Confirmar Contraseña:</label>
        <input type="password" id="confirmar_contrasenia" name="confirmar_contrasenia" required><br><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="fecha">Fecha de nacimiento:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label>Género:</label><br>
        <input type="radio" id="masculino" name="genero" value="Masculino">
        <label for="masculino">Masculino</label><br>

        <input type="radio" id="femenino" name="genero" value="Femenino">
        <label for="femenino">Femenino</label><br><br>

        <label for="condiciones">Aceptación de condiciones:</label>
        <input type="checkbox" id="condiciones" name="condiciones" value="Aceptado" required><br><br>

        Aceptación de publicidad: <input type="checkbox" name="publicidad" value="Aceptado"><br><br>

        <input type="submit" value="Registrarse">
    </form>
    <?php
    $errores = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $confirmar_contrasenia = $_POST["confirmar_contrasenia"];
        $correo = $_POST["correo"];
        $fecha = $_POST["fecha"];
        $genero = isset($_POST["genero"]) ? $_POST["genero"] : "";
        $condiciones = isset($_POST["condiciones"]) ? $_POST["condiciones"] : "";
        $publicidad = isset($_POST["publicidad"]) ? $_POST["publicidad"] : "";

        // Validar que todos los campos obligatorios estén completos
        if (empty($nombre) || empty($apellidos) || empty($usuario) || empty($contrasenia) || empty($confirmar_contrasenia) || empty($correo) || empty($fecha)) {
            $errores[] = "Todos los campos son obligatorios, excepto el de publicidad.";
        }

        // Validar que las contraseñas coincidan
        if ($contrasenia !== $confirmar_contrasenia) {
            $errores[] = "Las contraseñas no coinciden.";
        }
        if (empty($condiciones)) {
            $errores[] = "Debes aceptar las condiciones para registrarte.";
        }
        if (empty($genero)) {
            $errores[] = "Debes seleccionar tu género.";
        }

        // Mostrar el formulario con los errores
        // include("registro.php");

        // Mostrar errores en el formulario con datos enviados
        if (!empty($errores)) {
            echo "<h2>Errores en el formulario:</h2>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        } else {
            // Si no hay errores, mostrar mensaje de registro exitoso
            echo "<h2>Registro exitoso</h2>";
            echo "<p>Nombre: $nombre</p>";
            echo "<p>Apellidos: $apellidos</p>";
            echo "<p>Usuario: $usuario</p>";
            echo "<p>Correo: $correo</p>";
            echo "<p>Fecha de nacimiento: $fecha</p>";
            echo "<p>Género: $genero</p>";
            echo "<p>Aceptación de condiciones: $condiciones</p>";
            echo "<p>Aceptación de publicidad: $publicidad</p>";
        }
    }
    ?>
    <?php
        include("footer.inc.php");
        echo "<br>";
        include("contar.php");
    ?>
</body>
</html>
