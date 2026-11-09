<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//datos básicos
$nombre ="Sergio";
$edad = 26;

$basicos =[
    "nombre"=>$nombre,
    "edad"=>$edad
];
//relleno otras

$otras=rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX");
cuerpo($basicos, $otras);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {
    ?>
    <!--Esto es un comentario HTML-->
    <?php
    //Esto va en el head y es un comentario de PHP
}

//vista
function cuerpo($bas, $ot)
{
?>
    <br><br>
    <a href="/aplicacion/pruebas/index.php">Pruebecilla</a>

<?php
    echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]} años".PHP_EOL;
    echo "Con otros datos {$ot}";
}

function rellenarOtras(){
    return "de 2DAW";
}