<?php

/**
 * Interfaz IFabricable que tiene definidos dos metodos para redefinir en las clases que la implementen.
 * Tiene el metodoFabricacion y metodoReciclado que devuelven un string con los pasos de los procesos
 */
interface IFabricable {

    /**
     * Metodo que devuelve los pasos para la fabricacion de un instrumento
     *
     * @return string devuelve una cadena con los pasos para la fabricacion de un instrumento
     */
    public function metodoFabricacion() : string;

    /**
     * Metodo que devuelve los pasos para el reciclado que se debe hacer de un instrumento segun su fabricacion
     *
     * @return string devuelve una cadena con los pasos del reciclado.
     */
    public function metodoReciclado(): string;



}