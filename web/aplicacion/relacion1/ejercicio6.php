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
        "TEXTO"=> "Ejercicio6",
        "ADICIONAL" => " >> "
    ],
];

//controlador
$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

//datos

inicioCabecera("Ejercicio 6");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 6 uso de foreach con diferentes funciones", $barra);
cuerpo($vector);
finCuerpo();
// *******************************************

//vista
function cabecera() {

}



//vista
function cuerpo($vector) {

?>
    <h1>Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de recorrido </h1>
    
    <?php

        // simular foreach usando las funciones de recorrido key, current y next
        // mientras la clave no sea nula
        while(key($vector)!==null) {
            echo "Clave: ".key($vector)." con valor: ";

            // comprobamos si es boolean para mostrarlo como true o false en vez de 1 o 0
            if (is_bool(current($vector))) {
                echo (current($vector)?"true":"false")."<br>";
            }
            else {
                echo current($vector)."<br>";
            }
            
            //avanzamos al siguiente elemento del array
            next($vector);
        }
    ?>

    <h1>Simular el funcionamiento de foreach usando las funciones array_keys y array_values para mostrar tanto los índices como los valores del array anterior.</h1>
    
    <?php

        //volcamos el array en dos arrays nuevos, uno contiene las claves y el otro los valores
        $claves = array_keys($vector);
        $valores = array_values($vector);

        //recorremos el array de las claves y mostramos el valor correspondiente del array de valores
        for ($i = 0; $i < count($claves); $i++) {
            echo "Clave: ".$claves[$i]." con valor: ";

            if (is_bool($valores[$i])) {
                echo ($valores[$i]?"true":"false")."<br>";
            }
            else {
                echo $valores[$i]."<br>";
            }
        }
    ?>

<?php
}