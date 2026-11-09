<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/mis_funciones.php");

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
        "TEXTO"=> "Indice funciones",
        "ADICIONAL" => " >> "
    ],
];

$numero = doble(25);
// comprobacion 
if ($numero === false) {
    // hay un error lo resuelvo
    $numero = 25;
}

if ($numero = doble($numero)) {
    //exit;
}

$numero = variosParametros(25,"2aaaa769",56);
$numero = variosParametros(25,"2");
$numero = variosParametros(25, par3:100);

$func = function(float $a, float $b, float ...$resto):float {

    $res = $a - $b;
    foreach($resto as $num) {
        $res += $num;
    }
    return $res;
};




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION PRUEBA FUNCIONES", $barra);
cuerpo($numero); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(int $n)
{

    echo "El doble del numero es $n".PHP_EOL;
    echo "el numero $n es el doble de otro".PHP_EOL;


}
