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
        "TEXTO"=> "Ejercicio1",
        "ADICIONAL" => " >> "
    ],
];
//datos

inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1 Escribir distintas cadenas", $barra );
cuerpo();
finCuerpo();
// *******************************************

//vista
function cabecera() {

}

//vista
function cuerpo() {

    // variable para usar en las cadenas
    $nombre = "Sergio";

    // cadena con comillas dobles
    $comillasDobles = "Variable: $nombre | Acentos: á, í, é, ó, ñ | Comillas: ' y \" | <strong>Comillas dobles</strong>";

    // cadena con comillas simples
    $comillasSimples = 'Variable: $nombre | Acentos: á, í, é, ó, ñ | Comillas: \' y " | <strong>Comillas simples</strong>';

    // cadena HEREDOC
    $heredoc = <<<TEXTO
        Variable: $nombre
        Acentos: á, í, é, ó, ñ
        <strong>HEREDOC</strong>
        TEXTO;

    // cadena NOWDOC
    $nowdoc = <<<'TEXTO'
        Variable: $nombre
        Acentos: á, í, é, ó, ñ
        <strong>NOWDOC</strong>
        TEXTO;

?>
    <h2>Comillas dobles</h2>
    <?php echo htmlspecialchars($comillasDobles) ?>
    <h2>Comillas simples</h2>
    <?php echo htmlspecialchars($comillasSimples) ?>
    <h2>HEREDOC</h2>
    <?php echo htmlspecialchars($heredoc) ?>
    <h2>NOWDOC</h2>
    <?php echo htmlspecialchars($nowdoc) ?>
<?php
}