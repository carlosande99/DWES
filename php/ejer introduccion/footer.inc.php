<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
        <p>Carlos Sandemetrio Guerrero</p>
        <?php
            $dia = date("l");
            $mes = strftime("%B");
            $diaTraduccion = [
                "Monday" => "Lunes",
                "Tuesday" => "Martes",
                "Wednesday" => "Miércoles",
                "Thursday" => "Jueves",
                "Friday" => "Viernes",
                "Saturday" => "Sábado",
                "Sunday" => "Domingo"
            ];
            $mesTraduccion = [
                "January" => "Enero",
                "February" => "Febrero",
                "March" => "Marzo",
                "April" => "Abril",
                "May" => "Mayo",
                "June" => "Junio",
                "July" => "Julio",
                "August" => "Agosto",
                "September" => "Septiembre",
                "November" => "Noviembre",
                "December" => "Diciembre"
            ];
            $dia = $diaTraduccion[$dia];
            $mes = $mesTraduccion[$mes];
            echo strftime("$dia, %d de $mes de %Y");
        ?>
</body>

</html>