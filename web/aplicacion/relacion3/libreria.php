<?php

/**
 * Función que recibe un array, una cadena, un numero y un contador. Añade al array en la posicion indicada en la cadena el número. Cada vez que se llame a la función se devuelve en el contador el numero de llamada actual.
 *
 * @param array $array El array que llega como parametro donde se añadira el numero en la posicion indicada
 * @param string $cadena La cadena que indica la posicion del array donde ira el primer numero
 * @param integer $num1 El numero que se asignara a la posicion indicada por la cadena en el array
 * @param integer $num2 Variable donde se devolvera el numero de la llamada actual
 * @return boolean Devuelve true si se ha añadido de forma correcta, en caso de que no se cumplan las condiciones devuelve false
 */
function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2): bool {

    // variable static que mantiene el valor
    static $cont = 0;
    $cont++;
    
    // Aunque la llamada sea invalida actualizo el contador de llamadas 
    $num2 = $cont;

    if ($cadena === "2daw" || $cadena === "primera" || $cadena === "") {
        return false;
    }

    $array[$cadena] = $num1;


    return true;

}

/**
 * Funcion que puede recibir por parametro un numero entero positivo y genera una cadena de caracteres aleatoria. Los caracteres validos que compondran
 * la cadena son mayusculas, minusculas y numeros.
 *
 * @param integer|null $num Puede recibir un numero para indicar la longitud de la cadena o si no se indica tendrá valor por defecto 10.
 * @return string|false Si todo va bien devuelve una cadena de la longitud indicada. En caso de indicar 0 o un numero negativo devuelve false.
 */
function generarCadena(?int $num = 10): string|false {

    // si me indican una longitud menor de 0 devuelvo un error
    if ($num <= 0) {
        return false;
    }

    // creo el array de caracteres validos que son A-Z, a-z y 0-9
    $caracteresValidos = array_merge(range('A','Z'),range('a','z'),range("0","9"));
    $cadena = "";

    // Con un bucle voy generando un caracter aleatorio y lo voy concatenando a la cadena
    for ($i = 0; $i < $num; $i++) {
            $cadena .= $caracteresValidos[mt_rand(0,count($caracteresValidos)-1)];
    }

    return $cadena;
}

/**
 * Funcion que recibe al menos tres parametros. El primero indica el tipo de operacion mientras que el resto son los operandos.
 * 1. Suma de todos los operandos
 * 2. Al primer operado se le resta el resto de operandos
 * 3. Multiplicacion de todos los operandos
 * Cualquier otro valor sumas las posiciones pares e impares y las resta
 *
 * @param integer $numOp Indica el tipo de operacion
 * @param integer $num1 primer operando
 * @param integer $num2 segundo operando
 * @param integer ...$resto resto de operandos si los hay
 * @return integer Devuelve el resultado de la operacion
 */
function operaciones(int $numOp, int $num1, int $num2, int ...$resto): int {

    $resultado = 0;

    // Si el operando es 1 hago la suma
    if ($numOp === 1) {

        // sumo los dos operandos fijos primero
        $resultado += $num1+$num2;

        // recorro el resto de parametros y se los sumo al resultado
        foreach($resto as $n) {
            $resultado += $n;
        }
    }
    // Si el operando es 2 hago la resta
    else if ($numOp === 2) {

        // primero resto el operando 2 al operando 1
        $resultado = $num1-$num2;

        // recorro el array y voy restando el resto de operandos
        foreach($resto as $n) {
            $resultado -= $n;
        }
    }
    // Si el operando es 3 hago la multiplicacion
    else if ($numOp === 3) {

        // multiplico los 2 operandos indicados
        $resultado = $num1*$num2;

        // recorro el array y voy multiplicando
        foreach($resto as $n) {
            $resultado = $resultado*$n;
        }
    }
    else {

        // variable para sumar pares, impares y un contador
        $pares = $num2;
        $impares = $num1;
        $cont = 1;

        // recorro el array y voy sumando pares e impares
        foreach($resto as $n) {
            
            if ($cont%2==0) {
                $pares+=$n;
            }
            else {
                $impares+=$n;
            }
            $cont++;
        }

        // resto a los pares los impares
        $resultado = $pares-$impares;

    }
    return $resultado;
}

