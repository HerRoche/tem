<?php 
    session_start();
    require 'db/connect.php';

   $user = $_POST['user'];
   $password = $_POST['password'];     
                       
        $sql = mysqli_query($db, "SELECT *FROM usuario WHERE user='$user'");
                if($f=mysqli_fetch_array($sql)){
                        if($password == $f['password']){
                            $_SESSION['user'] = $f['user'];
                            echo '<script>window.location="Perfil.php";</script>';
                        }
                    else{
                            echo '<script>alert("Contraseña incorrecta.");</script>';
                            echo '<script>window.location="Login.php";</script>';
                    }
                }
                else{
                    echo '<script>alert("Este usuario no existe.");</script>';
                    echo '<script>window.location="Login.php";</script>';
                }
?>
