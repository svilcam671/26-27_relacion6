<?php 

final class muebleTradicional extends muebleBase {

    // propiedades privadas de la instancia
    private float $_peso;
    private string $_serie;
    
    /**
     * Constructor que recibe los valores para crear los muebles tradicionales. LLamara al constructor de la clase padre.
     *
     * @param string $nombre Cadena con el nombre del mueble, no puede estar vacio ni tener mas de 40 caracteres, si no se lanza una excepcion.
     * @param string $fabricante Cadena con el fabricante, valor por defecto FaMu: y si no lo tiene se le añade a la cadena dada, ademas se recorta a 30 caracteres
     * @param string $pais cadena con el pais, maximo 20 caracteres y valor por defecto ESPAÑA
     * @param integer $anio numero entero comprendido entre 2020 y el año actual. Valor por defecto 2020.
     * @param string $fechaIniVenta cadena con la fecha de inicio de venta que no puede ser anterior al 1 de enero del año de fabricacion, valor por defecto 01/01/2020
     * @param string $fechaFinVenta cadena con la fecha de fin de venta que no puede ser anterior a la fecha de inicio de venta, valor por defecto 31/12/2040
     * @param float $precio real con valor por defecto 30, no puede ser inferior a 30.
     * @param float $peso real con valor por defecto 15, que indica el peso que debe estar comprendido entre 15 y 300
     * @param string $serie cadena que indica la serie, valor por defecto S01
     */
    public function __construct(string $nombre, string $fabricante = "FaMu:", string $pais = "ESPAÑA", int $anio = 2020, string $fechaIniVenta = "01/01/2020", string $fechaFinVenta = "31/12/2040", float $precio = 30, float $peso = 15, string $serie = "S01"){
        parent::__construct($nombre, $fabricante, $pais, $anio, $fechaIniVenta, $fechaFinVenta, $precio);

        if (!$this->setPeso($peso)) {
            $this->setPeso(15);
        }

        if (!$this->setSerie($serie)) {
            $this->setSerie("S01");
        }
            
    }


    /**
     * Metodo que devolvera un array con el nombre de las propiedades adicionales a la clase base
     *
     * @return array
     */
    public function damePropiedadesAdicionales(): array {

        return ["Peso", "Serie"];
    }

    /**
     * Redefinicion de toString que devuelve una cadena con informacion del mueble
     *
     * @return string devuelve una cadena con informacion del mueble
     */
    public function __toString(): string
    {
        return parent::__toString().", peso ".$this->getPeso().", serie ".$this->getSerie();
    }

    // Metodos getter y setter para obtener el valor y establecerlo en las propiedades
    public function getPeso(): float {
        return $this->_peso;
    }

    public function setPeso(float $_peso): bool {

        $correcto = false;

        if (validaReal($_peso, 15, 300, 15)) {
            $this->_peso = $_peso;
            $correcto = true;
        }

        return $correcto;

    }

    public function getSerie(): string {
        return $this->_serie;
    }

    public function setSerie(string $_serie): bool {
        
        $this->_serie = $_serie;

        return true;

    }
}