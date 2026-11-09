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
        "TEXTO"=> "Indice R1",
        "ENLACE" => "/aplicacion/relacion1/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO"=> "Ejercicio1",
        "ADICIONAL" => " >> "
    ],
];
//datos

inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1 Mostrar funciones matemáticas", $barra );
cuerpo();
finCuerpo();
// *******************************************

//vista
function cabecera() {

}

//vista
function cuerpo() {
?>

    <h2>Conversion de variables en distinta base</h2>
    <?php

        //variable valor binario prefijo 0b
        $binario = 0b10001;

        //variable valor octal prefijo 0
        $octal = 0261;

        //variable valor hexadecimal prefijo 0x
        $hexa = 0xFF;

        //convertir valor de decimal a binario
        echo "La variable en binario ".decbin($binario)." tiene como valor en decimal $binario <br>";
        //convertir valor de decimal a octal
        echo "La variable en octal ".decoct($octal)." tiene como valor en decimal $octal <br>";
        //convertir valor de decimal a hexadecimal
        echo "La variable en hexadecimal ".dechex($hexa)." tiene como valor en decimal $hexa <br>";
    ?>

    <h2>Funciones matemáticas básicas</h2>
    <?php
        //round(num, decimales) redondea un numero a los decimales indicados
        echo "round(4.34678, 2) = ".round(4.34678, 2)."<br>";

        //floor(num) redondea el numero hacia abajo
        echo "floor(8.8) = ".floor(8.8)."<br>";

        //pow(base, exponente) calcular potencia de un numero
        echo "pow(2,5) = ".pow(2,5)."<br>";

        //sqrt(num) calcular raiz cuadrada de un numero
        echo "sqrt(400) = ".sqrt(400)."<br>";

        //base_convert("num", base original, base a convertir) convertir un numero de una base a otra
        echo "Convertir de base 4 a base 8 el numero 2310: base_convert(2310,4,8) = ".base_convert("2310",4,8)."<br>";

        //ceil(num) redondea el numero hacia arriba
        echo "ceil(23.4) = ".ceil(23.4)."<br>";

        //abs(num) absoluto de un numero
        echo "abs(-23) = ".abs(-23)."<br>";

        //max(num1, num2, num3) devuelve el numero mayor
        echo "max(3,6,9) = ".max(3,6,9)."<br>";

        //fmod(dividendo, divisor) devuelve el resto de una division
        echo "fmod(23,5) = ".fmod(23,5)."<br>";
    ?>
<?php
}