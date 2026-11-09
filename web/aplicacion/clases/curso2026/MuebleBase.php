<?php

abstract class MuebleBase{

    public final int $MAXIMO_MUEBLES;
    private static int $mueblesCreados;

    private string $Nombre;
    private string $Fabricante;
    private string $Pais;
    private int $Anio;
    private string $FechaIniVenta;
    private string $FechaFinVenta;
    private float $Precio;

    public function __construct(){
        
    }

	public function getNombre() : string {
		return $this->Nombre;
	}

	public function setNombre(string $value):bool {

        $correcto = false;
    
        if (validaCadena($value, 40, "")) {
            $correcto = true;
        }

        if ($correcto) {
            $this->Nombre = strtoupper($value);
        }
        
        return $correcto;

	}

	public function getFabricante() : string {
		return $this->Fabricante;
	}

	public function setFabricante(string $value):bool {
		
        $correcto = false;

        validaExpresion($value,'/^(FaMu){1}[a-z]+$/',"FaMu$value");

        if (validaCadena($value, 30, str_split($value,30)[0])) {

            $correcto = true;
        }

        if ($correcto) {
            $this->Fabricante = $value;
        }
       
        return $correcto;
	}

	public function getPais() : string {
		return $this->Pais;
	}

	public function setPais(string $value):bool {
		
        $correcto = false;

        if (validaCadena($value, 20, "ESPAÑA")) {
            $correcto = true;
        }

        if ($correcto) {
            $this->Pais = $value;
        }

	}

	public function getAnio() : int {
		return $this->Anio;
	}

	public function setAnio(int $value):bool {
		
        $correcto = false;
        $fecha = date('Y');

        if (validaEntero($value, 2020, $fecha, 2020)) {
            $correcto = true;
        }

        if ($correcto) {
            $this->Anio = $value;
        }

        return $correcto;

	}

	public function getFechaIniVenta() : string {
		return $this->FechaIniVenta;
	}

	public function setFechaIniVenta(string $value):bool {
		
        
    

	}

	public function getFechaFinVenta() : string {
		return $this->FechaFinVenta;
	}

	public function setFechaFinVenta(string $value):bool {
		$this->FechaFinVenta = $value;
	}

	public function getPrecio() : float {
		return $this->Precio;
	}

	public function setPrecio(float $value):bool {
		$this->Precio = $value;
	}
}