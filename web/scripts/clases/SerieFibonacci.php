<?php 

/**
 * 
 * Clase SerieFibonacci que implementa la interfaz iterator y que calcula el valor de la serie de fibonacci hasta el limite indicado
 */
class SerieFibonacci implements Iterator {

    // Variables de instancia para controlar el iterator
    private int $_limite;
    private int $_claveActual = 0;

    /**
     * Constructor publico que recibe por parametro el limite
     * @param int $limite
     * @throws Exception
     */
    public function __construct(int $limite) {

        if ($limite < 0) {
            throw new Exception("El limite no puede ser un valor negativo");
        }

        $this->_limite = $limite;   

    }

    /**
     * Metodo que calcular la serie de fibonacci utilizando un generator. Comprueba que el valor dado como tope sea positivo y si no da una excepcion
     * @param int $ultimo recibe el valor de hasta que numero avanzar
     * @throws Exception lanza una excepcion si se indica un numero negativo
     * @return Generator<mixed, float|int, mixed, void> Devuelve el objeto generator para la serie de fibonacci
     */
    public static function fFibonacci(int $ultimo): Generator {
        if ($ultimo < 0) {
            throw new Exception("No se puede indicar un numero negativo");
        
        }
    
        $raiz5 = sqrt(5);
        $n1 = (1+$raiz5) / 2;
        $n2 = (1-$raiz5) / 2;

        for ($i = 0; $i <= $ultimo; $i++) {

            $valor = (1/$raiz5) * ($n1 ** $i - $n2 ** $i);
            yield (int) round($valor);
        }
    }

    /**
     * Implementacion del metodo current que calcula el valor de la serie de fibonacci para la clave actual y lo devuelve
     * @return int devuelve el valor de la serie actual
     */
    public function current(): mixed {
    
        $raiz5 = sqrt(5);
        $n1 = (1+$raiz5) / 2;
        $n2 = (1-$raiz5) / 2;

        $valor = (1/$raiz5) * ($n1 ** $this->_claveActual - $n2 ** $this->_claveActual);


        return (int) round($valor);
    }

    /**
     * Implementacion del metodo key que devuelve el valor de la clave actual
     * @return int devuelve el valor de la clave actual
     */
    public function key(): mixed {

        return $this->_claveActual;
    }

    /**
     * Implementacion del metodo next que avanza la clave actual a la siguiente
     * @return void
     */
    public function next(): void {
        $this->_claveActual++;
    }

    /**
     * Implementacion del metodo rewind que vuelve a establecer la clave actual a 0
     * @return void
     */
    public function rewind(): void {
        $this->_claveActual = 0;
    }
    
    /**
     * Implementacion del metodo valid que devuelve un boolean si se cumplen las condiciones para avanzar en el iterator
     * @return bool devuelve true si la clave actual es menor o igual al limite establecido
     */
    public function valid(): bool{

        return $this->_claveActual <= $this->_limite;
        
    }

    /**
     * Metodo magico get que es llamado de forma automatica cuando se quiere obtener informacion sobre una variable, exista o no, del objeto. 
     * La redefinimos para que su uso quede deshabilitado devolviendo un error.
     * @param string $name
     * @return mixed
     */
    public function __get(string $name):mixed {
        throw new Exception("No existe la propiedad $name");
    }

    /**
     * Metodo magico set que es llamado de forma automatica cuando se quiere asignar valor a una variable de la clase exista o no.
     * La redefinimos para que su uso quede deshabilitado devolviendo un error.
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value):void {
        throw new Exception("No existe la propiedad $name por lo que no se puede asignar el valor");
    }

    /**
     * Metodo isset que comprueba si existe una variable en el objeto o no. Devolvemos false para deshabilitarla.
     *
     * @param string $name
     * @return boolean
     */
    public function __isset(string $name):bool {
        return false;
    }

    /**
     * Metodo unset magico que quita el valor de una variable. Devolvemos un mensaje de error para deshabilitarla.
     *
     * @param string $name
     * @return void
     */
    public function __unset(string $name):void {
        throw new Exception("No existe la propiedad $name");
    }

}