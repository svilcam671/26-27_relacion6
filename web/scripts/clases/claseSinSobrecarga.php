<?php 

/**
 * Clase sin sobrecarga
 */
class claseSinSobrecarga{


    public int $numero = 10;


    // metodos magicos para control de la sobrecarga
    public function __set($name, $value): void{
        throw new \Exception('La propiedad $name no existe');
        ;
    }

    public function __get($name): mixed{
        //throw new \Exception('Not implemented');
        return null;
    }
    
    public function __isset($name): bool{
        
        return false;
    }

    public function __unset($name): void {
        //throw new \Exception('Not implemented');
        ;
    }


}