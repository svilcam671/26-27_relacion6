<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ENLACE"=> "/index.php",
        "ADICIONAL" => " >> "
        ],
        [
        "TEXTO"=> "Indice R2",
        "ENLACE" => "/aplicacion/relacion2/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO"=> "Ejercicio3",
        "ADICIONAL" => " >> "
    ],
];
//datos

inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3  Genera una cadena aleatoria de 20 caracteres", $barra );
cuerpo();
finCuerpo();
// *******************************************

//vista
function cabecera() {

}

//vista
function cuerpo() {

?>
    <h2>A partir de un array en el que están todos los caracteres posibles</h2>    
    
    <?php

        // Con range creo un array de un rango que le indico, osea que creo 3 arrays con el rango de mayusculas, minusculas y numeros.
        // Con array_merge combino los elementos de diferentes arrays en uno solo
        $array = array_merge(range('A','Z'),range('a','z'),range("0","9"));
        $cadenaA = "";

        // bucle para ir generando aleatoriamente un numero y sacar el elemento del array correspondiente a ese indice añadiendolo a la cadena vacia que he declarado previamente
        for ($i = 0; $i < 20; $i++) {
            $cadenaA .= $array[mt_rand(0,count($array)-1)];
        }

        echo $cadenaA;
        
    ?>

    <h2>A partir del código ASCII</h2>

    <?php

        $cadenaB = "";

        // mientras mi cadena mida menos de 20 bytes hago un bucle while
        while (mb_strlen($cadenaB) < 20) {

            // genero un numero entre el 48 y 122 que es el rango en ascii donde estan los numeros, mayusculas y minusculas
            $num = mt_rand(48, 122);

            // filtro para quedarme solo con el rango de lo que me interesa
            if (($num <= 57) || ($num >= 65 && $num <= 90) || ($num >= 97)) {

                $cadenaB .= chr($num);

            }

        }

        echo $cadenaB;

    ?>

<?php
}