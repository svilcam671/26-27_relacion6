<?php

/**
 * Clase para crear flautas que hereda de la clase InstrumentoViento y implementa la interfaz IFabricable
 */
final class Flauta extends InstrumentoViento implements IFabricable {

    /**
     * Constructor privado que solo se puede llamar desde el metodo estatico CrearDesdeArray
     */
    private function __construct(string $material, int $edad) {
        parent::__construct($material, $edad);
    }


    /**
     * Metodo estatico para permitir crear objetos de la clase Flauta pasando un array con posiciones asociativas que pueden no aparecer y en cuyo caso habran valores por defecto.
     *
     * @param array $array recibe un array con posiciones asociativas "material" y "edad"
     * @return Flauta devuelve un objeto Flauta
     */
    public static function CrearDesdeArray(array $array): Flauta {

        return new self($array["material"] ?? "madera",(int)($array["edad"] ?? 15));

    }

    /**
     * Implementacion del metodo de clonacion que clona el objeto actual con edad 0 y con un nuevo numero de instancia y aumentando el total de instancias creadas.
     *
     * @return void
     */
    public function __clone(): void{
        
        $this->_edad=0;
        $this->_numeroInstancia = self::$_totalInstancia+1;
        self::$_totalInstancia++;
    }

    /**
     * Metodo que devuelve una cadena con el sonido que hace el instrumento
     *
     * @return string devuelve una cadena que representa el sonido del instrumento
     */
    public function sonido() : string {

        return "Tururu tururu tuturururuu";
    }

    /**
     * Metodo que devuelve los pasos para la fabricacion de un instrumento
     *
     * @return string devuelve una cadena con los pasos para la fabricacion de un instrumento
     */
    public function metodoFabricacion() : string {
        return "Seleccionar material, cortar a medida, construir el tapón, abrir la embocadura, perforar los agujeros de las notas, afinar, ajustar y lijar para los acabados finales.";
    }

    /**
     * Metodo que devuelve los pasos para el reciclado que se debe hacer de un instrumento segun su fabricacion
     *
     * @return string devuelve una cadena con los pasos del reciclado.
     */
    public function metodoReciclado(): string {
        return "Desechar en el contenedor de envases.";
    }
        
        
}