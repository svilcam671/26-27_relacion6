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
        "TEXTO"=> "Ejercicio5",
        "ADICIONAL" => " >> "
    ],
];

//controlador
$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;

//datos

inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5 Array con diferentes datos", $barra);
cuerpo($vector);
finCuerpo();
// *******************************************

//vista
function cabecera() {

}



//vista
function cuerpo(array $vector) {

    //bucle foreach para recorrer el array
    foreach ($vector as $pos => $valor) {
        
        //obtener el tipo del valor de cada elemento del array
        $tipo = gettype($valor);

        echo "posicion ".$pos." contenido ($tipo) ";
        
        //comprobar si es un array para recorrerlo y mostrar sus valores
        if (is_array($tipo)) {
            echo "<br>";
            foreach ($valor as $elem) {
                echo "- ".$elem."<br>";
            }
        }

        //comprobar si es un entero para mostrarlo y mostrar el valor en binario
        else if (is_integer($tipo)) {
            echo "Entero con valor ".$valor. ", en binario ".decbin($valor)."<br>";

        }

        //comprobar si es un real para mostrarlo y ver su valor al cuadrado
        else if (is_float($tipo)) {
            echo $valor." que al cuadrado es ".pow($valor,2)."<br>";
        }

        //comprobar si es un string y mostrarla entre guiones
        else if (is_string($tipo)) {
            echo "-".$valor."-<br>";
        }

        //comprobar si es un boolean y mostrarlo (en texto) junto a su opuesto
        else if (is_bool($tipo)) {
            $val = $valor?"true":"false";
            $opuesto = !$valor?"true":"false";
            echo $val." y su opuesto ".$opuesto."<br>";
        }

    }


?>

    

<?php
}