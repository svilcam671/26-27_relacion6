<?php
namespace VALNORMAL;

/**
 * 
 * Funcion para validar que un numero entero pasado como variable por referencia sea correcto o no. Es correcto si esta comprendido entre los valores minimo y maximo indicados, en cuyo caso se devolvera true.
 * En caso contrario se devolvera false y se asignara como valor a la variable el valor por defecto que llega a la funcion.
 * @param int $var variable pasada por referencia que contiene un numero con el que comprobaremos si es correcto, en caso contrario se reasignara con el valor por defecto
 * @param int $min valor minimo del rango para comprobar si el numero que contiene la variable pasada por referencia es correcto o no
 * @param int $max valor maximo del rango para comprobar si el numero que contiene la variable pasada por referencia es correcto o no
 * @param int $defecto valor por defecto que tomara la variable pasada por referencia en caso de que no cumpla la condicion de estar en el rango entre el valor minimo y maximo
 * @return bool devuelve true si el valor numerico de la variable pasada por referencia esta comprendido dentro del rango del minimo y maximo y false en caso contrario
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool {

    $correcto = false;
    
    if ($var >= $min && $var <= $max) {
        $correcto = true;
    }
    else {
        $var = $defecto;

    }
    return $correcto;
}

/**
 * 
 * Funcion para validar que un numero real pasado como variable por referencia sea correcto o no. Es correcto si esta comprendido entre los valores minimo y maximo indicados, en cuyo caso se devolvera true.
 * En caso contrario se devolvera false y se asignara como valor a la variable el valor por defecto que llega a la funcion.
 * @param float $var variable pasada por referencia que contiene un numero con el que comprobaremos si es correcto, en caso contrario se reasignara con el valor por defecto
 * @param float $min valor minimo del rango para comprobar si el numero que contiene la variable pasada por referencia es correcto o no
 * @param float $max valor maximo del rango para comprobar si el numero que contiene la variable pasada por referencia es correcto o no
 * @param float $defecto valor por defecto que tomara la variable pasada por referencia en caso de que no cumpla la condicion de estar en el rango entre el valor minimo y maximo
 * @return bool devuelve true si el valor numerico de la variable pasada por referencia esta comprendido dentro del rango del minimo y maximo y false en caso contrario
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool {

    $correcto = false;
    
    if ($var >= $min && $var <= $max) {
        $correcto = true;
    }
    else {
        $var = $defecto;

    }
    return $correcto;

}

/**
 * Funcion para validar una fecha. Se comprobara que la fecha indicada cumpla un patron con una expresion regular y ademas comprobara que, aunque l fecha
 * cumpla el formato, sea una fecha valida. En caso de que sea correcto se devuelve valor true y se sanea la fecha para que tenga un el formato correcto.
 * En caso contrario se devuelve el valor por defecto y false.
 * @param string $var Se recibe la fecha que se va a validar y sanear en una variable pasada por referencia
 * @param string $defecto En caso de que no sea una fecha valida se le asigna el valor por defecto
 * @return bool Se devuelve true si la fecha es valida, en caso contario se devuelve false
 */
function validaFecha(string &$var, string $defecto):bool {
    
    $correcto = false;

    if ((preg_match("/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/", $var, $matches)) && (checkdate(intval($matches[2]), intval($matches[1]), intval($matches[3])))) {

        $correcto = true;
            
        $var = sprintf("%02d/%02d/%04d", $matches[1], $matches[2], $matches[3]);
    
    }
    else {
        $var = $defecto;
    }

    return $correcto;
}

/**
 * Funcion para validar una hora en formato HH:mm:ss mediante una expresion regular. En caso de ser una hora valida se devuelve saneada en la variable pasada por referencia y un true.
 * En caso contrario se devuelve una hora por defecto en la variable y false.
 * @param string $var Hora guardada en una variable pasada por referencia
 * @param string $defecto Hora por defecto en caso de que la hora dada no sea correcta
 * @return bool se devuelve true si la hora dada es valida, en caso contrario se devolvera false
 */
function validaHora(string &$var, string $defecto):bool { 

    $correcto = false;

    if (preg_match("/^([01]?\d|2[0-3]):([0-5]?\d):([0-5]?\d)$/", $var, $matches)) {

        $correcto = true;
            
        $var = sprintf("%02d:%02d:%02d", $matches[1], $matches[2], $matches[3]);
    
    }
    else {
        $var = $defecto;
    }

    return $correcto;

}

/**
 * Funcion que valida una direccion de correo electronico para que cumpla el formato "aaaaa@bbbb.ccc". En caso de que sea correcta devuelve la direccion de correo en minusculas,
 * por el contrario, si no es valida, se devuelve el valor por defecto.
 *
 * @param string $var recibe un string con el correo electronico a validad
 * @param string $defecto valor por defecto en caso de que la direccion no cumpla el formato
 * @return boolean devuelve true si el correo es valido y false en caso contrario
 */
function validaEmail(string &$var, string $defecto):bool {

    $correcto = false;

    if (preg_match("/^[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]+$/", $var)) {

        $correcto = true;

        $var = mb_strtolower($var);
    
    }
    else {
        $var = $defecto;
    }

    return $correcto;
}

/**
 * Funcion que comprueba si una cadena pasada como variable por referencia es de una longitud como maxima indicada en el parametro longitud. En caso de ser menor o igual
 * se devuelve true, de lo contrario se devuelve false
 *
 * @param string $var cadena pasada como variable por referencia
 * @param integer $longitud longitud maxima que puede tener la cadena
 * @param string $defecto valor por defecto que se asigna en caso de que la cadena exceda el limite
 * @return boolean se devuelve true si la cadena es de longitud menor o igual al maximo indicado, false en caso contrario
 */
function validaCadena(string &$var, int $longitud, string $defecto):bool {

    $correcto = false;

    if (mb_strlen($var) <= $longitud) {

        $correcto = true;
    
    }
    else {
        $var = $defecto;
    }

    return $correcto;
}

/**
 * Funcion que valida una cadena pasada como variable por referencia en base a la expresion indicada. En caso de que la cumpla
 * se devolvera true, de lo contrario se asignara el valor por defecto como valor a la variable por referencia y se devolvera false.
 * @param string $var variable pasada por referencia que contiene una cadena de texto
 * @param string $expresion expresion dada para comprobar si la cadena la cumple
 * @param string $defecto valor por defecto para asignar en caso de que no se cumpla la expresion
 * @return bool se devuelve true si la cadena cumple la expresion indicada y false en caso contrario
 */
function validaExpresion(string &$var, string $expresion, string $defecto):bool {

    $correcto = false;

    if (preg_match($expresion, $var)) {

        $correcto = true;
    
    }
    else {
        $var = $defecto;
    }

    return $correcto;

}

/**
 * Funcion que segun el tipo indicado comprueba que el valor pasado sea una clave o un valor dentro del array dado.
 * Devuelve true si corresponde a una clave o valor y false en caso contrario
 * @param mixed $var valor pasado para buscar en el array
 * @param array $posibles array con clave y valor donde buscaremos el valor dado
 * @param int $tipo tipo 1 indica si vamos a comprobar que sea un valor del array, tipo 2 indica si es una clave del array
 * @return bool devuelve true si el valor es una clave o valor segun el tipo indicado, false en caso contrario
 */
function validaRango(mixed $var, array $posibles, int $tipo=1):bool { 

    $correcto = false;

    if ($tipo === 1 && in_array($var, $posibles)) {
    
        $correcto = true;
    
    }
    else if ($tipo === 2 && array_key_exists($var, $posibles)) {
        
        $correcto = true;
    
    }

    return $correcto;
}