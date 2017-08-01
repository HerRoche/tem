<?php
    session_start();
    require 'db/connect.php';
        
        $Id = $_POST['Id']; 
        $Primer_Nombre = $_POST['Primer_Nombre'];
        $Primer_Apellido = $_POST['Primer_Apellido'];
        $pass_admin = $_POST['pass_admin'];

            $sql = "UPDATE administrador SET Primer_Nombre = '$Primer_Nombre', Primer_Apellido = '$Primer_Apellido', 
            pass_admin = '$pass_admin' WHERE idAdministrador = '$Id'";
            
                $resent=mysqli_query($db,$sql);

                    if($resent==null)
                    {
                        echo '<script>alert("Error en el procesamiento no se han actualizado los datos")</script>';
                        echo '<script>alert("ERROR EN PROCESAMIENTO NO SE HAN ACTUALIZADO LOS DATOS")</script>';
                        echo '<script>location.href="ActualizaA.php"</script>';
                    }
                    else{
                        echo '<script>alert("REGISTROS ACTUALIZADOS!")</script>';
                         echo '<script>location.href="Configuracion.php"</script>';
                    }
?>