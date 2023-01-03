<?php
//para leer el archivo php
include("config.php");
include("bbdd.php");
include("profesor.php");
//abrir session
session_start();
if (isset($_GET["id"])) {
    borrarProfesor($_GET["id"],$servername, $username, $password, $database);
    header("Location: ./");
    /*if($_SESSION["profesores"]){
        $id = $_GET["id"];
        $profesores=$_SESSION["profesores"];
        foreach ($profesores as $key => $profesor) {
            //encontrar el id del profesor
            if ($profesor->id==$id) {
                unset($profesores[$key]);
                //se guarda en profesores
                $_SESSION["profesores"] = $profesores;
                //te redirige al index
                header("location:./");
            }
        }
    }else{
        header("location:./");
    }*/
   
}else{
    header("location:./");
}


?>