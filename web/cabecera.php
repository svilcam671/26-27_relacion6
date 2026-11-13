<?php 

error_reporting(0); //mostrar todos los errores

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo
date_default_timezone_set('Europe/Madrid');

if (MODO_TRABAJO=="produccion")
    error_reporting(0);
    else 
        error_reporting(E_ALL);  

spl_autoload_register(function ($clase){
    $ruta=RUTABASE."/aplicacion/clases/curso2026/";
    $fichero=$ruta."$clase.php";
    
    if (file_exists($fichero))
        {
            require_once($fichero);
        }
      else
        {
            throw new Exception("La clase $clase no se ha encontrado.");
        }
});

include(RUTABASE."/aplicacion/plantilla/plantilla.php");

//creo todos los objetos que necesita mi aplicación
$muebles = [
    1 => new muebleReciclado("Armario", "Ikea", "Suecia", 2021, "01/03/2021", "31/12/2030", 450, 60),
    2 => new muebleReciclado("Mesa", "MasMuebles", "Italia", 2024, "06/06/2026", "05/05/2035", 220, 20),
    3 => new muebleTradicional("Tocador", "Fenlun", "Japon", 2025, "09/12/2025", "10/10/2030", 340, 89, "F01"),
    4 => new muebleTradicional("Silla","Boilum","Alemania",2023,"02/02/2023","03/03/2025",45,17,"B121"), 
    5 => new muebleTradicional("Comoda","Hiklin","China",2024,"02/05/2024","01/01/2029",343.99,120,"HK1"),
];

$muebles[1]->anadirCaracteristicas("puertas",2,"color","marron");
$muebles[2]->anadirCaracteristicas("patas",4,"forma","redonda");
$muebles[3]->anadirCaracteristicas("cajones",3,"espejoIncluido",true);
$muebles[4]->anadirCaracteristicas("material", "madera","cojin","blando");
$muebles[5]->anadirCaracteristicas("alto",1, "ancho", 1.2);