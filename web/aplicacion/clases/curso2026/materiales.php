<?php

enum Materiales: int {

    case Madera = 5;
    case Hierro = 10;
    case Plastico = 15;
    case Cristal = 20;
    

    /**
     * Metodo publico descripcion que devuelve el nombre del caso
     *
     * @return string devuelve una cadena con el nombre del caso
     */
    public function descripcion(): string {
        return $this->name;
    }

    /**
     * Metodo publico que devuelve el valor del caso concreto
     *
     * @return integer devuelve el valor del caso concreto
     */
    public function valor(): int {
        return $this->value;
    }
}