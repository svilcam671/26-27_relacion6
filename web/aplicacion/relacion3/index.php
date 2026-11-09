<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/libreria.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ENLACE"=> "/index.php",
        "ADICIONAL" => " >> "
        ],
        [
        "TEXTO"=> "Indice R3",
        "ADICIONAL" => " >> "
    ],
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION RELACION 3", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
// ejercicio 1
$array = array();
$numero = 0;
?>
   <h2>Prueba Ejercicio 1</h2>

    <?php

        // llamo a la funcion dentro de un if y si me devuelve true muestro que todo ha ido bien y los elementos del array
        if (cuentaVeces($array, "1pos", 1, $numero)) {
            echo "TRUE -> todo ha ido bien<br>";
            print_r($array);
            echo "<br>";
        }
        else {
            echo "FALSE -> se ha detectado un error<br>";
        }

        // muestro el numero de llamadas
        echo "Llamada numero: $numero <br>";

        // llamo a la funcion dentro de un if y si me devuelve true muestro que todo ha ido bien y los elementos del array
        if (cuentaVeces($array, "2daw", 2, $numero)) {
            echo "TRUE -> todo ha ido bien<br>";
            print_r($array);
            echo "<br>";
        }
        else {
            echo "FALSE -> se ha detectado un error<br>";
        }

        // muestro el numero de llamadas
        echo "Llamada numero: $numero <br>";

        // llamo a la funcion dentro de un if y si me devuelve true muestro que todo ha ido bien y los elementos del array
        if (cuentaVeces($array, "otra", 3, $numero)) {
            echo "TRUE -> todo ha ido bien<br>";
            print_r($array);
            echo "<br>";
        }
        else {
            echo "FALSE -> se ha detectado un error<br>";
        }
        
        // muestro el numero de llamadas
        echo "Llamada numero: $numero <br>";

    ?>

    <h2>Prueba Ejercicio 2</h2>
    <?php

    // llamo a la funcion y guardo lo que me devuelve en la variable
    $cadenaBien = generarCadena();
        if ($cadenaBien) {
            echo "La cadena se ha generado correctamente: $cadenaBien";
        }
        else {
            echo "FALSE -> Ha habido algun problema";
        }

    echo "<br>";

    // llamo a la funcion con un numero de caracteres no valido
    $cadenaMal = generarCadena(0);
        if ($cadenaMal) {
            echo "La cadena se ha generado correctamente: $cadenaMal";
        }
        else {
            echo "FALSE -> Ha habido algun problema";
        }

    ?>

    <h2>Prueba Ejercicio 3</h2>
    <?php
    
    // prueba con operando 1 para sumar
    echo "Prueba Suma (Operando 1) para los numeros 3,4,5,6,7 = ".operaciones(1,3,4,5,6,7);
    // prueba con operando 2 para restar
    echo "<br>Prueba Resta (Operando 2) para los numeros 100,5,6,7,34 = ".operaciones(2,100,5,6,7,34);
    // prueba con operando 3 para multiplicar
    echo "<br>Prueba Multiplicacion (Operando 3) para los numeros 4,2,3,5,2 = ".operaciones(3,4,2,3,5,2);
    // prueba con operando diferente para que haga la resta de pares e impares
    echo "<br>Prueba resta de la suma de los pares con los impares (Operando diferente) para los numeros 3,4,5,6,7,8 = ".operaciones(5,3,4,5,6,7,8);
    
    ?>

    <h2>Prueba Ejercicio 4</h2>
    <?php
    
    $valor = 5;
    // prueba indicando los 3 parametros
    echo "Los tres parametros: ".devuelve($valor,6,7)." y valor del primer parametro: $valor";
    // prueba indicando solo el primer parametro
    echo "<br>Primer parametro unicamente: ".devuelve($valor)." y valor del primer parametro: $valor";
    // prueba indicando el primer y segundo parametro
    echo "<br>Primer y segundo parametro: ".devuelve($valor,8)." y valor del primer parametro: $valor";
    // prueba indicando el primer y ultimo parametro
    echo "<br>Primer y ultimo parametro: ".devuelve($valor, num3: 8)." y valor del primer parametro: $valor";
    ?>

    <h2>Prueba Ejercicio 5</h2>
    <?php
    
    // prueba de que devuelve el valor false
    $res = hacerOperacion("dividir",7,6);

    if ($res === false) {
        echo "Error: False";
    }
    // pruebas de hacer las operaciones con la funcion que se pasa como nombre por parametro
    echo "<br>Suma: ".hacerOperacion("suma",7,6);
    echo "<br>Resta: ".hacerOperacion("resta",7,6);
    echo "<br>Multiplicacion: ".hacerOperacion("multiplicacion",7,6);

    ?>

    <h2>Prueba Ejercicio 6</h2>
    <?php
    
    // funciones arrow
    $sumFlecha=fn($n1, $n2) => $n1 + $n2;
    $resFlecha=fn($n1, $n2) => $n1 - $n2;
    $mulFlecha=fn($n1, $n2) => $n1 * $n2;

    // pruebas pasando las funciones arrow como parametro
    echo "<br>Suma flecha: ".llamadaAFuncion(6,7,$sumFlecha);
    echo "<br>Resta flecha: ".llamadaAFuncion(6,7,$resFlecha);
    echo "<br>Multiplicacion flecha: ".llamadaAFuncion(6,7,$mulFlecha);

    // funciones anonimas
    $sumAnon=function(int $n1, int $n2) {return $n1+$n2;};
    $resAnon=function(int $n1, int $n2) {return $n1-$n2;};
    $mulAnon=function(int $n1, int $n2) {return $n1*$n2;};

    // prueba pasando las funciones anonimas como parametro
    echo "<br>Suma anonima: ".llamadaAFuncion(8,4,$sumAnon);
    echo "<br>Resta anonima: ".llamadaAFuncion(8,4,$resAnon);
    echo "<br>Multiplicacion anonima: ".llamadaAFuncion(8,4,$mulAnon);

    ?>

    <h2>Prueba Ejercicio 7</h2>
    <?php
    
    // declaro el array de strings
    $vector=array("uno","grande","caminos","a");

    // muestro el array con su orden original
    echo "Array antes de ordenar: <br>";
    foreach ($vector as $element) {

        echo "$element - ";
    }

    // ordeno el array y compruebo si se ha podido realizar bien o no
    if (ordenar($vector)) {
        echo "<br>Se ha ordenado correctamente.";
    }
    else {
        echo "<br>No se ha podido ordenar el array";
    }
    
    // muestro el array despues de ordenar
    echo "<br>Array despues de ordenar: <br>";
    foreach ($vector as $element) {

        echo "$element - ";
    }


    ?>

<?php
}
