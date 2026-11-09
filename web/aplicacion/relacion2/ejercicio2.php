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
        "TEXTO"=> "Ejercicio2",
        "ADICIONAL" => " >> "
    ],
];
//datos

inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2  cadena 'Está la niña en casa'", $barra );
cuerpo();
finCuerpo();
// *******************************************

//vista
function cabecera() {

}

//vista
function cuerpo() {

$cadena = "Está la niña en casa";
$cadBytes = strlen($cadena);
$cadMB = mb_strlen($cadena);

?>
    <!-- Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me indica la posición del carácter mostrado-->
    <h2>Mostrar cada carácter en una línea separada</h2>
    
    <?php 
        
        // prueba [] que no funciona
        /*for ($i = 0; $i < $cadBytes; $i++) {
            echo str_repeat("&nbsp;",$i).$cadena[$i]."<br>";
        }*/

        // prueba substr que no funciona
        /*for ($i = 0; $i < $cadBytes; $i++) {
            echo str_repeat("&nbsp;",$i).substr($cadena, $i, 1)."<br>";
        }*/
        
        for ($i = 0; $i < $cadMB; $i++) {
            echo str_repeat("&nbsp;",$i).mb_substr($cadena, $i, 1)."<br>";
        }
    ?>
    

    <h2>Mostrar la cadena en orden inverso</h2>
    <?php

        // hay que empezar el bucle en 1 para el indice negativo
        for ($i = 1; $i <= $cadMB; $i++) {
            
            // indice negativo como pide el enunciado para leer la cadena al reves
            $caracter = mb_substr($cadena, -$i, 1);

            // averiguamos si es par o impar
            if (($i - 1) % 2 == 0) {
                $c = mb_strtoupper($caracter);
            }
            else {
                $c = mb_strtolower($caracter);
            }

            // pintamos los espacios y el caracter
            echo str_repeat("&nbsp;",$i-1).$c."<br>";

        }
    ?>
 

    <h2>Separa la cadena en partes usando el carácter a</h2>
    <?php
        for ($i = 0; $i < $cadMB; $i++) {
            //recorro la cadena y si encuentro una A le concateno un salto de linea
            echo mb_substr($cadena, $i, 1).(mb_substr($cadena, $i, 1) == "a"?"<br>":"");
        }

    ?>


    <h2>Cambia el siguiente carácter a niña por "/mujer "</h2>
    <?php

        // con replace
        echo str_replace("niña ", "niña/mujer ", $cadena);

        echo "<br>";

        // buscando con un bucle la palabra niña y remplazandola
        for ($i = 0; $i < $cadMB; $i++) {
            // si encuentro la palabra niña la cambio por niña/mujer y avanzo el bucle 4 posiciones
            if (mb_substr($cadena, $i, 4) == "niña") {
                echo "niña/mujer ";
                $i+=4;
            }
            // si no voy sacando caracter a caracter la cadena
            else {
                echo mb_substr($cadena, $i, 1);
            }
        }
    ?>
<?php
}