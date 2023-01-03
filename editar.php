<?php
include("config.php");
include("profesor.php");
include("bbdd.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $profesor = cargarProfesor($id,$servername, $username, $password, $database);
}else{    
    header("Location:./");
}

if(isset($_POST["nombre"])){
    $id=$_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $edad=$_POST["edad"];
    $curso=$_POST["curso"];
    $profesor = new Profesor($nombre, $apellidos, $edad, $curso);
    $profesor->id = $id;
   
    actualizarProfesor($profesor, $servername, $username, $password, $database);
    header("Location:./");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <form action="" method="post">
    <input type="hidden" name="id" value=<?php echo $profesor->id;?>>
    <label for=""> Nombre: </label>    
    <input type="text" required name="nombre" value='<?php echo $profesor->getNombre();?>'>
    <label for="">Apellido: </label>
    <input type="text" required name="apellidos" value='<?php echo $profesor->apellidos;?>'  >
    <label for="">Edad: </label>
    <input type="number" required name="edad" value=<?php echo $profesor->edad;?> >
    <label for="">Curso</label>
    <select name="curso" >
            <option <?php echo $profesor->curso=='html'?'selected':'';?> value="html">Curso HTML</option>
            <option <?php echo$profesor->curso=='css'?'selected':'';?> value="css">Curso CSS</option>
            <option <?php echo $profesor->curso=='js'?'selected':'';?> value="js">Curso JS</option>    
    </select>
    <input type="submit" value="Editar Profesor" id="submit">

    </form>
    </body>
</html>
