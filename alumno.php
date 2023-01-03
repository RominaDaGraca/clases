<?php
//Definición de la clase
class Alumno{
    //propiedad
    public ?string $nombre;
    public int $edad;

    //constructor dentro de nuestra clase Alumno y se identifica con _ _
    function __construct($nombre,$edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    //método get para leer la propiedad
    public function getNombre(){
        return $this->nombre;
        
    }
    //el metodo set es el nombre que le se da para escribir o modificar la propiedad 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
}


?>