/**
 * Funcion que devuelve el producto de los 3 parametros que recibe. Siendo el primero la suma de los 3
 * El segundo y tercer parametro son opcionales, si no se indican valdran 4 y 10 respectivamente.
 *
 * @param integer $num1 Primer parametro que tiene que ser un entero y que posteriormente sera la suma de los 3 parametros
 * @param integer|null $num2 segundo parametro opcional con valor por defecto 4
 * @param integer|null $num3 tercer parametro opcional con valor por defecto 10
 * @return integer devuelve el producto de los tres paremetros
 */
function devuelve(int &$num1, ?int $num2 = 4, ?int $num3 = 10):int{

    // calculo el productor de los tres parametros
    $producto = $num1*$num2*$num3;

    // guardo en el primer parametro el resultado de la suma de los tres parametros
    $num1 = $num1+$num2+$num3;

    return $producto;
}

/**
 * Función que recibe dos numeros enteros y realiza la suma de ambos
 * @param integer $n1 recibe como primer parametro un numero entero
 * @param integer $n2 recibe como segundo parametro otro numero entero
 * @return void devuelve la suma de ambos numeros enteros recibidos
 */
function suma(int $n1, int $n2): int {
    return $n1 + $n2;
}

/**
 * Funcion que recibe como parametros dos numeros enteros y realiza la resta de ambos
 * @param integer $n1 recibe como primer parametro un numero entero
 * @param integer $n2 recibe como segundo parametro otro numero entero
 * @return void devuelve la resta de ambos numeros enteros recibidos
 */
function resta(int $n1, int $n2): int {
    return $n1 - $n2;
}

/**
 * Funcion que recibe como parametros dos numeros enteros y realiza el producto de ambos
 * @param integer $n1 recibe como primer parametro un numero entero
 * @param integer $n2 recibe como segundo parametro otro numero entero
 * @return void devuelve el producto de ambos numeros enteros recibidos
 */
function multiplicacion(int $n1, int $n2): int {
    return $n1 * $n2;
}

/**
 * Funcion que recibe como parametros un string y dos numeros enteros. El string indica el tipo de
 * operación que se va a realizar con los dos numeros enteros como operandos. Devuelve el resultado si 
 * la operación indicada es correcta o false si hay algun problema.
 * @param string $tipo se recibe como primer parametro un string que indica el tipo de operacion a realizar llamando a una funcion con el mismo nombre
 * @param integer $n1 recibe como segundo parametro un numero entero
 * @param integer $n2 recibe como tercer parametro otro numero entero
 * @return integer false Devuelve un numero entero resultado de la operacion indicada o false si ha ocurrido algun problema
 */
function hacerOperacion(string $tipo, int $n1, int $n2):int | false {

    if (in_array($tipo,["suma", "resta", "multiplicacion"])) {
        return $tipo($n1,$n2);
    }
    
    return false;

}

/**
 * Funcion que recibe como parametros dos numeros enteros y una funcion callable. Pasa como argumentos
 * a la funcion los dos numeros enteros y devuelve el resultado.
 * @param integer $n1 recibe como primer parametro un numero entero
 * @param integer $n2 recibe como segundo parametro otro numero entero
 * @param callable $oper como tercer parametro recibe una funcion callable a la que se le pasaran los otros parametros como argumentos para realizar la operacion
 * @return integer devuelve un numero entero con el resultado de funcion que se pasa como tercer parametro
 */
function llamadaAFuncion(int $n1, int $n2, callable $oper):int {

    return $oper($n1,$n2);
}


/**
 * Funcion que recibe como parametro un array y lo ordena de forma descendente segun el numero de 
 * caracteres de cada elemento del array. Internamente llamara a usort y se le pasara como argumento el array y
 * un callback de una funcion anonima para la comparación del numero de caracteres.
 *
 * @param array $array recibe como parametro un array que contiene cadenas de caracteres 
 * @return bool devuelve true si se ha ordenado correctamente o false si ha ocurrido algun problema.
 */
function ordenar(array &$array):bool {

   $comprobacion = true;

    if (count($array) <= 0) {
        $comprobacion = false;
    }
    else {
        foreach ($array as $element) {

            if (!is_string($element)) {
                $comprobacion = false;
            }
        }
    }
    
    if ($comprobacion) {
        usort($array, function ($a, $b) {
            return mb_strlen($b) <=> mb_strlen($a);
        });
    }

    return $comprobacion;
}
