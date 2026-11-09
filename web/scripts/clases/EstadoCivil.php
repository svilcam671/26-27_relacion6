<?php

/**
 * Enumeracion del estado civil de una persona, cada caso tiene un valor.
 */
enum EstadoCivil: int{

    case Soltero = 10;
    case Casado = 20;
    case Pareja = 30;
    case Viudo = 40;


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

    /**
     * Metodo static que devuelve un array de los casos del enum, para ello utiliza el metodo que poseen los enums de base que devuelven un array con los nombre de los casos.
     *
     * @return array devuelve un array con el nombre de los casos
     */
    public static function casos(): array {

        // cases() es un metodo que poseen los enums
        return EstadoCivil::cases();

    }

}