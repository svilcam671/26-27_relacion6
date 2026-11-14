<?php

final class muebleReciclado extends muebleBase {

    // propiedades privadas de la instancia
    private int $_porcentajeReciclado;

    /**
     * Constructor que recibe los valores para crear los muebles reciclados. LLamara al constructor de la clase padre.
     *
     * @param string $nombre Cadena con el nombre del mueble, no puede estar vacio ni tener mas de 40 caracteres, si no se lanza una excepcion.
     * @param string $fabricante Cadena con el fabricante, valor por defecto FaMu: y si no lo tiene se le añade a la cadena dada, ademas se recorta a 30 caracteres
     * @param string $pais cadena con el pais, maximo 20 caracteres y valor por defecto ESPAÑA
     * @param integer $anio numero entero comprendido entre 2020 y el año actual. Valor por defecto 2020.
     * @param string $fechaIniVenta cadena con la fecha de inicio de venta que no puede ser anterior al 1 de enero del año de fabricacion, valor por defecto 01/01/2020
     * @param string $fechaFinVenta cadena con la fecha de fin de venta que no puede ser anterior a la fecha de inicio de venta, valor por defecto 31/12/2040
     * @param float $precio real con valor por defecto 30, no puede ser inferior a 30.
     * @param integer $porcentajeReciclado entero con valor por defecto 10, debe estar comprendido entre 0 y 100
     */
    public function __construct(string $nombre, string $fabricante = "FaMu:", string $pais = "ESPAÑA", int $anio = 2020, string $fechaIniVenta = "01/01/2020", string $fechaFinVenta = "31/12/2040", float $precio = 30, int $porcentajeReciclado = 10){
        
        parent::__construct($nombre, $fabricante, $pais, $anio, $fechaIniVenta, $fechaFinVenta, $precio);
        
        if (!$this->setPorcentajeReciclado($porcentajeReciclado)) {
            $this->setPorcentajeReciclado(10);
        }

    }


    /**
     * Metodo que devolvera un array con el nombre de las propiedades adicionales a la clase base
     *
     * @return array
     */
    public function damePropiedadesAdicionales(): array {

        return ["PorcentajeReciclado"];
    }

    /**
     * Redefinicion de toString que devuelve una cadena con informacion del mueble
     *
     * @return string devuelve una cadena con informacion del mueble
     */
    public function __toString(): string{
        return parent::__toString().", porcentaje de reciclado ".$this->getPorcentajeReciclado()."%";
    }

    // Metodos getter y setter para obtener el valor y establecerlo en las propiedades
    public function getPorcentajeReciclado(): int {
        return $this->_porcentajeReciclado;
    }

    public function setPorcentajeReciclado(int $_porcentajeReciclado): bool {
        
        $correcto = false;

        if (validaEntero($_porcentajeReciclado, 0, 100, 10)) {

            $this->_porcentajeReciclado = $_porcentajeReciclado;
            $correcto = true;
        }


        return $correcto;
    }
}