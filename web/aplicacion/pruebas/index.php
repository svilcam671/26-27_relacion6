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
        "TEXTO"=> "pruebas",
        "ADICIONAL" => " >> "
    ],
];
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barra);
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
    Elemento de pruebas
    <br><br>
    <a href="basicas.php">Funcionamiento basico</a>
    <br><br>
    <a href="pasopar.php">Comunicacion controlador vista</a>
    <br><br>
    <a href="expresiones_regulares.php">Expresiones regulares</a>
    <br><br>
    <a href="index_funciones.php">Index funciones</a>
    <br><br>
    <a href="clases.php">Index clases</a>
<?php
}
