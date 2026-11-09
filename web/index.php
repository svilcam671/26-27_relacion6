<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ENLACE"=> "/index.php",
        "ADICIONAL" => ">>"
        ],
        /*[
        "TEXTO"=> "otro",
    ],
    [
        "TEXTO"=> "index",
        "ADICIONAL" => "&copy;&copy;"
    ]*/
];

//$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Mi Aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX", $barra );
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{

    ?>
    <!-- Esto va en el head -->
    <?php

}

//vista
function cuerpo()
{
?>
    <br><br>
    Hola, estás en Index.php
    Pruebas Basicas 
    <a href="../aplicacion/pruebas/index.php">Pruebas basicas</a>
<?php
}
