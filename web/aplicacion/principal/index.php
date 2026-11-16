<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ADICIONAL" => " >> "
        ],
];

// variables para guardar el id y saber que boton se ha pulsado
$elegido = 0;
$mostrar = isset($_POST["mostrar"]);
$modificar = isset($_POST["modificar"]);
$error = "";

// si se ha pulsado uno de los botones se comprueba el mueble seleccionado
if ($modificar || $mostrar) {

    if (isset($_POST["seleccionar"])) {
        $elegido = intval($_POST["seleccionar"]);
    }

    if (!validaRango($elegido, $muebles, 2)) {
        $error = "Se debe seleccionar un mueble valido";
        $elegido = 0;
    }
    // y si ademas el boton pulsado es el de modificar abrimos una nueva ventana enviando el id/indice del mueble seleccionado
    else if ($modificar) {
    header("Location: /aplicacion/principal/modificar.php?id=$elegido");
    exit;
    }
}






//dibuja la plantilla de la vista
inicioCabecera("Tienda");
cabecera();
finCabecera();
inicioCuerpo("Tienda", $barra);
cuerpo($muebles, $elegido, $error); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $muebles, int $elegido, string $error) {
?>

    <h1>Tabla muebles</h1>
    <table>
        <thead>
            <tr>
                <th>INDICE</th>
                <th>TIPO</th>
                <th>NOMBRE</th>
                <th>FABRICANTE</th>
                <th>PAIS</th>
                <th>INICIO VENTA</th>
                <th>FIN VENTA</th>
                <th>PRECIO</th>
                <th>MATERIAL</th>
            </tr>
        </thead>
        <tbody>
    <?php 
        // creo cada fila de la tabla apartir de los datos de cada mueble en el array
        for ($i = 1; $i <= count($muebles); $i++) { ?> 
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo get_class($muebles[$i])?></td>
                <td><?php echo $muebles[$i]->getNombre()?></td>
                <td><?php echo $muebles[$i]->getFabricante()?></td>
                <td><?php echo $muebles[$i]->getPais()?></td>
                <td><?php echo $muebles[$i]->getFechaIniVenta()?></td>
                <td><?php echo $muebles[$i]->getFechaFinVenta()?></td>
                <td><?php echo $muebles[$i]->getPrecio()." €"; ?></td>
                <td><?php echo $muebles[$i]->getMaterial()?></td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
    
    <br>
    <!-- Formulario con los dos botones de mostrar y modificar el mueble seleccionado -->
    <form action="index.php" method="post">

        <input type="submit" name="mostrar" value="Mostrar Mueble">
        <input type="submit" name="modificar" value="Modificar Mueble">
        <br><br>
        <select name="seleccionar" id="selecMueble">
            <?php 
                // lleno las opciones del select con el indice como value 
                for ($i = 1; $i <= count($muebles); $i++) {?>
                    <option value="<?php echo $i ?>"><?php echo $i." - ".$muebles[$i]->getNombre() ?></option>
            <?php  } ?>
        </select>


    </form>
    <?php 
        // si se ha elegido un mueble valido se muestran los datos de este
        if ($elegido > 0) {

            echo "<h2>Mueble Seleccionado: ".$muebles[$elegido]->getNombre()."</h2>";
            echo "Nombre: ".$muebles[$elegido]->getNombre();
            echo "<br>Fabricante: ".$muebles[$elegido]->getFabricante();
            echo "<br>Pais: ".$muebles[$elegido]->getPais();
            echo "<br>Año de fabricación: ".$muebles[$elegido]->getAnio();
            echo "<br>Fecha de inicio de venta: ".$muebles[$elegido]->getFechaIniVenta();
            echo "<br>Fecha de fin de venta: ".$muebles[$elegido]->getFechaFinVenta();
            echo "<br>Precio: ".$muebles[$elegido]->getPrecio()."€";
            echo "<br>Material: ".$muebles[$elegido]->getMaterial();

            foreach ($muebles[$elegido]->damePropiedadesAdicionales() as $clave ) {

                $get = "get".$clave;
                echo "<br>$clave: ".$muebles[$elegido]->$get();
            }


            echo "<br>Caracteristicas adicionales: ";
            
            foreach ($muebles[$elegido]->getCaracteristicas() as $nombre => $valor) {

                if (is_bool($valor)) {
                    $valor = $valor?"Si":"No";
                }

                echo "<br>$nombre: $valor";
            }
        }
        if ($error !== "") {

            echo "<br>ERROR: $error";

        }

    ?>
<?php
}