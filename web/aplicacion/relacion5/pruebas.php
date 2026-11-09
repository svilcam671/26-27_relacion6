<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_normal.php");
include_once(dirname(__FILE__) . "/val_filter.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ENLACE"=> "/index.php",
        "ADICIONAL" => " >> "
        ],
        [
        "TEXTO"=> "Indice R5",
        "ENLACE" => "/aplicacion/relacion5/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO"=> "Pruebas Relacion 5",
        "ADICIONAL" => " >> "
    ],
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION RELACION 5", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
   <h2>Pruebas Validación Normal</h2>
    <?php

        try {

            $numero = 5;
            echo "El número $numero esta dentro del rango 1 a 10?: ";
            echo \VALNORMAL\validaEntero($numero, 1, 10, 8)?"True":"False";
            echo "<br>Valor de numero: $numero";
            $numero = 11;
            echo "<br>El número $numero esta dentro del rango 1 a 5?: ";
            echo \VALNORMAL\validaEntero($numero, 1, 5, 4)?"True":"False";
            echo "<br>Valor de numero: $numero";
            // extremo minimo debe ser valido y no cambiar
            $numero = 1;
            echo "<br>El número $numero esta dentro del rango 1 a 10?: ";
            echo \VALNORMAL\validaEntero($numero, 1, 10, 8)?"True":"False";
            echo "<br>Valor de numero: $numero";

            $numero = 5.5;
            echo "<br>El número $numero esta dentro del rango 1.5 a 10.5?: ";
            echo \VALNORMAL\validaReal($numero, 1.5, 10.5, 8.5)?"True":"False";
            echo "<br>Valor de numero: $numero";
            $numero = 11.2;
            echo "<br>El número $numero esta dentro del rango 1.5 a 5.5?: ";
            echo \VALNORMAL\validaReal($numero, 1.5, 5.5, 4.5)?"True":"False";
            echo "<br>Valor de numero: $numero";
            // extremo minimo debe ser valido y no cambiar
            $numero = 1.5;
            echo "<br>El número $numero esta dentro del rango 1.5 a 10.5?: ";
            echo \VALNORMAL\validaReal($numero, 1.5, 10.5, 8.5)?"True":"False";
            echo "<br>Valor de numero: $numero";

            echo "<br><hr>";
            $fecha1 = "13/05/2000";
            $fecha2 = "30/02/2026";
            $fecha3 = "60/22/02";
            $fecha4 = "7/4/2001";

            echo "La fecha $fecha1 es valida?: ";
            echo \VALNORMAL\validaFecha($fecha1, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha1";

            echo "<br>La fecha $fecha2 es valida?: ";
            echo \VALNORMAL\validaFecha($fecha2, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha2";

            echo "<br>La fecha $fecha3 es valida?: ";
            echo \VALNORMAL\validaFecha($fecha3, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha3";

            echo "<br>La fecha $fecha4 es valida?: ";
            echo \VALNORMAL\validaFecha($fecha4, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha4";

            echo "<br><hr>";
            $hora1 = "11:22:33";
            $hora2 = "41:23:1";
            $hora3 = "3:5:2";
            $hora4 = "11:22:339";

            echo "La hora $hora1 es valida?: ";
            echo \VALNORMAL\validaHora($hora1, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora1";

            echo "<br>La hora $hora2 es valida?: ";
            echo \VALNORMAL\validaHora($hora2, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora2";

            echo "<br>La hora $hora3 es valida?: ";
            echo \VALNORMAL\validaHora($hora3, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora3";

            echo "<br>La hora $hora4 es valida?: ";
            echo \VALNORMAL\validaHora($hora4, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora4";

            echo "<br><hr>";
            $mail1 = "sergio@gmail.com";
            $mail2 = "999@aa.com";

            echo "<br>El email $mail1 es correcto?: ";
            echo \VALNORMAL\validaEmail($mail1, "prueba@prueba.es")?"True":"False";
            echo "<br>El email $mail2 es correcto?: ";
            echo \VALNORMAL\validaEmail($mail2, "prueba@prueba.es")?"True":"False";
            echo "<br>Valor de mail2: $mail2";

            echo "<br><hr>";
            $cadena1 = "abcdefghij";
            $cadena2 = "abcdefghijklm";

            echo "<br>La cadena $cadena1 es de una longitud menor o igual a 10?: ";
            echo \VALNORMAL\validaCadena($cadena1,10,"aaaaaaaaaa")?"True":"False";
            echo "<br>La cadena $cadena2 es de una longitud menor o igual a 10?: ";
            echo \VALNORMAL\validaCadena($cadena2,10,"aaaaaaaaaa")?"True":"False";
            echo "<br>Cadena2 con valor por defecto: $cadena2";

            echo "<br><hr>";
            $exp = "/^[A-Z][a-z]+$/";
            $cadexp1 = "Adios";
            $cadexp2 = "hola";

            echo "<br>La cadena $cadexp1 cumple la expresion '$exp' ?: ";
            echo \VALNORMAL\validaExpresion($cadexp1, $exp, "Buenas")?"True":"False";
            echo "<br>La cadena $cadexp2 cumple la expresion '$exp' ?: ";
            echo \VALNORMAL\validaExpresion($cadexp2, $exp, "Buenas")?"True":"False";
            echo "<br>Cadexp2 con valor por defecto: $cadexp2";

            echo "<br><hr>";
            $array = array(
                "uno" => 1,
                "dos"=> 2,
                "tres"=> 3,
            );

            echo "<br>El valor 1 es un valor del array?: ";
            echo \VALNORMAL\validaRango(1, $array, 1)?"True":"False";
            echo "<br>El valor 'a' es un valor del array?: ";
            echo \VALNORMAL\validaRango("a", $array, 1)?"True":"False";
            echo "<br>El valor 'dos' es una clave del array?: ";
            echo \VALNORMAL\validaRango("dos", $array, 2)?"True":"False";
            echo "<br>El valor 'b' es una clave del array?: ";
            echo \VALNORMAL\validaRango("b", $array, 2)?"True":"False";


         
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }

    ?>

    <h2>Pruebas Validación Filter</h2>
    <?php

        try {

            $numero = 5;
            echo "El número $numero esta dentro del rango 1 a 10?: ";
            echo \VALFILTER\validaEntero($numero, 1, 10, 8)?"True":"False";
            echo "<br>Valor de numero: $numero";
            $numero = 11;
            echo "<br>El número $numero esta dentro del rango 1 a 5?: ";
            echo \VALFILTER\validaEntero($numero, 1, 5, 4)?"True":"False";
            echo "<br>Valor de numero: $numero";
            // extremo minimo debe ser valido y no cambiar
            $numero = 1;
            echo "<br>El número $numero esta dentro del rango 1 a 10?: ";
            echo \VALFILTER\validaEntero($numero, 1, 10, 8)?"True":"False";
            echo "<br>Valor de numero: $numero";

            $numero = 5.5;
            echo "<br>El número $numero esta dentro del rango 1.5 a 10.5?: ";
            echo \VALFILTER\validaReal($numero, 1.5, 10.5, 8.5)?"True":"False";
            echo "<br>Valor de numero: $numero";
            $numero = 11.2;
            echo "<br>El número $numero esta dentro del rango 1.5 a 5.5?: ";
            echo \VALFILTER\validaReal($numero, 1.5, 5.5, 4.5)?"True":"False";
            echo "<br>Valor de numero: $numero";
            // extremo minimo debe ser valido y no cambiar
            $numero = 1.5;
            echo "<br>El número $numero esta dentro del rango 1.5 a 10.5?: ";
            echo \VALFILTER\validaReal($numero, 1.5, 10.5, 8.5)?"True":"False";
            echo "<br>Valor de numero: $numero";

            echo "<br><hr>";
            $fecha1 = "13/05/2000";
            $fecha2 = "30/02/2026";
            $fecha3 = "60/22/02";
            $fecha4 = "7/4/2001";

            echo "La fecha $fecha1 es valida?: ";
            echo \VALFILTER\validaFecha($fecha1, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha1";

            echo "<br>La fecha $fecha2 es valida?: ";
            echo \VALFILTER\validaFecha($fecha2, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha2";

            echo "<br>La fecha $fecha3 es valida?: ";
            echo \VALFILTER\validaFecha($fecha3, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha3";

            echo "<br>La fecha $fecha4 es valida?: ";
            echo \VALFILTER\validaFecha($fecha4, "01/01/2000")?"True":"False";
            echo "<br>Fecha saneada: $fecha4";

            echo "<br><hr>";
            $hora1 = "11:22:33";
            $hora2 = "41:23:1";
            $hora3 = "3:5:2";
            $hora4 = "11:22:339";

            echo "La hora $hora1 es valida?: ";
            echo \VALFILTER\validaHora($hora1, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora1";

            echo "<br>La hora $hora2 es valida?: ";
            echo \VALFILTER\validaHora($hora2, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora2";

            echo "<br>La hora $hora3 es valida?: ";
            echo \VALFILTER\validaHora($hora3, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora3";

            echo "<br>La hora $hora4 es valida?: ";
            echo \VALFILTER\validaHora($hora4, "00:00:00")?"True":"False";
            echo "<br>Hora saneada: $hora4";

            echo "<br><hr>";
            $mail1 = "sergio@gmail.com";
            $mail2 = "999@a.a..com";

            echo "<br>El email $mail1 es correcto?: ";
            echo \VALFILTER\validaEmail($mail1, "prueba@prueba.es")?"True":"False";
            echo "<br>El email $mail2 es correcto?: ";
            echo \VALFILTER\validaEmail($mail2, "prueba@prueba.es")?"True":"False";
            echo "<br>Valor de mail2: $mail2";

            echo "<br><hr>";
            $cadena1 = "abcdefghij";
            $cadena2 = "abcdefghijklm";

            echo "<br>La cadena $cadena1 es de una longitud menor o igual a 10?: ";
            echo \VALFILTER\validaCadena($cadena1,10,"aaaaaaaaaa")?"True":"False";
            echo "<br>La cadena $cadena2 es de una longitud menor o igual a 10?: ";
            echo \VALFILTER\validaCadena($cadena2,10,"aaaaaaaaaa")?"True":"False";
            echo "<br>Cadena2 con valor por defecto: $cadena2";

            echo "<br><hr>";
            $exp = "/^[A-Z][a-z]+$/";
            $cadexp1 = "Adios";
            $cadexp2 = "hola";

            echo "<br>La cadena $cadexp1 cumple la expresion '$exp' ?: ";
            echo \VALFILTER\validaExpresion($cadexp1, $exp, "Buenas")?"True":"False";
            echo "<br>La cadena $cadexp2 cumple la expresion '$exp' ?: ";
            echo \VALFILTER\validaExpresion($cadexp2, $exp, "Buenas")?"True":"False";
            echo "<br>Cadexp2 con valor por defecto: $cadexp2";

            echo "<br><hr>";
            $array = array(
                "uno" => 1,
                "dos"=> 2,
                "tres"=> 3,
            );

            echo "<br>El valor 1 es un valor del array?: ";
            echo \VALFILTER\validaRango(1, $array, 1)?"True":"False";
            echo "<br>El valor 'a' es un valor del array?: ";
            echo \VALFILTER\validaRango("a", $array, 1)?"True":"False";
            echo "<br>El valor 'dos' es una clave del array?: ";
            echo \VALFILTER\validaRango("dos", $array, 2)?"True":"False";
            echo "<br>El valor 'b' es una clave del array?: ";
            echo \VALFILTER\validaRango("b", $array, 2)?"True":"False";


         
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }

    ?>

<?php
}
