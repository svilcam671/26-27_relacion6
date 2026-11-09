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
        "TEXTO"=> "Ejercicio5",
        "ADICIONAL" => " >> "
    ],
];
//datos

inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5 Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc)", $barra );
cuerpo();
finCuerpo();
// *******************************************

//vista
function cabecera() {

}

//vista
function cuerpo() {

// Cadena de texto heredoc
$cadena = <<<TEXTO
En un lugar de la Mancha,
<strong>de cuyo nombre no quiero acordarme</strong>,
no ha mucho <italic>tiempo que vivía un hidalgo</italic> de los de lanza en astillero,
adarga antigua, rocín flaco y galgo corredor.
Naci el 13 del 05 del 2000
Tengo 26 años
<a>svilcam671@g.educaand.es</a>
prueba@prueba.com
TEXTO;

// variables con el patron para la busqueda
$email = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}/";
$numero = "/\d+/";
$etiqueta = "/<[^>]+>/";

?>
    <h2>Contenido de la cadena</h2>
    <?php
    //imprimo la cadena con sin interpretar las etiquetas
      echo htmlspecialchars($cadena);
    ?>

    <h2>Resultados busquedas</h2>
    <?php 
        // busco todas las coincidencias en la cadena del patro del mail y lo guardo en un array
        preg_match_all($email, $cadena, $matchesEmail, PREG_OFFSET_CAPTURE);
        //print_r($matchesEmail);

        // recorro el array con foreach y muestro el elemento y la posicion
        foreach($matchesEmail[0] as $coincidencia) {
            $elemento = $coincidencia[0];
            $posicion = $coincidencia[1];

            echo "Elemento: ".htmlspecialchars($elemento)." | Posicion: ".$posicion."<br>";
        }
        echo "<br>";
        
        preg_match_all($numero, $cadena, $matchesNum, PREG_OFFSET_CAPTURE);
        //print_r($matchesNum);
        foreach($matchesNum[0] as $coincidencia) {
            $elemento = $coincidencia[0];
            $posicion = $coincidencia[1];

            echo "Elemento: ".htmlspecialchars($elemento)." | Posicion: ".$posicion."<br>";
        }
        echo "<br>";

        preg_match_all($etiqueta, $cadena, $matchesEtiqueta, PREG_OFFSET_CAPTURE);
        
        foreach($matchesEtiqueta[0] as $coincidencia) {
            $elemento = $coincidencia[0];
            $posicion = $coincidencia[1];

            echo "Elemento: ".htmlspecialchars($elemento)." | Posicion: ".$posicion."<br>";
        }

    ?>

<?php
}