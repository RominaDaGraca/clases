<?php
//Definimos la clase persona
class Persona{
    public string $nombre;
    public string $apellidos;
    public int $edad;
    public static $contador=1; 
    public int $id;
//Constructor dentro de la clase Persona
    function __construct($nombre, $apellidos, $edad){
        $this->nombre = $nombre; //THIS significa este objeto
        $this->apellidos=$apellidos;
        $this->edad=$edad;
        $this-> id = self::$contador;
        self::$contador++; //SELF significa el nombre de la clase 
    }

    static function getContador(){
        return "El numero de persona es  " . self::$contador - 1;
    }
}


?>