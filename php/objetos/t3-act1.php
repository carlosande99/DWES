<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        include("contacto.inc.php");
        include("agenda.inc.php");
        $contacto1 = new Contacto(1,"Carlos","Sande","Guerrero",637697129);
        $contacto2 = new Contacto(2,"Sergio","Sande","Guerrero",637697129);
        $agenda = new Agenda();
//opcion para hacerla de manera estatica
        // Agenda::agregarContacto($contacto1);
        // Agenda::agregarContacto($contacto2);
        // echo Agenda::toString();
        $agenda -> agregarContacto($contacto1);
        $agenda -> agregarContacto($contacto1);
        echo $agenda;
        
        echo $contacto1;
        echo $contacto2;
    ?>
</body>

</html>