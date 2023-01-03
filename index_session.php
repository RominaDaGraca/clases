<?php
include("profesor.php");
session_start();
//var_dump($_POST);
if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $curso = $_POST["curso"];
    $profesor = new Profesor($nombre, $apellidos, $edad, $curso);
    
    if(isset($_SESSION["profesores"])){
        $contador = $_SESSION["contador"];
        $contador++;
        $profesor->id = $contador;
        $_SESSION["contador"] = $contador;
        array_push($_SESSION["profesores"],$profesor);
    }else{
        $_SESSION["profesores"]= array();
        $_SESSION["contador"] = 1;
        $profesor->id = 1;
        array_push($_SESSION["profesores"],$profesor);
    }
    
}
if(isset($_SESSION["profesores"])){
    $profesores = $_SESSION["profesores"];
    var_dump($_SESSION["profesores"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Profesores</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <form action="" method="POST">
    <label for="">Nombre: </label>    
    <input type="text" required name="nombre" placeholder="Introduzca Nombre .." id="">
    <label for="">Apellido: </label>
    <input type="text" required name="apellidos" placeholder="Introduzca Apellido.." id="">
    <label for="">Edad: </label>
    <input type="number" required name="edad" placeholder="Introducir Edad" id="">
    <label for="">Curso</label>
    <select name="curso" id="">
            <option value="html">Curso HTML</option>
            <option value="css">Curso CSS</option>
            <option value="js">Curso JS</option>    
    </select>
    <input type="submit" value="Registrar Profesor" id="submit">

    </form>
<hr>
    <div>
        <h3>Listado Profesores</h3>
        <table> 
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Curso</th>
                <th>Operaciones</th>
            </thead>
            <tbody>
                <?php
                if (isset($profesores)) { 
                    foreach ($profesores as $key => $profesor) {
                        //var_dump($profesor);
                        //echo "<br>";
                        echo "<tr><td>".$profesor->getNombre()."</td><td>".$profesor->apellidos."</td><td>".$profesor->edad."</td><td>".$profesor->curso."</td><td><a href='borrar.php? id=".$profesor->id."'><i class='fa-solid fa-trash'></i></a></td></tr>";
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    
</body>
</html>