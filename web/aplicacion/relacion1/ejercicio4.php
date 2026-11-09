<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "Inicio",
        "ENLACE" => "/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO" => "Indice R1",
        "ENLACE" => "/aplicacion/relacion1/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO" => "Ejercicio4",
        "ADICIONAL" => " >> "
    ],
];

//datos

//declarar constante FILAS y los arrays
const FILAS = 5;
$arrayFor = [];
$arrayconst = [];

// bucle for para generar la piramide y guardarla en el arrayfor
for ($i = 1; $i <= 5; $i++) {

    $fila = [];

    //generar los numeros de cada fila y guardarlos en el arrayfor
    for ($j = 1; $j <= $i; $j++) {

        $fila[] = $i;
    }
    $arrayFor[] = $fila;
}

// bucle for para generar la piramide usando la constante FILAS y guardarlo en arrayconst
for ($i = 1; $i <= FILAS; $i++) {

    $fila = [];
    //generar los numeros de cada fila y guardarlos en el arrayconst
    for ($j = 1; $j <= $i; $j++) {

        $fila[] = $i;
    }
    $arrayconst[] = $fila;
}

inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4 Array con bucles for", $barra);
cuerpo($arrayFor, $arrayconst);
finCuerpo();
// *******************************************

//vista
function cabecera() {}



//vista
function cuerpo(array $arrayFor, array $arrayconst)
{
?>

    <h2>Generar array y mostrarlo con foreach</h2>
    <?php

    // foreach para mostrar la piramide guardada en arrayfor recorriendo la matriz
    foreach ($arrayFor as $elem) {
        if (is_array($elem)) {

            foreach ($elem as $n) {
                echo $n;
            }
        }
        echo "<br>";
    }

    ?>

    <h2>Generar array y mostrarlo con foreach con constante FILAS</h2>
    <?php

    // foreach para mostrar la piramide guardada en arrayconst recorriendo la matriz
    foreach ($arrayconst as $elem) {
        if (is_array($elem)) {

            foreach ($elem as $n) {
                echo $n;
            }
        }
        echo "<br>";
    }

    ?>

<?php
}
