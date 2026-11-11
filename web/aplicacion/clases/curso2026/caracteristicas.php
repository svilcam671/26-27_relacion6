<?php

class caracteristicas implements Iterator {

    // array asociativo con las caracteristicas, el nombre es la clave y el valor es su valor
    private array $_caracteristicas = [];

    // array con los nombres para que podamos recorrerlo al reves
    private array $_claves = [];

    // indica la posicion para el iterator
    private int $_posicion = 0;

    /**
     * Implementacion de current de iterator que devuelve el valor de la clave de la posicion actual de caracteristicas
     *
     * @return mixed
     */
    public function current(): mixed {
        return $this->_caracteristicas[$this->_claves[$this->_posicion]];
    }

    /**
     * Implementacion de next de iterator que decrementa la posicion al recorrerse de forma inversa
     *
     * @return void
     */
    public function next(): void {
        $this->_posicion--;
    }

    /**
     * Implementacion de key de iterator que devuelve la clave de la posicion actual
     *
     * @return mixed
     */
    public function key(): mixed {

        return $this->_claves[$this->_posicion];
    }

    /**
     * Implementacion de valid de iterator que devuelve true si la posicion es igual o mayor a 0, en caso contrario false
     *
     * @return boolean
     */
    public function valid(): bool {

        return $this->_posicion >= 0;
    }

    /**
     * Implementacion de rewind de iterator que reestablece el inicio del iterator a la ultima posicion del array de caracteristicas ya que se recorre de forma inversa
     *
     * @return void
     */
    public function rewind(): void {
        
        $this->_claves = array_keys($this->_caracteristicas);
        $this->_posicion = count($this->_claves)-1;

    }

    /**
     * Redefinicion de tostring que devuelve una cadena con las caracteristicas en orden normal y su valor
     *
     * @return string devuelve una cadena con formato car1:valor1;car2:valor2;……
     */
    public function __toString(){

        $partes=[];
        foreach ($this->_caracteristicas as $nombre => $valor) {

            if (is_bool($valor)) {
                $valor = $valor?"true":"false";
            }

            $partes[] = $nombre.":".$valor;
        }

        return implode(";",$partes);

    }


    /**
     * Redefinicion del metodo magico set que permite crear una caracteristica de forma dinamica y guardarla en el array caracteristicas si no existe ya y no existe la caracteristica ULTIMA
     * Lanza una excepcion en caso de que no se cumpla
     * 
     * @param string $name nombre de la propiedad
     * @param mixed $value valor de la propiedad
     * @return void
     */
    public function __set(string $name, mixed $value): void{
        
        if (!array_key_exists($name, $this->_caracteristicas) && array_key_exists("ULTIMA", $this->_caracteristicas)) {
            throw new Exception("No se puede añadir la caracteristica $name porque ya se añadio ULTIMA");
        }

        $this->_caracteristicas[$name] = $value;
    }

    /**
     * Redefinicion del metodo magico get que lanza una exepcion si se quiere acceder a una caracteristica que no existe, de lo contrario devuelve su valor
     *
     * @param string $name nombre de la propiedad
     * @return mixed devuelve el valor de la propiedad indicada
     */
    public function __get(string $name): mixed{
        
        if (!array_key_exists($name, $this->_caracteristicas)) {
            throw new Exception("La caracteristica $name no existe.");
        }

        return $this->_caracteristicas[$name];
    }

    /**
     * Redefinicion de isset que devuelve true o false segun si existe o no la propiedad indicada
     *
     * @param string $name nombre de la propiedad
     * @return boolean devuelve true si existe de lo contrario false
     */
    public function __isset(string $name): bool{
        return array_key_exists($name, $this->_caracteristicas);
    }

    

}