<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ADICIONAL" => " >> "
        ],
];

//dibuja la plantilla de la vista
inicioCabecera("Tienda");
cabecera();
finCabecera();
inicioCuerpo("Tienda", $barra);
cuerpo($muebles); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $muebles) {
?>

    <h1>Modificar muebles</h1>
    <form action="" method="">


    </form>

<?php
}