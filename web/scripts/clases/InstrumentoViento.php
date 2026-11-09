<?php

/**
 * Clase para crear instrumentos de vientos heredando de la clase abstracta padre InstrumentoBase, implementando los metodos de sonido y afinar y redefiniendo el toString. El constructor recibe el material y la edad y llama dentro al constructor de la clase padre.
 */
class InstrumentoViento extends InstrumentoBase {

    // Atributo material que no es accesible desde fuera y con valor por defecto "madera"
    protected string $_material = "madera";


    /**
     * Constructor de la clase que llama al constructor de la clase de la que se hereda al que le pasa una cadena fija "Instrumento de viento" y la edad indicada que por defecto es 15.
     *
     * @param string $material recibe una cadena que por defecto es "madera" 
     * @param integer $edad recibe la edad que por defecto es 15 y se la pasa al constructor de la clase padre
     */
    public function __construct(string $material = "madera", int $edad = 15){

        $this->_material = $material;
        parent::__construct("Instrumento de viento", $edad);
    }


    /**
     * Metodo que devuelve una cadena con el sonido que hace el instrumento
     *
     * @return string devuelve una cadena que representa el sonido del instrumento
     */
    public function sonido() : string {

        return "fiuuuuuuu";
    }
    

    /**
     * Metodo que devuelve una cadena con los pasos necesarios para afinar el instrumento de viento
     *
     * @return string devuelve un string con los pasos
     */
    public final function afinar() : string {
        return "Paso 1: Calentar el instrumento. Paso 2: usar un referente de afinación. Paso 3: tocar una nota larga y constante. Paso 4: ajustar segun el tipo de instrumento. Paso 5: controlar la columna de aire.";
    }
        

    /**
     * Redefinicion del metodo toString llamando al metodo toString de la clase padre de la que se hereda
     *
     * @return string devuelve una cadena con informacion sobre el instrumento y el material
     */
    public function __toString(): string{
        return parent::__toString()." Instrumento de material ".$this->_material;
    }
        
}