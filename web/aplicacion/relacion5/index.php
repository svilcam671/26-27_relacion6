<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ENLACE"=> "/index.php",
        "ADICIONAL" => " >> "
        ],
        [
        "TEXTO"=> "Indice R5",
        "ADICIONAL" => " >> "
    ],
];

$datos = [
    "nombre" => "",
    "contrasenia" => "",
    "fechaNacimiento" => "",
    "carnetDia" => "",
    "carnetMes" => "",
    "carnetAnio" => "",
    "hora" => "",
    "estado" => 0,
    "estudios" => [],
    "hermanos" => 0,
    "sueldo" => 1100

];

$errores = [];

$estados = [
    1 => "Estudiante",
    2 => "En paro",
    3 => "Trabajando",
    4 => "Jubilado"
];

$estudios = [
    0 => "Sin estudios",
    1 => "Primaria",
    2 => "Secundaria",
    3 => "Bachillerato",
    4 => "Ciclos formativos",
    5 => "Universitarios"
];

$enviado = isset($_POST["enviar"]);

if ($enviado) {

    // recuperar nombre del formulario, si es valido quitar los espacios y convertir a mayusculas, si no, guardamos cadena vacia
    $datos["nombre"] = isset($_POST["nombre"])?trim($_POST["nombre"]):"";
    $datos["nombre"] = mb_strtoupper($datos["nombre"]);

    // validar nombre que sea menor de 25 caracteres y qe no empiece por H.
    if (!validaCadena($datos["nombre"], 25, "")) {
        $errores["nombre"] = "* El nombre no puede tener más de 25 caracteres.";
    }
    else if (!validaExpresion($datos["nombre"], "/^[^H]/", "")) {
        $errores["nombre"] = "* El nombre no puede estar vacío ni empezar por 'H'.";
    }

    // recuperar contraseña del formulario
    $datos["contrasenia"] = isset($_POST["contrasenia"])?$_POST["contrasenia"]:"";

    // validar la contraseña con la expresion regular que se pide
    if (!validaExpresion($datos["contrasenia"], '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$_\-;<>@])[A-Za-z\d$_\-;<>@]{8,15}$/', "")) {
        $errores["contrasenia"] = "* La contraseña debe ser entre 8 y 15 caracteres e incluir al menos una mayuscula, una minuscula, una cifra y un caracter especial (\$_-;<>@).";
    }

    // recuperar fecha de nacimiento del formulario
    $datos["fechaNacimiento"] = isset($_POST["fechaNacimiento"])?trim($_POST["fechaNacimiento"]):"";

    // validar que la fecha sea correcta
    if (!validaFecha($datos["fechaNacimiento"], "")) {
        $errores["fechaNacimiento"] = "* Se debe introducir una fecha de nacimiento válida y con formato DD/MM/AAAA";
    }

    // recuperar los datos de la fecha (dia, mes, año) del formulario
    $datos["carnetDia"] = isset($_POST["carnetDia"])?trim($_POST["carnetDia"]):"";
    $datos["carnetMes"] = isset($_POST["carnetMes"])?trim($_POST["carnetMes"]):"";
    $datos["carnetAnio"] = isset($_POST["carnetAnio"])?trim($_POST["carnetAnio"]):"";

    // creo la cadena con los 3 datos
    $fechaCarnet = $datos["carnetDia"]."/". $datos["carnetMes"]."/".$datos["carnetAnio"];

    // valido que sea correcta y guardo los datos en el array
    if (validaFecha($fechaCarnet, "")) {
        $partes = explode("/", $fechaCarnet);
        $datos["carnetDia"] = $partes[0];
        $datos["carnetMes"] = $partes[1];
        $datos["carnetAnio"] = $partes[2];
    }
    else {
        $errores["fechaCarnet"] = "* La fecha del carnet no es válida.";
        $datos["carnetDia"] = "";
        $datos["carnetMes"] = "";
        $datos["carnetAnio"] = "";
    }

    // Compruebo que tenemos fechas correctas de nacimiento y carnet
    if (!isset($errores["fechaNacimiento"]) && !isset($errores["fechaCarnet"])) {

        // formateo ambas fechas a d/m/Y
        $fNaci = DateTime::createFromFormat("d/m/Y", $datos["fechaNacimiento"]);
        $carnet = DateTime::createFromFormat("d/m/Y", $fechaCarnet);

        // calculo la diferencia entre ambas fechas para saber si es mayor de 18
        $carnet->sub(new DateInterval("P18Y"));
        $diferencia = $fNaci->diff($carnet);

        // saco el signo y asi compruebo que era menor de 18 años cuando saco el carnet
        if ($diferencia->format("%R") === "-") {
            $errores["fechaCarnet"] = "* La fecha del carnet debe corresponder a una persona mayor de 18 años.";
        }
        
    }

    // recuperar la hora del formulario y guardarla en el array
    $datos["hora"] = isset($_POST["hora"])?trim($_POST["hora"]):"";

    // valido la hora
    if (!validaHora($datos["hora"], "")) {
        $errores["hora"] = "* Se debe indicar una hora válida en formato hh:mm:ss";
    }

    // recupero el texto con el numero de hermanos del formulario
    $datos["hermanos"] = isset($_POST["hermanos"])?trim($_POST["hermanos"]):"";

    // valido que sea un numero y este en 0 y 20
    if (validaExpresion($datos["hermanos"], '/^\d+$/', "0")) {
        $datos["hermanos"] = intval($datos["hermanos"]);
        $valHermanos = validaEntero($datos["hermanos"],0,20,0);
    }
    else {
        // si no dejo valor por defecto 0
        $datos["hermanos"] = 0;
        $valHermanos = false;
    }

    // si no es un numero entre 0 y 20 guardo el error en el array asociativo de errores
    if (!$valHermanos) {
        $errores["hermanos"] = "* El numero de hermanos debe ser un entero entre 0 y 20.";
    }

    // recupero el texto con el sueldo
    $datos["sueldo"] = isset($_POST["sueldo"])?trim($_POST["sueldo"]):"";

    // valido que sea un numero entre 1000 y 150000, admitiendo que pueda tener decimales de forma opcional
    if (validaExpresion($datos["sueldo"], '/^\d+(\.\d+)?$/', "1100")) {
        $datos["sueldo"] = floatval($datos["sueldo"]);
        $valSueldo = validaReal($datos["sueldo"],1000,150000,1100);
    }
    else {
        // si no dejo el valor de sueldo en 1100 que es el por defecto
        $datos["sueldo"] = 1100;
        $valSueldo = false;
    }

    // si no es un real entre 1000 y 150000 guardo el error
    if (!$valSueldo) {
        $errores["sueldo"] = "* El sueldo debe ser un número entre 1000 y 150000.";
    }

    // recupero el estado seleccionado
    $datos["estado"] = isset($_POST["estado"])?$_POST["estado"]:"";

    // compruebo que coincide con una de las claves del array de estados
    if (is_string($datos["estado"]) && validaRango($datos["estado"], $estados, 2)) {
        $datos["estado"] = intval($datos["estado"]);
    }
    else {
        $datos["estado"] = 0;
        $errores["estado"] = "* Se debe elegir un estado válido.";
    }

    // recojo los estudios marcados en los checkboxes del formulario
    $checksEstudios = (isset($_POST["estudios"]) && is_array($_POST["estudios"]))?$_POST["estudios"]:[];

    $datos["estudios"] = [];

    // compruebo que se ha seleccionado al menos uno checkbox
    $valEstudios = count($checksEstudios) > 0;

    // recorro el array con los checks seleccionados y compruebo que existe en estudios la clave
    foreach ($checksEstudios as $clave) {
        if (is_string($clave) && validaRango($clave, $estudios, 2)) {
            $datos["estudios"][] = intval($clave);
        }
        else {
            $valEstudios = false;
        }

    }

    // si se selecciona la opcion 0 de sin estudios no puede haber otra opcion marcada
    if (in_array(0, $datos["estudios"])) {
        $datos["estudios"] = [0];
    }

    // si no hay ningun checkbox marcado que sea valido guardo el mensaje de error
    if (!$valEstudios) {
        $errores["estudios"] = "* Se debe seleccionar un nivel de estudios valido al menos.";
    }

}

