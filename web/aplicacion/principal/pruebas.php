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
        "TEXTO"=> "Pruebas",
        "ADICIONAL" => " >> "
    ],
];

// muebles de prueba de MuebleReciclado
$reciclado1 = new muebleReciclado("sofa");
$reciclado2 = new muebleReciclado("mesa", "ikea", "suiza", 2023, "07/04/2022", "08/03/2026", 145.5, 25);
$reciclado3 = new muebleReciclado("silla", "FaMu:Roble", "españaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", 2029, "20/13/2011", "29/02/2029", 5, 150);

// muebles de prueba de MuebleTradicional
$tradicional1 = new muebleTradicional("armario");
$tradicional2 = new muebleTradicional("estante", "ikea", "Peru", 2022, "01/01/2022", "31/12/2035", 80, 120.5, "S07");

$arrayMuebles = array($reciclado1, $reciclado2, $reciclado3, $tradicional1, $tradicional2);


//dibuja la plantilla de la vista
inicioCabecera("Tienda");
cabecera();
finCabecera();
inicioCuerpo("Pruebas tienda", $barra);
cuerpo($arrayMuebles); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $arrayMuebles) {
?>
   <h2>Pruebas MuebleReciclado</h2>
   <?php 

        try {
            echo "<strong>Sofa (solo indicando el nombre, valores por defecto):</strong> ".$arrayMuebles[0];
            echo "<br><strong>Mesa (dando valores validos):</strong> ".$arrayMuebles[1];
            echo "<br><strong>Silla (con datos erroneos):</strong> ".$arrayMuebles[2];

            echo "<br><strong>Prueba setPrecio(20): </strong>".($arrayMuebles[1]->setPrecio(20)?"true":"false");
            echo "<br><strong>Prueba getPrecio: </strong>".$arrayMuebles[1]->getPrecio();

            echo "<br><strong>Prueba setNombre(''): </strong>".($arrayMuebles[1]->setNombre("")?"true":"false");
            echo "<br><strong>Prueba getNombre: </strong>".$arrayMuebles[1]->getNombre();

            echo "<br><strong>Prueba setFabricante('Mercamueble'): </strong>".($arrayMuebles[1]->setFabricante("Mercamueble")?"true":"false");
            echo "<br><strong>Prueba getFabricante: </strong>".$arrayMuebles[1]->getFabricante();

            echo "<br><strong>Prueba setPais('Francia'): </strong>".($arrayMuebles[1]->setPais("Francia")?"true":"false");
            echo "<br><strong>Prueba getPais: </strong>".$arrayMuebles[1]->getPais();

            echo "<br><strong>Prueba setPorcentajeReciclado(20): </strong>".($arrayMuebles[1]->setPorcentajeReciclado(20)?"true":"false");
            echo "<br><strong>Prueba getPorcentajeReciclado: </strong>".$arrayMuebles[1]->getPorcentajeReciclado();

            echo "<br><strong>Prueba setFechaIniVenta('10/10/2023'): </strong>".($arrayMuebles[1]->setFechaIniVenta("10/10/2023")?"true":"false");
            echo "<br><strong>Prueba getFechaIniVenta: </strong>".$arrayMuebles[1]->getFechaIniVenta();

            echo "<br><strong>Prueba setFechaFinVenta('20/20/2026'): </strong>".($arrayMuebles[1]->setFechaFinVenta("20/20/2026")?"true":"false");
            echo "<br><strong>Prueba getFechaFinVenta: </strong>".$arrayMuebles[1]->getFechaFinVenta();

            echo "<br><strong>Prueba setAnio(2028): </strong>".($arrayMuebles[1]->setAnio(2028)?"true":"false");
            echo "<br><strong>Prueba getAnio: </strong>".$arrayMuebles[1]->getAnio();
 
            echo "<br><strong>damePropiedadesAdicionales():</strong> ".implode(", ", $arrayMuebles[1]->damePropiedadesAdicionales());

            $num = 0;
            echo "<br><strong>puedeCrear: </strong>".(muebleBase::puedeCrear($num)?"true":"false").". Restantes: $num";
        }
        catch (Exception $e) {

            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

        try {
            $reciclado4 = new muebleReciclado("");
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

        try {
            echo "<br>Acceso a una propiedad privada: ".$arrayMuebles[1]->_nombre;
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

        try {
            $arrayMuebles[1]->prueba = 1;
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

    ?>

   <h2>Pruebas MuebleTradicional</h2>
   <?php

        try {
            echo "<strong>Armario (solo indicando el nombre, valores por defecto):</strong> ".$arrayMuebles[3];
            echo "<br><strong>Estante (dando valores validos):</strong> ".$arrayMuebles[4];

            echo "<br><strong>Prueba setPeso(14): </strong>".($arrayMuebles[3]->setPeso(14)?"true":"false");
            echo "<br><strong>Prueba getPeso: </strong>".$arrayMuebles[3]->getPeso();

            echo "<br><strong>Prueba setPeso(300): </strong>".($arrayMuebles[3]->setPeso(300)?"true":"false");
            echo "<br><strong>Prueba getPeso: </strong>".$arrayMuebles[3]->getPeso();

            echo "<br><strong>Prueba setPeso(301): </strong>".($arrayMuebles[3]->setPeso(301)?"true":"false");
            echo "<br><strong>Prueba getPeso: </strong>".$arrayMuebles[3]->getPeso();

            echo "<br><strong>Prueba setSerie('X9'): </strong>".($arrayMuebles[3]->setSerie("X9")?"true":"false");
            echo "<br><strong>Prueba getSerie: </strong>".$arrayMuebles[3]->getSerie();

            echo "<br><strong>Prueba setPrecio(100): </strong>".($arrayMuebles[3]->setPrecio(100)?"true":"false");
            echo "<br><strong>Prueba getPrecio: </strong>".$arrayMuebles[3]->getPrecio();

            echo "<br><strong>damePropiedadesAdicionales():</strong> ".implode(", ", $arrayMuebles[3]->damePropiedadesAdicionales());
            echo "<br><strong>Armario despues de los cambios:</strong> ".$arrayMuebles[3];
        }
        catch (Exception $e) {

            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

    ?>

   <h2>Pruebas Caracteristicas</h2>
   <?php
        $c = new caracteristicas();
        $c->color = "roble";
        $c->saliente = true;
        $c->precio = 300;

        try {
            echo "<strong>Caracteristicas:</strong> ".$c;

            echo "<br><strong>Recorrido con foreach:</strong> ";
            foreach ($c as $nombre => $valor) {
                echo $nombre." ";
            }

            echo "<br><strong>Leer la caracteristica color: </strong>".$c->color;
            echo "<br><strong>isset(color): </strong>".(isset($c->color)?"true":"false");
            echo "<br><strong>isset(nada): </strong>".(isset($c->nada)?"true":"false");

            $c->color = "pino";
            echo "<br><strong>Modificar color:</strong> ".$c;

            $c->ULTIMA = "fin";
            echo "<br><strong>Anadir ULTIMA:</strong> ".$c;
        }
        catch (Exception $e) {

            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

        try {
            echo "<br>Leer una caracteristica que no existe: ".$c->nada;
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

        try {
            $c->nueva = 1;
            echo "<br>Caracteristica nueva añadida despues de ULTIMA";
        }
        catch (Exception $e) {
            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

        try {
            $arrayMuebles[0]->anadirCaracteristicas("saliente", true, "precio", 300);
            echo "<br><strong>anadirCaracteristicas con 4 parametros:</strong> ".$arrayMuebles[0]->getCaracteristicas();

            $arrayMuebles[0]->anadirCaracteristicas("a", 1, "b");
            echo "<br><strong>anadirCaracteristicas con numero impar de parametros:</strong> ".$arrayMuebles[0]->getCaracteristicas();

            echo "<br><strong>Sofa con sus caracteristicas:</strong> ".$arrayMuebles[0];
        }
        catch (Exception $e) {

            echo "<br><strong>ERROR: </strong>".$e->getMessage();
        }

    ?>

<?php
}