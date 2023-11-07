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
            <legend>Datos de Contacto</legend>
                Nombre <input type="text" name="nombre" required><br><br>
                Primer apellido <input type="text" name="apellidos1" required><br><br>
                Segundo apellido <input type="text" name="apellidos2" required><br><br>
                Numero de telefono <input type="number" name="telefono" required><br><br>
                <input type="submit" value="Guardar">
                <a href="../contacto/borrarContacto.php">
                <img src="../contacto/papelera.png" width="20px" height="20px" style="float: right;">
                </a>
        </fieldset>
    </form>
    <?php
    //para poder mandar los datos a traves del enlace
    session_start();
    // la conexion a la base de datos
    $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
    $consulta = $conexion->stmt_init();
    $consulta -> prepare("SELECT id,nombre,apellido_1,apellido_2,telefono FROM contacto");
    $consulta->execute();
    $consulta->bind_result($id,$name,$apellido_1,$apellido_2,$telf);
    while($consulta->fetch()){
        echo "ID: ".$id."<br>Nombre: ".$name."<br>Apellidos: ".$apellido_1." ".$apellido_2."<br>Telefono: ".$telf."<br><br>";
    }
    // select que saca la ultima id y comprueba que exista
    $sql = "SELECT MAX(id) AS ultima_id FROM contacto";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    if($row['ultima_id'] !== null){
        $id = $row['ultima_id'];
        $id++;
    }else{
        $id = 1;
    }
    // lo unico que hace es que no te salte que hay no estan los campos rellenados
    // la obligacion de rellenar los datos ya lo hacemos con required
        if(isset($_POST['nombre'])){
            // saca los datos de los inputs
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellidos1'];
            $apellido2 = $_POST['apellidos2'];
            $telefono = $_POST['telefono'];
            $resultado = "INSERT INTO contacto (id, nombre, apellido_1, apellido_2, telefono) VALUES ('$id','$nombre', '$apellido1', '$apellido2', '$telefono')";           
            // hace el insert para que salga en la base de datos y te dice si los datos
            // han sido metidos con exito o no
            if ($conexion->query($resultado) === TRUE) {
            echo "Datos insertados correctamente.<br>";
            } else {
            echo "Error al insertar los datos: " . $conexion->error."<br>";
            }
            // cierra la base de datoss
        }
    // saca todos los id
    $consulta2 = $conexion->stmt_init();
    $consulta2 -> prepare("SELECT id FROM contacto");
    $consulta2 -> execute();
    $consulta2 -> bind_result($id);
    $array = array();
    while($consulta2 -> fetch()){
        array_push($array, $id);
    }
    //se manda un array con los id
    $_SESSION['datos'] = $array;
    $conexion->close();
    ?>
</body>
</html>