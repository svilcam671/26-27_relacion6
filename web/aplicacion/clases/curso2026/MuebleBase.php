<?php

include_once(RUTABASE . "/scripts/librerias/validacion.php");
abstract class muebleBase{

    // constante de clase, no se indica valor en la relacion pero pide inicializarla
    public const MAXIMO_MUEBLES = 20;

    // variable static que lleva la cuenta de muebles creados
    private static int $_mueblesCreados = 0;

    // propiedades privadas de la instancia
    private string $_nombre;
    private string $_fabricante;
    private string $_pais;
    private int $_anio;
    private string $_fechaIniVenta;
    private string $_fechaFinVenta;
    private float $_precio;

    private caracteristicas $_caracteristicas;

    /**
     * Constructor que recibe los valores para crear los muebles. Salvo por el nombre, lo demas valores tendran un valor por defecto. Ademas solo se permitira crear un mueble si no se ha llegado al limite maximo
     * indicado por la constante.
     *
     * @param string $nombre Cadena con el nombre del mueble, no puede estar vacio ni tener mas de 40 caracteres, si no se lanza una excepcion.
     * @param string $fabricante Cadena con el fabricante, valor por defecto FaMu: y si no lo tiene se le añade a la cadena dada, ademas se recorta a 30 caracteres
     * @param string $pais cadena con el pais, maximo 20 caracteres y valor por defecto ESPAÑA
     * @param integer $anio numero entero comprendido entre 2020 y el año actual. Valor por defecto 2020.
     * @param string $fechaIniVenta cadena con la fecha de inicio de venta que no puede ser anterior al 1 de enero del año de fabricacion, valor por defecto 01/01/2020
     * @param string $fechaFinVenta cadena con la fecha de fin de venta que no puede ser anterior a la fecha de inicio de venta, valor por defecto 31/12/2040
     * @param float $precio real con valor por defecto 30, no puede ser inferior a 30.
     */
    public function __construct(string $nombre, string $fabricante = "FaMu:", string $pais = "ESPAÑA", int $anio = 2020, string $fechaIniVenta = "01/01/2020", string $fechaFinVenta = "31/12/2040", float $precio = 30){
        
        $num = 0;
        if (!self::puedeCrear($num)) {
            throw new Exception("No se pueden crear mas muebles, se ha llegado al limite.");
        }

        if (!$this->setNombre($nombre)) {
            throw new Exception(("El nombre no puede estar vacio ni tener mas de 40 caracteres."));
        }

        if (!$this->setFabricante($fabricante)) {
            $this->setFabricante("FaMu:");
        }

        if (!$this->setPais($pais)) {
            $this->setPais("ESPAÑA");
        }

        if (!$this->setAnio($anio)) {
            $this->setAnio(2020);
        }

        if (!$this->setFechaIniVenta($fechaIniVenta)) {
            $this->setFechaIniVenta("01/01/".$this->getAnio());
        }

        if (!$this->setFechaFinVenta($fechaFinVenta)) {
            $this->setFechaFinVenta("31/12/2040");
        }

        if (!$this->setPrecio($precio)) {
            $this->setPrecio(30);
        }

        $this->_caracteristicas = new caracteristicas();

        self::$_mueblesCreados++;
    }

    /**
     * Funcion para comprobar que se pueden crear mas muebles, devolvera true si se puede, false en caso contrario. Ademas en la variable pasada por referencia 
     * se guardara el numero de muebles restantes que se pueden crear.
     *
     * @param integer $numero variable pasada por referencia donde se guardara el numero restante de muebles que se pueden crear
     * @return boolean se devuelve true si se pueden crear mas muebles, false en caso contrario
     */
    public static function puedeCrear(int &$numero): bool {

        $mueblesRestantes = self::MAXIMO_MUEBLES - self::$_mueblesCreados;
        $puede = false;

        if ($mueblesRestantes > 0) {
            $puede = true;
        }

        $numero = $mueblesRestantes;
        return $puede;

    }

    /**
     * Metodo que devolvera un array con el nombre de las propiedades adicionales a la clase base
     *
     * @return array
     */
    abstract public function damePropiedadesAdicionales(): array;

    /**
     * Redefinicion de toString que devuelve una cadena con informacion del mueble
     *
     * @return string devuelve una cadena con informacion del mueble
     */
    public function __toString(): string{

        return "MUEBLE de clase ".get_class($this)." con nombre ".$this->getNombre().", fabricante ".$this->getFabricante().", fabricado en ".$this->getPais().
                " a partir del año ".$this->getAnio().", vendido desde ".$this->getFechaIniVenta()." hasta ".$this->getFechaFinVenta().", precio ".$this->getPrecio()."€, caracteristicas (".$this->_caracteristicas.")";
    }


