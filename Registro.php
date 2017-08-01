<?php
session_start();
require 'db/connect.php';

//Almacena datos del formulario html  
$Carnet = $_POST['Carnet'];
$PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'];
$SEGUNDO_NOMBRE = $_POST['SEGUNDO_NOMBRE'];
$PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'];
$SEGUNDO_APELLIDO = $_POST['SEGUNDO_APELLIDO'];
$FACULTAD = $_POST['FACULTAD'];
$CICLO = $_POST['CICLO'];

//Consulta para insertar
$insertar = "INSERT INTO estudiante(Carnet, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, fk_idFacultad, Ciclo) VALUES('$Carnet','$PRIMER_NOMBRE','$SEGUNDO_NOMBRE','$PRIMER_APELLIDO','$SEGUNDO_APELLIDO','$FACULTAD','$CICLO')";

$verificar_usuario = mysqli_query($db, "SELECT *FROM estudiante WHERE Carnet = '$Carnet'");

if(mysqli_num_rows($verificar_usuario) > 0){
    echo'<script>
        alert("El usuario ya esta registrado!");
        window.history.go(-1);
    </script>';
    exit;
}

//Ejecuta consulta
$result = mysqli_query($db, $insertar);
if(!$result){
    echo '<script> alert("Error en la consulta!")
    window.history.go(-1);
    </script>';
    exit;
}
else{
    echo'<script> alert("Usuario registrado exitosamente")
    window.history.go(-1);
    </script>';
    exit;
}

mysqli_close($db);
?>