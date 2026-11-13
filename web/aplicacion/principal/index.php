<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=> "Inicio",
        "ADICIONAL" => " >> "
        ],
];

//dibuja la plantilla de la vista
inicioCabecera("Tienda");
cabecera();
finCabecera();
inicioCuerpo("Tienda", $barra);
cuerpo($muebles); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $muebles) {
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
            </tr>
        </thead>
        <tbody>
    <?php 
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
            </tr>
    <?php } ?>
        </tbody>
    </table>
    
    <br>
    <form action="modificar.php" method="post">

        <input type="submit" name="mostrar" value="Mostrar Mueble">
        <input type="submit" name="modificar" value="Modificar Mueble">
        <br><br>
        <select name="seleccionar" id="selecMueble">
            <?php 
                for ($i = 1; $i <= count($muebles); $i++) {?>
                    <option value="<?php echo $i ?>"><?php echo $i." - ".$muebles[$i]->getNombre() ?></option>
            <?php  } ?>
        </select>


    </form>

<?php
}