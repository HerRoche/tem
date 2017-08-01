<?php 
session_start();
require 'db/connect.php';

$useradmin = $_POST['useradmin'];
$pass_admin = $_POST['pass_admin'];

$sql1 = mysqli_query($db, "SELECT *FROM administrador WHERE useradmin = '$useradmin'");
                 if($f1=mysqli_fetch_array($sql1)){
                        if($pass_admin == $f1['pass_admin']){
                            $_SESSION['useradmin'] = $f1['useradmin'];
                            echo '<script>window.location="Admin.php";</script>';
                        }
                     else{
                            echo '<script>alert("Contraseña incorrecta.");</script>';
                            echo '<script>window.location="LoginA.php";</script>';
                    }
                 }
                 else{
                    echo '<script>alert("Este usuario no existe.");</script>';
                    echo '<script>window.location="LoginA.php";</script>';
                } 
?>