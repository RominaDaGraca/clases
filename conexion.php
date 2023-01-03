<?php
$servername = "localhost";
$database = "academia";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
//INSERT INTO para insertar datos en la columna de base de datos
//los valores tienen que coincidir con lo que te pide la columna
/*$sql = "INSERT INTO profesores (Nombre, Apellido, Edad, Curso)
VALUES ('Romina', 'Da Graca', 34 ,'HTML')";*/

//Para actualizar los datos en la base de datos UPDATE
//$sql_update = "UPDATE `profesores` SET `Nombre` = 'Lorena' WHERE `profesores`.`id` = 5";

//Eliminar datos de la base 
//$sql_delete = "DELETE FROM profesores WHERE id=8";

/*if (mysqli_query($conn, $sql_select)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

//Seleccion de la base de datos 
$sql_select = "SELECT * FROM profesores";
$resultado = mysqli_query($conn, $sql_select);
//var_dump($resultado);
//echo "<br>";
$row = mysqli_fetch_array($resultado);
//var_dump($row);
if (mysqli_num_rows($resultado) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($resultado)) {
    echo "id: " . $row["id"]. " - Nombre: " . $row["Nombre"]. " " . $row["Apellido"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?>