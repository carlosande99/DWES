<?php
session_start();
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    if($nombre == "Kanto"){
        $_SESSION["region"] = "Kanto";
        header("Location: Kanto.php");
    }
    if($nombre == "Johto"){
        $_SESSION["region"] = "Johto";
        header("Location: Johto.php");
    }
    if($nombre == "Hoenn"){
        $_SESSION["region"] = "Hoenn";
        header("Location: Hoenn.php");
    }
    if($nombre == "Sinnoh"){
        $_SESSION["region"] = "Sinnoh";
        header("Location: Sinnoh.php");
    }
    if($nombre == "Unova"){
        $_SESSION["region"] = "Unova";
        header("Location: Unova.php");
    }
    if($nombre == "Kalos"){
        $_SESSION["region"] = "Kalos";
        header("Location: Kalos.php");
    }
    if($nombre == "Alola"){
        $_SESSION["region"] = "Alola";
        header("Location: Alola.php");
    }
    if($nombre == "Galar"){
        $_SESSION["region"] = "Galar";
        header("Location: Galar.php");
    }
    if($nombre == "Paldea"){
        $_SESSION["region"] = "Paldea";
        header("Location: Paldea.php");
    }
    if($nombre == "Hisui"){
        $_SESSION["region"] = "Hisui";
        header("Location: Hisui.php");
    }
?>