// variable para controlar si se muestra el resumen unicamente si se ha enviado el formulario y no hay errores
$resumen = $enviado && count($errores) === 0;


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION RELACION 5", $barra);
cuerpo($datos, $errores, $estados, $estudios, $resumen); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $datos, array $errores, array $estados, array $estudios, bool $resumen)
{
?>

    <h1><a href="./pruebas.php">Pruebas de las validaciones</a></h1>
    <h2>Relación 5</h2>

    <?php

        // si la variable que controla que el formulario se ha rellenado correctamente es verdadera se muestra el resumen de lo contrario se muestra el formulario
        if ($resumen) {
            resumen($datos, $estados, $estudios);
        }
        else {
            formulario($datos, $errores);
        }
    ?>


<?php
}

/**
 * Funcion para mostrar el formulario. Al pulsar el boton de enviar se mandaran los datos para guardarlos si son correctos o 
 * mostrar un mensaje con el error
 *
 * @param array $datos recibe el array con los datos guardados del formulario
 * @param array $errores recibe el array con los erorres
 * @return void
 */
function formulario(array $datos, array $errores) {
?>

    <form action="index.php" method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $datos["nombre"];?>">
        <br>
        <label for="contrasenia">Contraseña:</label>
        <input type="password" name="contrasenia" id="contrasenia" value="<?php echo $datos["contrasenia"];?>">
        <br>
        <label for="fechaNacimiento">Fecha de nacimiento:</label>
        <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $datos["fechaNacimiento"];?>" placeholder="dd/mm/aaaa">
        <br>
        <label for="carnetDia">Fecha de carnet:</label>
        <input type="text" name="carnetDia" id="carnetDia" value="<?php echo $datos["carnetDia"];?>" size="2" placeholder="dd">
        <input type="text" name="carnetMes" id="carnetMes" value="<?php echo $datos["carnetMes"];?>" size="2" placeholder="mm">
        <input type="text" name="carnetAnio" id="carnetAnio" value="<?php echo $datos["carnetAnio"];?>" size="4" placeholder="aaaa">
        <br>
        <label for="hora">Hora de levantarse:</label>
        <input type="text" name="hora" id="hora" value="<?php echo $datos["hora"];?>" placeholder="hh:mm:ss">
        <br>
        <label for="hermanos">Número de hermanos:</label>
        <input type="text" name="hermanos" id="hermanos" value="<?php echo $datos["hermanos"];?>">
        <br>
        <label for="sueldo">Sueldo:</label>
        <input type="text" name="sueldo" id="sueldo" value="<?php echo $datos["sueldo"];?>">
        <label>€</label>
        <br>
        <input type="radio" name="estado" id="estudiante" value="1" <?php if($datos["estado"] === 1) echo "checked"; ?>>
        <label for="estudiante">Estudiante</label>
        
        <input type="radio" name="estado" id="paro" value="2" <?php if($datos["estado"] === 2) echo "checked"; ?>>
        <label for="paro">En paro</label>
        
        <input type="radio" name="estado" id="trabajando" value="3" <?php if($datos["estado"] === 3) echo "checked"; ?>>
        <label for="trabajando">Trabajando</label>

        <input type="radio" name="estado" id="jubilado" value="4" <?php if($datos["estado"] === 4) echo "checked"; ?>>
        <label for="jubilado">Jubilado</label>

        <input type="radio" name="estado" id="estadoIncorrecto" value="5" <?php if($datos["estado"] === 5) echo "checked"; ?>>
        <label for="estadoIncorrecto">Incorrecta</label>
        <br>
        <input type="checkbox" name="estudios[]" id="sinEstudios" value="0" <?php if(in_array(0, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="sinEstudios">Sin estudios</label>

        <input type="checkbox" name="estudios[]" id="primaria" value="1" <?php if(in_array(1, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="primaria">Primaria</label>

        <input type="checkbox" name="estudios[]" id="secundaria" value="2" <?php if(in_array(2, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="secundaria">Secundaria</label>

        <input type="checkbox" name="estudios[]" id="bachillerato" value="3" <?php if(in_array(3, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="bachillerato">Bachillerato</label>
        <br>
        <input type="checkbox" name="estudios[]" id="ciclo" value="4" <?php if(in_array(4, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="ciclo">Ciclo formativo</label>

        <input type="checkbox" name="estudios[]" id="universitarios" value="5" <?php if(in_array(5, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="universitarios">Universitarios</label>

        <input type="checkbox" name="estudios[]" id="estudioIncorrecto" value="6" <?php if(in_array(6, $datos["estudios"], true)) echo "checked"; ?>>
        <label for="estudioIncorrecto">Incorrecta</label>

        <br>
        <input type="submit" name="enviar" value="Enviar">
        <br>

        <?php

            if (isset($errores["nombre"])) {
                echo $errores["nombre"]."<br>";
            }

            if (isset($errores["contrasenia"])) {
                echo $errores["contrasenia"]."<br>";
            }

            if (isset($errores["fechaNacimiento"])) {
                echo $errores["fechaNacimiento"]."<br>";
            }

            if (isset($errores["fechaCarnet"])) {
                echo $errores["fechaCarnet"]."<br>";
            }

            if (isset($errores["hora"])) {
                echo $errores["hora"]."<br>";
            }

            if (isset($errores["hermanos"])) {
                echo $errores["hermanos"]."<br>";
            }

            if (isset($errores["sueldo"])) {
                echo $errores["sueldo"]."<br>";
            }

            if (isset($errores["estado"])) {
                echo $errores["estado"]."<br>";
            }

            if (isset($errores["estudios"])) {
                echo $errores["estudios"]."<br>";
            }

        ?>
    </form>
<?php
}

/**
 * Funcion para mostrar el resumen de los datos introducidos en el formulario. Recibe el array con los datos, el array de los estaods
 * y el array con los estudios para mostrar correctamente el texto correspondiente.
 *
 * @param array $datos recibe el array con los datos guardados del formulario
 * @param array $estados array asociativo con los estados 
 * @param array $estudios array asociativo con los niveles de estudios
 * @return void
 */
function resumen(array $datos, array $estados, array $estudios) {

    echo "Nombre: ".$datos["nombre"]."<br>";
    //echo "Contraseña: ".$datos["contrasenia"]."<br>";
    echo "Contraseña: ********"."<br>";
    echo "Fecha de nacimiento: ".$datos["fechaNacimiento"]."<br>";
    echo "Fecha de carnet: ".$datos["carnetDia"]."/".$datos["carnetMes"]."/".$datos["carnetAnio"]."<br>";
    echo "Hora de levantarse: ".$datos["hora"]."<br>";
    echo "Estado: ".$estados[$datos["estado"]]."<br>";
    
    $arrayEstudios = [];

    foreach ($datos["estudios"] as $claves) {

        $arrayEstudios[] = $estudios[$claves];
    }

    echo "Estudios: ".implode(", ", $arrayEstudios)."<br>";
    echo "Número de hermanos: ".$datos["hermanos"]."<br>";
    echo "Sueldo: ".$datos["sueldo"]."€";
}