    /**
     * Metodo que recibe un array con parametros correspondientes al nombre de la caracteristica y el valor de esta y que la añade a la propiedad privada. Si la cantidad de argumentos es impar se descarta el ultimo.
     *
     * @param mixed ...$parametros array con pares de nombre y valor de propiedades
     * @return void
     */
    public function anadirCaracteristicas(mixed ...$parametros):void {

        for ($i = 0; $i + 1 < count($parametros); $i += 2 ) {

            $nombre = $parametros[$i];
            $valor = $parametros[$i+1];

            if (is_string($nombre) && $nombre !== "") {
                $this->_caracteristicas->$nombre = $valor;
            }
            
        }

    }

    public function getCaracteristicas(): caracteristicas {
        return $this->_caracteristicas;
    }
 
    // Metodos getter y setter para obtener el valor y establecerlo en las propiedades
    public function getNombre(): string {
        
        return $this->_nombre;
    }

    public function setNombre(string $_nombre): bool {

        $correcto = false;

        if ($_nombre !== "" && validaCadena($_nombre, 40, "")) {

            $this->_nombre = mb_strtoupper($_nombre);
            $correcto = true;
        }

        return $correcto;
    }

    public function getFabricante(): string {
        return $this->_fabricante;
    }

    public function setFabricante(string $_fabricante): bool {

        if (mb_substr($_fabricante, 0, 5) !== "FaMu:") {
            $_fabricante = "FaMu:".$_fabricante;
        }

        $this->_fabricante = mb_substr($_fabricante,0,30);

        return true;
    }

    public function getPais(): string {
        return $this->_pais;
    }

    public function setPais(string $_pais): bool {
        
        $correcto = false;

        if (validaCadena($_pais, 20, "ESPAÑA")) {
            $correcto = true;
            $this->_pais = $_pais;
        }

        return $correcto;
    }

    public function getAnio(): int {
        return $this->_anio;
    }

    public function setAnio(int $_anio): bool {
        
        $correcto = false;
        if (validaEntero($_anio, 2020, intval(date("Y")), 2020)) {

            $correcto = true;
            $this->_anio = $_anio;
        }

        return $correcto;

    }

    public function getFechaIniVenta(): string {
        return $this->_fechaIniVenta;
    }

    public function setFechaIniVenta(string $_fechaIniVenta): bool {
        
        $correcto = false;

        if (validaFecha($_fechaIniVenta,"")) {

            $fechaInicio = DateTime::createFromFormat("d/m/Y",$_fechaIniVenta);
            $fechaFabrica = DateTime::createFromFormat("d/m/Y","01/01/".$this->getAnio());

            if ($fechaInicio >= $fechaFabrica) {

                $this->_fechaIniVenta = $_fechaIniVenta;
                $correcto = true;

            }
        }
        return $correcto;

    }

    public function getFechaFinVenta(): string {
        return $this->_fechaFinVenta;
    }

    public function setFechaFinVenta(string $_fechaFinVenta): bool {
        $correcto = false;

        if (validaFecha($_fechaFinVenta,"")) {

            $fechaInicio = DateTime::createFromFormat("d/m/Y",$this->getFechaIniVenta());
            $fechaFin = DateTime::createFromFormat("d/m/Y",$_fechaFinVenta);

            if ($fechaFin >= $fechaInicio) {

                $this->_fechaFinVenta = $_fechaFinVenta;
                $correcto = true;

            }
        }
        return $correcto;
    }

    public function getPrecio(): float {
        return $this->_precio;
    }

    public function setPrecio(float $_precio): bool {
        
        $correcto = false;

        if ($_precio >= 30) {
            $correcto = true;
            $this->_precio = $_precio;
        }

        return $correcto;
    }


    /**
     * Metodo magico get que es llamado de forma automatica cuando se quiere obtener informacion sobre una variable, exista o no, del objeto. 
     * La redefinimos para que su uso quede deshabilitado devolviendo un error.
     * @param string $name
     * @return mixed
     */
    public function __get(string $name):mixed {
        throw new Exception("No existe la propiedad $name");
    }

    /**
     * Metodo magico set que es llamado de forma automatica cuando se quiere asignar valor a una variable de la clase exista o no.
     * La redefinimos para que su uso quede deshabilitado devolviendo un error.
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value):void {
        throw new Exception("No existe la propiedad $name por lo que no se puede asignar el valor");
    }

    /**
     * Metodo isset que comprueba si existe una variable en el objeto o no. Devolvemos false para deshabilitarla.
     *
     * @param string $name
     * @return boolean
     */
    public function __isset(string $name):bool {
        return false;
    }

    /**
     * Metodo unset magico que quita el valor de una variable. Devolvemos un mensaje de error para deshabilitarla.
     *
     * @param string $name
     * @return void
     */
    public function __unset(string $name):void {
        throw new Exception("No existe la propiedad $name");
    }


}