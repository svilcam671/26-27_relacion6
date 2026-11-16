<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "Inicio",
        "ENLACE" => "./index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO" => "Modificar Mueble",
        "ADICIONAL" => " >> "
    ]
];

// variables para guardar los datos que me llegan o donde voy a guardar lo que necesite para las comprobaciones y errores
$id = 0;
$error = "";
$guardar = isset($_POST["guardar"]);
$aux = null;
$errores = [];
$guardado = false;

// compruebo que el id que he recibido de index.php es valido y se corresponde a una clave del array de muebles
if (isset($_REQUEST["id"])) {

    $id = intval($_REQUEST["id"]);

    if (!validaRango($id, $muebles, 2)) {

        $error = "El ID recibido no es valido.";
        $id = 0;
    }
} else {
    $error = "No se ha seleccionado ningún mueble para modificar.";
}

// si el id es valido (mayor que 0 al ser claves apartir de 1)
if ($id > 0) {

    // array asociativo donde voy a guardar los datos del mueble
    $datos = array(
        "nombre" => "",
        "fabricante" => "",
        "pais" => "",
        "anio" => "",
        "iniVenta" => "",
        "finVenta" => "",
        "precio" => "",
        "material" => "",
    );

    foreach ($muebles[$id]->damePropiedadesAdicionales() as $clave) {

        $datos[$clave] = "";
    }

    // si se pulsa el boton de guardar, guardamos en el array de datos los valores del formulario
    if ($guardar) {

        // los datos basicos del mueble se guardan en su clave del array asociativo
        foreach ($datos as $clave => $valor) {
            $datos[$clave] = isset($_POST[$clave]) ? trim($_POST[$clave]) : "";
        }

        // compruebo el tipo del mueble para crear una instancia auxiliar para validar datos y tambien valido las propiedades especificas de cada tipo de mueble
        if (get_class($muebles[$id]) === "muebleReciclado") {
            $aux = new muebleReciclado("aux");

            if (!(is_numeric($datos["PorcentajeReciclado"]) && validaEntero($datos["PorcentajeReciclado"], 0, 100, 10))) {
                $errores["PorcentajeReciclado"] = "Porcentaje de reciclado indicado no valido";
            }
        } else if (get_class($muebles[$id]) === "muebleTradicional") {
            $aux = new muebleTradicional("aux");

            if (!(is_numeric($datos["Peso"]) && validaReal($datos["Peso"], 15, 300, 15))) {
                $errores["Peso"] = "Peso indicado no valido";
            }
        }

        // valido los datos recogidos del formulario con ayuda de la instancia auxiliar y sus sets y otros datos con validaciones como se pide, si no guardo un error en el array de errores
        if (!$aux->setNombre($datos["nombre"])) {
            $errores["nombre"] = "Nombre indicado no valido";
        }
        if (!$aux->setPais($datos["pais"])) {
            $errores["pais"] = "Pais indicado no valido";
        }
        $aux->setFabricante($datos["fabricante"]);

        if (is_numeric($datos["anio"]) && validaEntero($datos["anio"], 2020, intval(date("Y")), 2020)) {

            $datos["anio"] = intval($datos["anio"]);

            $aux->setAnio($datos["anio"]);

            if (!$aux->setFechaIniVenta($datos["iniVenta"])) {
                $errores["iniVenta"] = "Fecha de inicio de venta no valida";
            }
            if (!$aux->setFechaFinVenta($datos["finVenta"])) {
                $errores["finVenta"] = "Fecha de fin de venta no valida";
            }
        } else {
            $errores["anio"] = "Año indicado no valido";
        }

        if (!(is_numeric($datos["precio"]) && floatval($datos["precio"]) >= 30)) {
            $errores["precio"] = "Precio indicado no valido.";
        }

        if (!(is_numeric($datos["material"]) && (intval($datos["material"])%5 === 0))) {
            $errores["material"] = "Material no valido";
        }

        

        // si no hay errores actualizo los datos del mueble con los datos guardados
        if (count($errores) === 0) {

            $muebles[$id]->setNombre($datos["nombre"]);
            $muebles[$id]->setFabricante($datos["fabricante"]);
            $muebles[$id]->setPais($datos["pais"]);
            $muebles[$id]->setAnio(intval($datos["anio"]));
            $muebles[$id]->setFechaIniVenta($datos["iniVenta"]);
            $muebles[$id]->setFechaFinVenta($datos["finVenta"]);
            $muebles[$id]->setPrecio(floatval($datos["precio"]));
            $muebles[$id]->setMaterial(intval($datos["material"]));

            if (get_class($muebles[$id]) === "muebleReciclado") {
                $muebles[$id]->setPorcentajeReciclado(intval($datos["PorcentajeReciclado"]));
            } else if (get_class($muebles[$id]) === "muebleTradicional") {
                $muebles[$id]->setPeso(floatval($datos["Peso"]));
                $muebles[$id]->setSerie($datos["Serie"]);
            }

            // pongo a true la variable de control para mostrar el resumen
            $guardado = true;
        }
    }
}


