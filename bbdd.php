<?php
//crear una funcion para guardar en la base de datos
function guardarProfesor($profesor,$servername, $username, $password, $database)
{
   
    $conn = mysqli_connect($servername, $username, $password, $database);
    // lo primero que va a hacer la funcion es conectarme a la base de datos
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "insert into profesores
    (Nombre, Apellido, Edad, Curso)
    values ('".$profesor->nombre."',
    '".$profesor->apellidos."',
    ".$profesor->edad.",
    '".$profesor->curso."')";

    mysqli_query($conn, $sql);
    
    mysqli_close($conn);
}
function cargarDatos($servername, $username, $password, $database)
{
    $profesores = array();
   
    $conn = mysqli_connect($servername, $username, $password, $database);
    // lo primero que va a hacer la funcion es conectarme a la base de datos
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //seleccion toda la tabla de profesores
    $sql = "SELECT * FROM profesores";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
        while ($row = mysqli_fetch_assoc($result)) {
            $profesor = new Profesor($row["Nombre"], $row["Apellido"], $row["Edad"], $row["Curso"]);
            $profesor->id= $row["id"];
            array_push($profesores, $profesor);
        }
        mysqli_close($conn);
        
    }
    return $profesores;
}
function borrarProfesor($id,$servername, $username, $password, $database){

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "delete from profesores where id=".$id."";

    mysqli_query($conn, $sql);

    mysqli_close($conn);
}
function cargarProfesor($id,$servername, $username, $password, $database)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    // lo primero que va a hacer la funcion es conectarme a la base de datos
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM profesores where id=".$id;
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $profesor = new Profesor($row["Nombre"], $row["Apellido"], $row["Edad"], $row["Curso"]);
        $profesor->id = $row["id"];
        mysqli_close($conn);
        return $profesor;

    }else{
        mysqli_close($conn);
        return null;
    }

}
function actualizarProfesor($profesor, $servername, $username, $password, $database){
    $conn = mysqli_connect($servername, $username, $password, $database);
    // lo primero que va a hacer la funcion es conectarme a la base de datos
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "update profesores set
    Nombre='".$profesor->getNombre()."',
    Apellido='".$profesor->apellidos."', 
    Edad=".$profesor->edad.",
    Curso='".$profesor->curso."', where id=".$profesor->id;

    mysqli_query($conn, $sql);
    
    mysqli_close($conn);
}

?>