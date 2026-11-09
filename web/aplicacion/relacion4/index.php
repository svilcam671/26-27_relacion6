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
        "TEXTO"=> "Indice R4",
        "ADICIONAL" => " >> "
    ],
];

// Ejercicio 1
//$violin = new InstrumentoBase("Instrumento de cuerda",5);
//$piano = new InstrumentoBase("Instrumento que consiste en un teclado",12);
$viento = new InstrumentoViento("plastico",2);

// Ejercicio 4
$arrayFlauta1 = [
    "material" => "madera",
    "edad" => "7"
];

$arrayFlauta2 = [
    "material" => "madera",
];
$arrayFlauta3 = [];

$flauta1 = Flauta::CrearDesdeArray($arrayFlauta1);
$flauta2 = Flauta::CrearDesdeArray($arrayFlauta2);
$flauta3 = Flauta::CrearDesdeArray($arrayFlauta3);


// ejercicio 5
$persona = Persona::registrarPersona("Sergio", "13/05/2000", "Av La Legion", "Antequera", EstadoCivil::Soltero);

// ejercicio 6
$fibonacci = new SerieFibonacci(10);

// ejercicio 7
$objeto = new ClaseMisPropiedades();
$objeto->propPublica="publica";
//$objeto->_propPrivada="privada";
$objeto->propiedad1=25;
$objeto->propiedad2= "cadena de texto";

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION RELACION 4", $barra);
cuerpo($viento, $flauta1, $flauta2, $flauta3, $persona, $fibonacci, $objeto); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(InstrumentoViento $viento, Flauta $flauta1, Flauta $flauta2, Flauta $flauta3, Persona $persona, SerieFibonacci $fibonacci, ClaseMisPropiedades $objeto)
{
?>
   <h2>Prueba Ejercicio 1</h2>
    <?php

        /*try {

            echo "Violin: $violin";
            echo "<br> Piano: $piano";
            echo "<br> Flauta: $viento";

            $flauta->envejecer();

            echo "<br> Flauta: $viento";

            $violin->hola;
            
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }*/

        echo "Pruebas hechas pero comentadas al ser una clase abstracta.";

    ?>

    <h2>Prueba Ejercicio 2</h2>
    <?php

        echo "Definida la interfaz IFabricable, se implementara y probara en ejercicios posteriores."

    ?>

    <h2>Prueba Ejercicio 3</h2>
    <?php

        try {

            // muestro el instrumento
            echo "Instrumento: $viento";

            // envejezco el instrumento
            $viento->envejecer();

            echo "<br> Instrumento: $viento";

            // prueba de los metodos
            echo "<br>".$viento->sonido();
            echo "<br>".$viento->afinar();
            
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }
    
    ?>

    <h2>Prueba Ejercicio 4</h2>
    <?php
  
        try {

            // muestro los 3 objetos flautas de prueba que he creado
            echo "Flauta1: $flauta1";
            echo "<br> Flauta2: $flauta2";
            echo "<br> Flauta3: $flauta3";

            // pruebo los metodos
            echo "<br>".$flauta1->metodoFabricacion();
            echo "<br>".$flauta1->metodoReciclado();

            // envejezco y clono la flauta
            $flauta1->envejecer();
            $flautaClone = clone $flauta1;

            // muestro la flauta clonada
            echo "<br> Flauta clonada: $flautaClone";
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }

    ?>

    <h2>Prueba Ejercicio 5</h2>
    <?php

        try {

            // muestro la persona creada
            echo "Persona: $persona";

            // genero un estado aleatorio del enum con array_rand y se la asigno a la persona
            $estado = EstadoCivil::casos()[array_rand(EstadoCivil::casos())];
            $persona->setEstado($estado);

            // muestro la persona nuevamente con el estado aleatorio
            echo "<br>Persona con estado aleatorio: $persona";

        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }

    ?>

    <h2>Prueba Ejercicio 6</h2>
    <?php
    
        try {
            // recorro el iterator de la clase
            echo "Serie de fibonacci con iterator<br>";
            foreach ($fibonacci as $clave => $valor) {
                echo $clave." => ".$valor."<br>";
            }

            // recorro el generador del metodo de la clase
            echo "------------------------------------------------<br>";
            echo "Serie de fibonacci con generador<br>";
            foreach (SerieFibonacci::fFibonacci(10) as $clave => $valor) {
                echo $clave." => ".$valor."<br>";
            }
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }

    ?>

    <h2>Prueba Ejercicio 7</h2>
    <?php
  
    try {

            // muestro el valor del ejemplo
            echo "la propiedad 1 vale ".$objeto->propiedad1."<br>";
            //echo $objeto->propiedad3;

            // recorro dos veces para comprobar que funciona correctamente
            foreach ($objeto as $clave => $valor) {
                echo $clave." => ".$valor."<br>";
            }
            echo "-----------------------------<br>";
            foreach ($objeto as $clave => $valor) {
                echo $clave." => ".$valor."<br>";
            }

            $objeto->_propPrivada="privada";
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: ".$e->getMessage()."</strong>";
        }

    ?>

<?php
}
