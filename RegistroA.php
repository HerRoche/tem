<?php
session_start();
require 'db/connect.php';

//Almacena datos del formulario html  
$idAdministrador = $_POST['idAdministrador'];
$Primer_Nombre = $_POST['Primer_Nombre'];
$Primer_Apellido = $_POST['Primer_Apellido'];
$user = $_POST['useradmin'];
$pass_admin = $_POST['pass_admin'];

//Consulta para insertar
$insertar = "INSERT INTO administrador(idAdministrador, Primer_Nombre, Primer_Apellido, useradmin, pass_admin) VALUES('$idAdministrador','$Primer_Nombre','$Primer_Apellido','$user','$pass_admin')";

$verificar_usuario = mysqli_query($db, "SELECT *FROM administrador WHERE idAdministrador = '$idAdministrador'");

if(mysqli_num_rows($verificar_usuario) > 0){
    echo'<script>
        alert("El usuario ya esta registrado!");
        window.history.go(-1);
    </script>';
    exit;
}

$verificar_admin = mysqli_query($db, "SELECT *FROM administrador WHERE useradmin = '$user'");

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