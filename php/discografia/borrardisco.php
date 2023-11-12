<?php
    session_start();
    if(isset($_SESSION['usuario'])){

    }else{
        header("Location: login.php");
    }
?>
<?php
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'carlos', '741852963sande'); 
        $cod = isset($_GET['cod']) ? $_GET['cod'] : '';
        $conexion->beginTransaction();
        $consulta = $conexion ->prepare('DELETE FROM cancion WHERE album = :cod');
        $consulta->bindParam(':cod',$cod);
        $consulta->execute();

        $consulta2 = $conexion ->prepare('DELETE FROM album WHERE cod = :cod');
        $consulta2->bindParam(':cod',$cod);
        $consulta2->execute();

        $conexion->commit();
        header("Location: prueba.php");
    }catch (PDOException $e){
        $conexion->rollBack();
        header("Location: discos.php" . getMessage("error"));
    }
?>