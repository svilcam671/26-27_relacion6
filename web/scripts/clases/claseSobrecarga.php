<?php 

/**
 * Clase sobrecarga con el siguiente comportamiento
 * - Si la propiedad empieza por m la doy por buena
 * - una propiedad sobrecargada siempre tendra el valor 224
 */
class claseSobrecarga{


    public int $numero = 10;


    // metodos magicos para control de la sobrecarga
    public function __set($name, $value): void{
        throw new \Exception("La propiedad $name no existe");
        ;
    }

    public function __get($name): mixed{

        if (mb_substr(mb_strtoupper($name), 0, 1) === "M") {

            return 234;

        }
        else {
            throw new \Exception("La propiedad $name no existe");
        }

        
    }
    
    public function __isset($name): bool{
        
        return (mb_substr(mb_strtoupper($name), 0, 1) === "M");
    }

    public function __unset($name): void {
        throw new \Exception("La propiedad $name no existe");
        ;
    }


}