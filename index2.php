<?php
//Incluir el archivo alumno en este archivo index para trabajar con la clase
include("alumno.php");
include("profesor.php");

$profesor = new Profesor("juan","martinez", 35, "PHP");
$profesor2 = new Profesor('maria', 'fernandez', 45, "programacion");
$person = new Persona("Lucia", "Gonzalez", 23);
var_dump($profesor);
echo "<br>";
var_dump(Persona::$contador);
echo "<br>";
var_dump($person);
echo "<br>";
var_dump(persona::getContador());


//crear o declarar una variable que guarda un objeto con la clase ya creada en alumno.php
//$alumno1 = new Alumno("Cintia",34);
//$alumno2 = new Alumno("Romina", 33);

// Se realiza un var_dump que es como un console.log para comprobar que funciona
//var_dump($alumno1);
//var_dump($alumno2);

//como acceder a un metodo de la clase ->getNombre(). ->getEdad()
//var_dump($alumno1->getNombre());
//var_dump($alumno1->getEdad());

//Se puede acceder a la propiedad nombre (porque la propiedad es publica si estuviera private no se podria acceder)
//var_dump($alumno1->nombre); 

?>
