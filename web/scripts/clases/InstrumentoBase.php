<?php

/**
 * Clase abstracta InstrumentoBase que tiene las propiedades descripcion y edad de un instrumento, asi como el numero de instancia para saber el numero de objetos creados.
 */
abstract class InstrumentoBase {

    // Variables de instancia
    private string $_descripcion;
    protected int $_edad = 10;
    protected int $_numeroInstancia;

    // Variable static
    protected static int $_totalInstancia = 0;

    /**
     * Constructor que recibe una descripcion y una edad que se puede no indicar y en cuyo caso tomara valor 10 para un instrumento.
     *
     * @param string $descripcion Recibe una cadena con la descripcion de un instrumento
     * @param integer $edad Recibe un entero con la edad del instrumento
     */
    public function __construct(string $descripcion, int $edad = 10) {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        
        // le pongo un +1 para que al mostrar el numero de instancia empiece por 1 y coincida con el total
        $this->_numeroInstancia = self::$_totalInstancia+1;
        self::$_totalInstancia++;

    }

    /**
     * Metodo que devuelve una cadena con el sonido que hace el instrumento
     *
     * @return string devuelve una cadena que representa el sonido del instrumento
     */
    abstract public function sonido() : string;
        
        //return "fiuuuuuuu";

    

    /**
     * Metodo que devuelve una cadena con los pasos necesarios para afinar el instrumento
     *
     * @return string devuelve un string con los pasos
     */
    abstract public function afinar() : string;
        
        //return "Paso 1: Coger el instrumento. Paso 2: Revisar el sonido. Paso 3: Afinar con la herramienta adecuada";

    

    /**
     * Metodo que suma un año a la edad del instrumento
     *
     * @return void
     */
    public function envejecer() : void {
        
        $this->_edad++;

    }

    /**
     * Redefinicion del metodo toString al que se llama por defecto y que contiene informacion sobre el instrumento
     *
     * @return string devuelve una cadena con informacion del instrumento
     */
    public function __toString(): string {
        
        return "Instrumento con descripción ".$this->getDescripcion().", instancia ".$this->_numeroInstancia." de un total de ".self::$_totalInstancia.". Tiene ".$this->getEdad()." años. La clase es ".get_class($this).".";
    }

    /**
     * Metodo get para obtener la descripcion del instrumento
     *
     * @return string devuelve una cadena con la descripcion del instrumento
     */
	public function getDescripcion() : string {
		return $this->_descripcion;
	}

    /**
     * Metodo set para modificar la descripcion del instrumento
     *
     * @param string $value recibe una cadena con la nueva descripcion como parametro
     * @return void
     */
	public function setDescripcion(string $value): void {
		$this->_descripcion = $value;
	}

    /**
     * Metodo get para obtener la edad del instrumento
     *
     * @return integer devuelve un numero entero que representa la edad del instrumento
     */
	public function getEdad() : int {
		return $this->_edad;
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