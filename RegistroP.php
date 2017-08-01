<?php
require 'db/connect.php';
session_start();

if(isset($_SESSION['user'])){
//Almacena datos del formulario html  
$No_boleta = $_POST["No_boleta"];
$Banco = $_POST["Banco"];
$Mes = $_POST["Mes"];
$Fecha_Pago = $_POST["Fecha_Pago"];
$Monto = $_POST["Monto"];
$E_Carnet = $_POST["E_Carnet"];

//Consulta para insertar
$insertar = "INSERT INTO pago(No_boleta, Banco, Mes, Fecha_Pago, Monto, E_Carnet) VALUES('$No_boleta','$Banco','$Mes','$Fecha_Pago','$Monto','$E_Carnet')";

$verificar_boleta = mysqli_query($db, "SELECT * FROM pago WHERE No_boleta = '$No_boleta'");

if(mysqli_num_rows($verificar_boleta) > 0){
    echo'<script>
        alert("Boleta se encuentra registrada");
        window.history.go(-1);
    </script>';
    exit;
}

$verificar_mes = mysqli_query($db, "SELECT *FROM pago WHERE E_Carnet = '$E_Carnet' AND Mes = '$Mes'");

if(mysqli_num_rows($verificar_mes) > 0){
    echo'<script>
        alert("El mes esta cancelado!");
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
    echo'<script> alert("Registro realizado con exito")
    window.history.go(-1);
    </script>';
    exit;
}

mysqli_close($db); 
    }else{
    echo'<script> window.location="login.php";</script>';
    }

    $profile = $_SESSION['USER'];
?>