<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:)</title>
</head>
<body>
<?php
$id_contacto;
$nombre_contacto="";
$apellido1_contacto = "";
$apellido2_contacto = "";
$telef_contacto;
?>
    <form action="../contacto/todoEnUno.php" method="post">
        <fieldset style="display: inline;">
            <legend>Datos de Contacto</legend>
            Id de contacto <input type="number" name="id" value="<?php echo $id_contacto; ?>"><br><br>
            Nombre <input type="text" name="nombre" value="<?php echo $nombre_contacto; ?>"><br><br>
            Primer apellido <input type="text" name="apellidos1" value="<?php echo $apellido1_contacto; ?>"><br><br>
            Segundo apellido <input type="text" name="apellidos2" value="<?php echo $apellido2_contacto; ?>"><br><br>
            Numero de telefono <input type="number" name="telefono" value="<?php echo $telef_contacto; ?>"><br><br>
            <button type="submit" name="boton" value="guardar" style="float: left; margin-right:20px">Guardar</button>
            
            <button type="submit" name="boton" value="borrar" style="float: left; margin-right:20px">
                <img src="../contacto/papelera.png" width="20px" height="20px" style="float: left;">
            </button>
            
            <button type="submit" name="boton" value="editar">
                <img src="../contacto/lapiz.png" width="20px" height="20px" style="float: left;">
            </button>
        </fieldset>
    </form>
    <?php
    $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
        if (isset($_POST['boton'])) {
            $botonPulsado = $_POST['boton'];
            // echo "Se pulsó el botón: " . $botonPulsado;
            switch($botonPulsado){
                case "guardar":
                    $consulta = $conexion->stmt_init();
                    $sql = "SELECT MAX(id) AS ultima_id FROM contacto";
                    $result = $conexion->query($sql);
                    $row = $result->fetch_assoc();
                    if($row['ultima_id'] !== null){
                        $id = $row['ultima_id'];
                        $id++;
                    }else{
                        $id = 1;
                    }
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
                    $consulta -> prepare("SELECT id,nombre,apellido_1,apellido_2,telefono FROM contacto");
                    $consulta->execute();
                    $consulta->bind_result($id,$name,$apellido_1,$apellido_2,$telf);
                    echo "<br>Todos los contactos:<br>";
                    while($consulta->fetch()){
                        echo "ID: ".$id."<br>Nombre: ".$name."<br>Apellidos: ".$apellido_1." ".$apellido_2."<br>Telefono: ".$telf."<br><br>";
                    }
                    $conexion->close();
                    break;
                case "borrar":
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
                                // $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
                                $sql = "DELETE FROM contacto WHERE id = $id";
                                $result = $conexion->query($sql);
                                echo "Contacto borrado con exito<br>";
                                $conexion->close();
                            }else{
                                echo "Ese contacto a borrar no existe<br>";
                                $conexion->close();
                            }
                        }else{
                            echo "Ningun dato introducido";
                            $conexion->close();
                        }
                    }else{
                        echo "No existe ningun contacto<br>";
                        $conexion->close();
                    }
                    break;
                case "editar":
                    $consulta2 = $conexion->stmt_init();
                    $consulta2 -> prepare("SELECT id FROM contacto");
                    $consulta2 -> execute();
                    $consulta2 -> bind_result($id);
                    $array = array();
                    while($consulta2 -> fetch()){
                        array_push($array, $id);
                    }
                    $_SESSION['datos'] = $array;
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
                                $nombre = $_POST['nombre'];
                                $apellido1 = $_POST['apellidos1'];
                                $apellido2 = $_POST['apellidos2'];
                                $telefono = $_POST['telefono'];
                                // $conexion = new mysqli('localhost', 'carlos', '741852963sande', 'agenda');
                                $sql = "UPDATE contacto SET nombre = '$nombre', apellido_1 = '$apellido1', apellido_2 = '$apellido2', telefono = '$telefono' WHERE id = $id";
                                $result = $conexion->query($sql);
                                echo "Contacto actualizado con exito<br>";
                                $conexion->close();
                            }else{
                                echo "Ese contacto a modificar no existe<br>";
                                $conexion->close();
                            }
                        }else{
                            echo "Ningun dato introducido<br>";
                        }
                    }else{
                        echo "No existe ningun contacto<br>";
                        $conexion->close();
                    }
                    break;
                default:
                $conexion->close();
                break;
            }
        } else {
            echo "No se ha pulsado ningún botón.";
        }
    ?>
</body>
</html>
