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
inicioCabecera("Tienda Sergio");
cabecera();
finCabecera();
inicioCuerpo("Tienda", $barra );
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
    <?php 
    
    ?>
    
<?php
}
