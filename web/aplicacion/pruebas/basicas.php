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
        "TEXTO"=> "pruebas",
        "ENLACE" => "/aplicacion/pruebas/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO"=> "eje. basicas",
        "ADICIONAL" => " >> "
    ],
];

//$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas basicas", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

const NUME1=50;

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
?>
    <br><br>Esto es html    <!--Comentario -->
    <a href="../aplicacion/pruebas/index.php">a</a>
    <?php
        echo "asasdasd";    //esto es un comentario

        $var1=25;
        $cadena='esto es una cadena';

        $var1+=12;
        echo $var1;

        $una_cadena="hola";
        $unaCadena="adios";

        $var1-=17;
        echo "$var1";

        $unaCadena=45;
        if (isset($cadena2)) {
            echo $cadena2;
        }
        
        $real=1234.123456789123456789123;
        $real+=0.12345678912;

        //$real=12*"hola";
        echo "el numero es 16<br>".PHP_EOL;
        echo 'el numero es $var1 <br>'.PHP_EOL;

        $real = null;
        echo $real;

        echo "el numero real $real";

        $var=125;
        $tipo=gettype($var);
        $var = (string)$var;
        $tipo=gettype($var);
        settype($var,"double");
        $tipo=gettype($var);
        $var=intval($var);
        $tipo=gettype($var);

        $var="B";
        if ($var) {
            $cadena="var no vale false";
        }

        $var="0";
        if ("0000") {
            $cadena="var no vale false";
        }

        $var="";
        if ($var) {
            $cadena="var no vale false";
        }

        $var=0;
        if ($var) {
            $cadena="var no vale false";
        }

        $var=1;
        if ($var) {
            $cadena="var no vale false";
        }

        $var=1+true;
        $var=1+1.5;
        $var=1+"1hola";
        $var=1+"1.5hola";
        //$var=1+"hola";
        //$var=1+[];
        $aux=123;
        $var="hola ".$aux;
        $aux=true;
        $var="hola ".$aux;
        $aux=[];
        //$var="hola ".$aux;
        $aux="adios";
        $var="hola ".$aux;
    
    
        //referencia
        $var1 = 100;
        $var2 = $var1;
        $var3 = &$var1;
        $var2 = 150;
        $var3 = 200;    
    
        /*
        unset($var3);
    
        define("NUME",25);
        $var1 = NUME;

        $var1+=NUME1;
    
        
        //operadores
        $var=15/2;

        if("25"==25) {
            $var="iguales";
        }

        if("25"===25) {
            $var="iguales";
        }

        if("25"!=25) {
            $var="distintos";
        }

        if("25"!=25) {
            $var="distintos";
        }

        $var=14>25;
        $var=14<25;
        $var=14<=>25;

        if (isset($var)) {
            $var=$var3;
        }
        else if (isset($mivar)) {
            $var=$mivar;
        }
        else {
            $var=27;
        }
 
        $var=$var3??$mivar??27;*/


        $var=0111111;
        $var=$var>>1;
        $var=$var<<1;

        $var=0101010 & 0101010;
        $var=0101010 | 0101010;

        $var=7;

        if($var==0) {
            $cadena="uno";

        }
        else if($var==2){
            $cadena="dos";
        }
        else {
            $cadena="otro";
        }

        $var=1;
        switch($var) {
            case 1: $cadena="uno"; break;
            case 2: $cadena="dos";  break;
            case 3: $cadena="otro"; 
        }

        $miArray[3]=23;
        $miArray[7]=1234;
        $miArray[]=54;
        $miArray[]=22;

        //$total = $miArray[6];

        $final=count($miArray);
        for ($i=0;$i<$final;$i++) {

            if (isset($miArray[$i])) {
                $total += $miArray[$i];
            }
            else {
                $final++;
            }
        }

        $miArray["nueva"]=18;
        $total=0;
        $total1=0;
        foreach($miArray as $i => $valor) {
            $total+=$miArray[$i];
            $total1+=$valor;
        }


        

    ?>

<?php
}
