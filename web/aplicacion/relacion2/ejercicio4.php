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
        "TEXTO"=> "Ejercicio4",
        "ADICIONAL" => " >> "
    ],
];
//datos

inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4 Usar number format para obtener el formateo de los números", $barra );
cuerpo();
finCuerpo();
// *******************************************

//vista
function cabecera() {

}

//vista
function cuerpo() {

// variables con los numeros
$num1 = 17.5;
$num2 = 379987.24;

// formateamos los numeros con number_format (numero, decimales, separador decimales, separador miles)
$formateoNum1 = number_format($num1, 1, ",", "");
$formateoNum2 = number_format($num2, 2, ",",".");

?>
    <h2>Formateo de numeros</h2>
    <?php
        echo "el primer valor -";
        // sacamos 15 0 a la izquierda
        printf("%015s",$formateoNum1);
        echo "-<br><br>";

        // sacamos espacio a la izquierda al no indicar nada
        echo "el segundo valor -";
        printf("%15s",$formateoNum2);
        echo "-";
    ?>


<?php
}