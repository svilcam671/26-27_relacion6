<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barra = [
    [
        "TEXTO" => "Inicio",
        "ENLACE" => "/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/pruebas/index.php",
        "ADICIONAL" => " >> "
    ],
    [
        "TEXTO" => "Indice clases",
        "ADICIONAL" => " >> "
    ],
];
//$usuario = getenv("MYSQL_USER");

class ClasePrueba
{
    //definición de constantes
    public const PI = 2.14;
    //definición de propiedad
    public int $propPublica = 1;
    private string $_propPrivada = "hola";
    protected float $_propProtegida = 1.234;
    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);
    //definición de método
    public function metodo()
    {
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;
        $this->_propPrivada = 100;
        $this->_propProtegida = "adios";
        //acceso a la propiedad estática
        self::$propEstatica[0] = "otra";
        return true;
    }
}

//se crea una instancia de la clase prueba
$instancia = new ClasePrueba();
//accede a la propiedad pública de la instancia
$instancia->propPublica = 50;
//se accede a la propiedad de clase (estática)
ClasePrueba::$propEstatica[1] = 10;

//se crea una instancia de la clase prueba
$instancia = new ClasePrueba();


class Prueba
{
    private ?int $_codigo;
    private ?string $_nombre;
    //el constructor es privado
    private function __construct(?int $codigo = null, ?string $nombre =
    null)
    {
        $this->_codigo = $codigo;
        $this->_nombre = $nombre;
    }
    //constructor estatico publico
    public static function desdeDatos(int $codigo, string $nombre): static
    {
        if ($codigo > 0) {
            $codigo = 0;
        }
        //creo el objeto usando static
        $obj = new static($codigo, $nombre);
        return $obj;
    }
    //constructor estatico publico
    public static function desdeJson(string $json): static
    {
        $datos = json_decode($json);
        return new static($datos->codigo, $datos->nombre);
    }
}


$datos = ["codigo" => 12, "nombre" => "prueba2"];
$datosJSon = json_encode($datos);


//no hay constructor público, por lo que tengo que
//llamar a las funciones de creación estaticas
$p1 = Prueba::desdeDatos(5, 'Objeto');
$p2 = Prueba::desdeJson($datosJSon);


class unica {

    private static bool $_creada=false;
    public int $numero=12;

    private static ?unica $_objeto = null;


    private function __construct(int $val = 0) {

        $this->numero=$val;
    }

    public static function crear(int $numero):static {

        if (self::$_creada) {
            return self::$_objeto;
        }

        self::$_creada=true;
        $obj = new static($numero);
        $_objeto = $obj;
        return $obj;
        
    }

}

$programa=unica::crear(100);
$programa->numero=1;
$segunda=unica::crear(300);


$ins = new instituto();

// sobrecarga

$clase1 = new claseNormal();
$clase2 = new claseNormal();

/*$clase1 ->cadena="hola mundo";

if (isset($clase1->cadena))
        $cad=$clase1->cadena;

if (isset($clase2->cadena))
        $cad=$clase2->cadena;
*/

//clase sin sobrecarga
$clase1=new claseSinSobrecarga();

$clase1->cadena="adios";



//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera()
{
?>
    <!--Esto es un comentario HTML-->
<?php
    //Esto va en el head y es un comentario de PHP
}

//vista
function cuerpo()
{
?>


<?php
}