//dibuja la plantilla de la vista
inicioCabecera("Tienda");
cabecera();
finCabecera();
inicioCuerpo("Tienda", $barra);
cuerpo($muebles, $id, $error, $errores, $guardado); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $muebles, int $id, string $error, array $errores, bool $guardado)
{
?>
    <?php

        // si el id que viene de index.php es valido compruebo la variable de control y muestro el formulario o resumen 
        if ($id > 0) { ?>

            <h2>Modificar mueble <?php echo "$id: ".$muebles[$id]->getNombre() ?></h2>

            <?php 
            
            if (!$guardado) {
                formulario($muebles, $id);
            }
            else {
                resumen($muebles, $id);
            }
        }
        
    ?>
    <?php
        // en caso de haber errores los muestro (primer error para controlar los errores de los datos que llegan de index y el otro es el array con los errores a la hora de validar los datos recogidos del formulario)
        if ($error !== "") {

            echo "ERROR: $error";
        }

        foreach ($errores as $clave => $valor) {

            echo "* ".$valor."<br>";
        }
    ?>

    <br><br>
    <!-- enlace de vuelta a index.php (llevo a index.php de la raiz pero redirecciona a index.php de aplicacion/principal) -->
    <a href="<?= "./index.php" ?>">Volver a la página principal</a>
<?php
}

/**
 * Funcion para mostrar el formulario con los datos del mueble guardados
 *
 * @param array $muebles el array con los muebles
 * @param integer $id el indice del array del mueble seleccionado en index.php
 * @return void
 */
function formulario(array $muebles, int $id) {
?>
    <form action="modificar.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $muebles[$id]->getNombre() ?>">
            <br>
            <label for="fabricante">Fabricante:</label>
            <input type="text" name="fabricante" id="fabricante" value="<?php echo $muebles[$id]->getFabricante() ?>">
            <br>
            <label for="pais">Pais:</label>
            <input type="text" name="pais" id="pais" value="<?php echo $muebles[$id]->getPais() ?>">
            <br>
            <label for="anio">Año de fabricación:</label>
            <input type="text" name="anio" id="anio" value="<?php echo $muebles[$id]->getAnio() ?>">
            <br>
            <label for="iniVenta">Fecha inicio de venta:</label>
            <input type="text" name="iniVenta" id="iniVenta" value="<?php echo $muebles[$id]->getFechaIniVenta() ?>">
            <br>
            <label for="finVenta">Fecha fin de venta:</label>
            <input type="text" name="finVenta" id="finVenta" value="<?php echo $muebles[$id]->getFechaFinVenta() ?>">
            <br>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" value="<?php echo $muebles[$id]->getPrecio() ?>" size="5">
            <label>€</label>
            <br>

            <?php

            // para las propiedades adicionales llamo al metodo del objeto que devuelve un array con las especificas segun el tipo y construyo el get 
            foreach ($muebles[$id]->damePropiedadesAdicionales() as $clave) {

                $get = "get".$clave;
            ?>
                <label for="<?= $clave ?>"><?= $clave ?>:</label>
                <input type="text" name="<?= $clave ?>" id="<?= $clave ?>" value="<?= $muebles[$id]->$get(); ?>" size="5">
                <br>


            <?php } ?>
            <select name="material" id="material">
                <option value="5">Madera</option>
                <option value="10">Hierro</option>
                <option value="15">Plastico</option>
                <option value="20">Cristal</option>
            </select>
            <br><br>


            <!-- Boton para guardar el formulario-->
            <input type="submit" name="guardar" value="Guardar cambios">
            <br>

        </form>

<?php
}

/**
 * Funcion para mostrar el resumen de los datos modificados del mueble
 *
 * @param array $muebles array con los datos de los muebles
 * @param integer $id el indice del array del mueble seleccionado en index.php
 * @return void
 */
function resumen(array $muebles, int $id){

    echo "Mueble modificado correctamente";
    echo "<br>Nombre: " . $muebles[$id]->getNombre();
    echo "<br>Fabricante: " . $muebles[$id]->getFabricante();
    echo "<br>Pais: " . $muebles[$id]->getPais();
    echo "<br>Año de fabricación: " . $muebles[$id]->getAnio();
    echo "<br>Fecha de inicio de venta: " . $muebles[$id]->getFechaIniVenta();
    echo "<br>Fecha de fin de venta: " . $muebles[$id]->getFechaFinVenta();
    echo "<br>Precio: " . $muebles[$id]->getPrecio() . "€";
    echo "<br>Material: ".$muebles[$id]->getMaterial();

    foreach ($muebles[$id]->damePropiedadesAdicionales() as $clave) {

        $get = "get" . $clave;
        echo "<br>$clave: " . $muebles[$id]->$get();
    }
}
