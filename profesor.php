<?php
include("personas.php");

//extends significa que hereda las propiedades que tiene la clase persona
class Profesor extends Persona{
    public string $curso;

    function __construct($nombre, $apellidos, $edad, $curso="")
    {
        parent::__construct($nombre, $apellidos, $edad);
        if($curso==NULL){
            $this->curso = "";
        }else{
            $this->curso=$curso; 
        }
       
    }
    public function getNombre(){
        return $this->nombre;
    }
}

?>