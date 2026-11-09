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
        "TEXTO" => "Ejercicio3",
        "ADICIONAL" => " >> "
    ],
];
//datos
//- Hacer lo anterior creando y rellenando el array usando varias sentencias. 
// a) Crear una variable de tipo array.
$array = [];

// b) Rellenar las posiciones 1, 16, 54 con valores cualquiera
$array[1] = mt_rand(1, 100);
$array[16] = mt_rand(1, 100);
$array[54] = mt_rand(1, 100);

// c) Añadir el valor 34 al final
array_push($array, 34);

//d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
$array["uno"] = "cadena";
$array["dos"] = true;
$array["tres"] = 1.345;

//e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
$array["ultima"] = array(1, 34, "nueva");

//- Hacer lo anterior usando una sola sentencia con array;
$array2 = array(
    1 => mt_rand(1, 100),
    16 => mt_rand(1, 100),
    54 => mt_rand(1, 100),
    55 => 34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => array(1, 34, "nueva")
);

//- Hacer lo anterior usando una sola sentencia con []
$array3 = [
    1 => mt_rand(1, 100),
    16 => mt_rand(1, 100),
    54 => mt_rand(1, 100),
    55 => 34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => [1, 34, "nueva"]
];

inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3 Array", $barra);
cuerpo($array, $array2, $array3);
finCuerpo();
// *******************************************

//vista
function cabecera() {}



//vista
function cuerpo(array $array, array $array2, array $array3)
{
?>


    <h2>Primer array con diferentes sentencias</h2>

    <?php

    //bucles foreach para visualizar los arrays
    foreach ($array as $elem => $valor) {
        if (is_array($valor)) {
            echo "Clave: ".$elem." | Valor: ";
            foreach ($valor as $a) {
                echo $a." - ";
            }
            echo "<br>";
        } else if (is_bool($valor)) {
            echo "Clave: ".$elem." | Valor: ".($valor?"true":"false")."<br>";
        } else {
            echo "Clave: ".$elem." | Valor: ".$valor."<br>";
        }
    }

    ?>

    <h2>Segundo array con una sola sentencia</h2>
    <?php

    foreach ($array2 as $elem => $valor) {
        if (is_array($valor)) {
            echo "Clave: ".$elem." | Valor: ";
            foreach ($valor as $a) {
                echo $a." - ";
            }
            echo "<br>";
        } else if (is_bool($valor)) {
            echo "Clave: ".$elem." | Valor: ".($valor?"true":"false")."<br>";
        } else {
            echo "Clave: ".$elem." | Valor: ".$valor."<br>";
        }
    }

    ?>

    <h2>Tercer array con una sola sentencia con []</h2>
    <?php

    foreach ($array3 as $elem => $valor) {
        if (is_array($valor)) {
            echo "Clave: ".$elem." | Valor: ";
            foreach ($valor as $a) {
                echo $a." - ";
            }
            echo "<br>";
        } else if (is_bool($valor)) {
            echo "Clave: ".$elem." | Valor: ".($valor?"true":"false")."<br>";
        } else {
            echo "Clave: ".$elem." | Valor: ".$valor."<br>";
        }
    }

    ?>

<?php
}
