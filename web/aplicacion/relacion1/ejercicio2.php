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
        "TEXTO"=> "Ejercicio2",
        "ADICIONAL" => " >> "
    ],
];
//datos

//constante
const N = 1000;

//Arrays para datos tiradas
$resultadoWhile = [0,0,0,0,0,0];
$resultadoFor = [];
$cont = 0;

//Bucle for para generar las tiradas 
for ($i = 0; $i < 6; $i++) {
    $resultadoFor[$i] = mt_rand(1,6);
}

//Bucle while para las tiradas y contar el numero
while ($cont < N) {
    
    $valor =  mt_rand(1,6);

    switch($valor) {

        case 1: $resultadoWhile[0]+=1; break;
        case 2: $resultadoWhile[1]+=1; break;
        case 3: $resultadoWhile[2]+=1; break;
        case 4: $resultadoWhile[3]+=1; break;
        case 5: $resultadoWhile[4]+=1; break;
        case 6: $resultadoWhile[5]+=1; break;
    }

    $cont++;
}



inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2 Simular un dado", $barra);
cuerpo($resultadoFor, $resultadoWhile);
finCuerpo();
// *******************************************

//vista
function cabecera() {

}



//vista
function cuerpo(array $resultadoFor, array $resultadoWhile) {
?>

    

    <h2>LANZAMIENTO DE UN DADO</h2>
    <?php

        //mostrar las tiradas del bucle for
        for ($i = 0; $i < count($resultadoFor) ; $i++) {
            echo "Lanzamiento ".($i+1)." del dado: $resultadoFor[$i]"."<br>";
        }


        //mostrar los datos de las tiradas del bucle while
        echo "<br><br>";
        echo "el 1 ha salido $resultadoWhile[0] con un porcentaje de ".($resultadoWhile[0]*100)/N."%";
        echo "<br>el 2 ha salido $resultadoWhile[1] con un porcentaje de ".($resultadoWhile[1]*100)/N."%";
        echo "<br>el 3 ha salido $resultadoWhile[2] con un porcentaje de ".($resultadoWhile[2]*100)/N."%";
        echo "<br>el 4 ha salido $resultadoWhile[3] con un porcentaje de ".($resultadoWhile[3]*100)/N."%";
        echo "<br>el 5 ha salido $resultadoWhile[4] con un porcentaje de ".($resultadoWhile[4]*100)/N."%";
        echo "<br>el 6 ha salido $resultadoWhile[5] con un porcentaje de ".($resultadoWhile[5]*100)/N."%";
            
        
    ?>

<?php
}