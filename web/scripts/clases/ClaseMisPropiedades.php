<?php

/**
 * ClaseMisPropiedades que implementa iteratorAggregate y en el que usaremos los metodos magicos para tener propiedades dinamicas
 */
class ClaseMisPropiedades implements IteratorAggregate{

    private array $_propiedades = [];
    public mixed $propPublica = null; // tiene que estar inicializada o dara error
    private mixed $_propPrivada = 25;

    /**
     * Implementacion del metodo getIterator de la interfaz iteratorAggregate que actua como un generador y devuelve las propiedades de la clase con el prefijo oi_
     * @return Generator<string, mixed, mixed, void>
     */
    public function getIterator(): Traversable{
        
        foreach($this->_propiedades as $prop => $value){
            yield "oi_".$prop => $value;
        }

        yield "oi_propPublica" => $this->propPublica;
        yield "oi_propPrivada" => $this->_propPrivada;
        
    }

    /**
     * Metodo magico get que es llamado de forma automatica cuando se quiere obtener informacion sobre una variable, exista o no, del objeto. 
     * Comprobamos si la propiedad existe y devolvemos su valor, en caso contrario lanzamos una excepcion
     * @param string $name
     * @return mixed
     */
    public function __get(string $name):mixed {
        
        if(array_key_exists($name, $this->_propiedades)) {
            return $this->_propiedades[$name];
        }
        else {
            throw new Exception("$name no existe");
        }
    }

    /**
     * Metodo magico set que es llamado de forma automatica cuando se quiere asignar valor a una variable de la clase exista o no.
     * Comprobamos que no se quieran asignar nombres de propiedades ya existentes, en cuyo caso lanzamos una exepcion. En caso contrario guardamos su valor.
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value):void {
        
        if (property_exists($this, $name)) {
            throw new Exception("La propiedad $name existe en la clase, no se puede asignar.");
        }

        $this->_propiedades[$name] = $value;
    }

    /**
     * Metodo isset que comprueba si existe una variable en el objeto o no.
     * Devolvemos true si existe, en caso contrario false
     *
     * @param string $name
     * @return boolean
     */
    public function __isset(string $name):bool {
        
        return array_key_exists($name, $this->_propiedades);
    }

    /**
     * Metodo unset magico que quita el valor de una variable.
     *
     * @param string $name
     * @return void
     */
    public function __unset(string $name):void {
        
        unset($this->_propiedades[$name]);

    }

}