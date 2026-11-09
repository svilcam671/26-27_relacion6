<?php

/**
 * Clase persona con propiedades y constructor privadas. Se usara el metodo estatico registrarPersona para crear una persona
 */
class Persona {

    // propiedades de la clase privadas
    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;

    /**
     * Constructor privado que establece unos valores concretos a las propiedades de la clase
     */
    private function __construct() {
        
        $this->_nombre = "prueba";
        $this->_fecha_nacimiento = "01/01/2000";
        $this->_domicilio = "carrera 12";
        $this->_localidad = "antequera";
        $this->_estado = EstadoCivil::Soltero;
    }

    /**
     * Metodo constructor estatico que recibe como parametro los valores para las propiedades de la clase, crea una nueva instancia de esta y le asigna los valores recibidos por parametro
     *
     * @param string $nombre
     * @param string $fecha
     * @param string $domicilio
     * @param string $localidad
     * @param EstadoCivil $estado
     * @return Persona devuelve el objeto persona con los valores de las propiedades indicados por parametro
     */
    public static function registrarPersona(string $nombre, string $fecha, string $domicilio, string $localidad, EstadoCivil $estado): Persona {

        $persona = new self();

        $persona->setNombre($nombre);
        $persona->setFechaNacimiento($fecha);
        $persona->setDomicilio($domicilio);
        $persona->setLocalidad($localidad);
        $persona->setEstado($estado);

        return $persona;
    }

    /**
     * Implementacion del metodo toString que devuelve una cadena con informacion de la persona 
     *
     * @return string devuelve una cadena con la informacion guardada en las propiedades del objeto persona
     */
    public function __toString(): string{
        
        return "$this->_nombre es una persona ".$this->_estado->descripcion()." nacida en $this->_fecha_nacimiento y que vive en $this->_localidad";
    }

    /**
     * Metodo get que devuelve el valor de la variable _nombre
     *
     * @return string
     */
    public function getNombre(): string {
        return $this->_nombre;
    }

    /**
     * Metodo set que establece un nuevo valor para la variable _nombre
     *
     * @param string $value
     */
    public function setNombre(string $value): void {
        $this->_nombre = $value;
        
    }

    /**
     * Metodo get que devuelve el valor de la variable _fecha_nacimiento
     *
     * @return string
     */
    public function getFechaNacimiento(): string {
        return $this->_fecha_nacimiento;
    }

    /**
     * Metodo set que establece un nuevo valor para la variable _fecha_nacimiento
     *
     * @param string $value
     */
    public function setFechaNacimiento(string $value): void {
        $this->_fecha_nacimiento = $value;
    }

    /**
     * Metodo get que devuelve el valor de la variable _domicilio
     *
     * @return string
     */
    public function getDomicilio(): string {
        return $this->_domicilio;
    }

    /**
     * Metodo set que establece un nuevo valor para la variable _domicilio
     *
     * @param string $value
     */
    public function setDomicilio(string $value): void {
        $this->_domicilio = $value;
    }

    /**
     * Metodo get que devuelve el valor de la variable _localidad
     *
     * @return string
     */
    public function getLocalidad(): string {
        return $this->_localidad;
    }

    /**
     * Metodo set que establece un nuevo valor para la variable _localidad
     *
     * @param string $value
     */
    public function setLocalidad(string $value): void {
        $this->_localidad = $value;
    }

    /**
     * Metodo get que devuelve el valor de la variable _estado
     *
     * @return EstadoCivil
     */
    public function getEstado(): EstadoCivil {
        return $this->_estado;
    }

    /**
     * Metodo set que establece un nuevo valor para la variable _estado
     *
     * @param EstadoCivil $value
     */
    public function setEstado(EstadoCivil $value): void {
        $this->_estado = $value;
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