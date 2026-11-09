<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barra=[
    [
        "TEXTO"=> "Inicio",
        "ENLACE"=> "/index.php",
        "ADICIONAL" => " >> "
        ],
        [
        "TEXTO"=> "Indice R1",
        "ENLACE" => "/aplicacion/relacion1/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO"=> "Ejercicio7",
        "ADICIONAL" => " >> "
    ],
];
//controlador
// arrays para cambiar el idioma de los dias a español y mostrar el mes en texto en vez de numero
$dias = array(
    "Monday" => "Lunes",
    "Tuesday" => "Martes",
    "Wednesday" => "Miercoles",
    "Thursday" => "Jueves",
    "Friday" => "Viernes",
    "Saturday" => "Sabado",
    "Sunday" => "Domingo"
);

$meses = array(
    "01" => "Enero",
    "02" => "Febrero",
    "03" => "Marzo",
    "04" => "Abril",
    "05" => "Mayo",
    "06" => "Junio",
    "07" => "Julio",
    "08" => "Agosto",
    "09" => "Septiembre",
    "10" => "Octubre",
    "11" => "Noviembre",
    "12" => "Diciembre"
);

//datos

inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7 Mostrar el funcionamiento de las fechas", $barra);
cuerpo($dias, $meses);
finCuerpo();
// *******************************************

//vista
function cabecera() {

}



//vista
function cuerpo(array $dias, array $meses) {
?>
    <h2>Fechas con Date</h2>
    <?php

    // creamos una fecha con formato Horas-minutos-segundos-mes-dia-año
    $fecha = mktime(12,45,0,3,29,2024);

    // creamos una fecha a partir de un string
    $fechaAnterior = strtotime("-12 days -4 hours");

    // Mostrar la fecha actual en el formato “d/m/Y”
    echo "Fecha actual en el formato “d/m/Y”: ".date("d/m/Y")."<br>";

    //Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”
    //echo "fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”".strftime("%A, %d de %B de %Y");
    echo "Fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”: dia ".date("d").", mes ".$meses[date("m")].", año ".date("Y").", dia de la semana ".$dias[date("l")]."<br>";

    //Mostrar la hora actual en el formato “hh:mm:ss”
    echo "Hora actual en el formato “hh:mm:ss”: ".date("H:i:s")."<br><br>";

    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
    echo "Tres apartados anteriores para la fecha 29/3/2024 a 12:45: <br>";
    echo "- Formato “d/m/Y”: ".date("d/m/Y", $fecha)."<br>";
    echo "- Formato “dia d, mes mmmm, año yyyy, dia de la semana dd”: dia ".date("d",$fecha).", mes ".$meses[date("m",$fecha)].", año ".date("Y",$fecha).", dia de la semana ".$dias[date("l",$fecha)]."<br>";
    echo "- Formato “hh:mm:ss”: ".date("H:i:s",$fecha)."<br><br>";
    
    //Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
    echo "Tres apartados anteriores para la fecha actual menos 12 días y 4 horas: <br>";
    echo "- Formato “d/m/Y”: ".date("d/m/Y", $fechaAnterior)."<br>";
    echo "- Formato “dia d, mes mmmm, año yyyy, dia de la semana dd”: dia ".date("d",$fechaAnterior).", mes ".$meses[date("m",$fechaAnterior)].", año ".date("Y",$fechaAnterior).", dia de la semana ".$dias[date("l",$fechaAnterior)]."<br>";
    echo "- Formato “hh:mm:ss”: ".date("H:i:s",$fechaAnterior)."<br>";

    ?>

    <h2>Fechas con DateTime</h2>
    <?php

    // datetime() sin parametros para la fecha actual
    $DateTimeActual = new DateTime();

    // datetime con fecha y hora para crear una fecha con hora especificas
    $DateTimeAnterior = new DateTime("29-03-2024 12:45");

    // datetime con un string para crear una fecha
    $DateTimeDiasMenos = new DateTime("-12 days -4 hours");

    // Mostrar la fecha actual en el formato “d/m/Y”
    echo "Fecha actual en el formato “d/m/Y”: ".$DateTimeActual ->format("d/m/Y")."<br>"; 

    //Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”
    //echo "fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”".strftime("%A, %d de %B de %Y");
    echo "Fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”: dia ".$DateTimeActual ->format("d").", mes ".$meses[$DateTimeActual ->format("m")].", año ".$DateTimeActual ->format("Y").", dia de la semana ".$dias[$DateTimeActual ->format("l")]."<br>";

    //Mostrar la hora actual en el formato “hh:mm:ss”
    echo "Hora actual en el formato “hh:mm:ss”: ".$DateTimeActual ->format("H:i:s")."<br><br>";

    // Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
    echo "Tres apartados anteriores para la fecha 29/3/2024 a 12:45: <br>";
    echo "- Formato “d/m/Y”: ".$DateTimeAnterior ->format("d/m/Y")."<br>"; 
    echo "- Formato “dia d, mes mmmm, año yyyy, dia de la semana dd”: dia ".$DateTimeAnterior ->format("d").", mes ".$meses[$DateTimeAnterior ->format("m")].", año ".$DateTimeAnterior ->format("Y").", dia de la semana ".$dias[$DateTimeAnterior ->format("l")]."<br>";
    echo "- Formato “hh:mm:ss”: ".$DateTimeAnterior ->format("H:i:s")."<br><br>"; 
    
    //Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
    echo "Tres apartados anteriores para la fecha actual menos 12 días y 4 horas: <br>";
    echo "- Formato “d/m/Y”: ".$DateTimeDiasMenos ->format("d/m/Y")."<br>"; 
    echo "- Formato “dia d, mes mmmm, año yyyy, dia de la semana dd”: dia ".$DateTimeDiasMenos ->format("d").", mes ".$meses[$DateTimeDiasMenos ->format("m")].", año ".$DateTimeDiasMenos ->format("Y").", dia de la semana ".$dias[$DateTimeDiasMenos ->format("l")]."<br>";
    echo "- Formato “hh:mm:ss”: ".$DateTimeDiasMenos ->format("H:i:s")."<br>"; 

    ?>

<?php
}