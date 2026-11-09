<?php

include_once(RUTABASE . "/scripts/librerias/validacion.php");
abstract class MuebleBase{

    // constante de clase, no se indica valor en la relacion pero pide inicializarla
    public const MAXIMO_MUEBLES = 20;

    // variable static que lleva la cuenta de muebles creados
    private static int $_mueblesCreados = 0;

    // propiedades privada de la instancia
    private string $_nombre;
    private string $_fabricante;
    private string $_pais;
    private int $_anio;
    private string $_fechaIniVenta;
    private string $_fechaFinVenta;
    private float $_precio;


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

        self::$_mueblesCreados++;
    }

    public static function puedeCrear(int &$numero): bool {

        $mueblesRestantes = self::MAXIMO_MUEBLES - self::$_mueblesCreados;
        $puede = false;

        if ($mueblesRestantes > 0) {
            $puede = true;
        }

        $numero = $mueblesRestantes;
        return $puede;

    }

    abstract public function damePropiedadesAdicionales(): array;

    public function __toString(): string{

        return "MUEBLE de clase ".get_class($this)." con nombre ".$this->getNombre().", fabricante ".$this->getFabricante().", fabricado en ".$this->getPais().
                " a partir del año ".$this->getAnio().", vendido desde ".$this->getFechaIniVenta()." hasta ".$this->getFechaFinVenta().", precio ".$this->getPrecio()."€";
    }
 
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