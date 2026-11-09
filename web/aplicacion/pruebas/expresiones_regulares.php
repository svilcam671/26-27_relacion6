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
        "ENLACE"=> "/aplicacion/pruebas/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO"=> "Expresiones regulares",
        "ADICIONAL" => " >> "
    ],
];
//$usuario = getenv("MYSQL_USER");

//datos básicos
$cadena = "tienes 25 años";

// buscar años
$exp='/años/';
$resultado=[];

preg_match($exp,$cadena,$resultado,PREG_OFFSET_CAPTURE);

// buscar numero
$exp='/[0123456789]+/';
$exp='/[0-9]+';
$exp='/\d+/';

preg_match($exp,$cadena,$resultado,PREG_OFFSET_CAPTURE);




//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX", $barra);
cuerpo();  //llamo a la vista
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
function cuerpo()
{
?>
  

<?php
}
