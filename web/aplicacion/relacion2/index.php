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
        "ADICIONAL" => " >> "
    ],
];
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION RELACION 2", $barra);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    Ejercicios Relacion 2
    <br><br>
    <a href="./ejercicio1.php">Ejercicio 1</a>
    <br><br>
    <a href="./ejercicio2.php">Ejercicio 2</a>
    <br><br>
    <a href="./ejercicio3.php">Ejercicio 3</a>
    <br><br>
    <a href="./ejercicio4.php">Ejercicio 4</a>
    <br><br>
    <a href="./ejercicio5.php">Ejercicio 5</a>


<?php
}
