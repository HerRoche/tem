<?php
    session_start();
    require 'db/connect.php';
        
        $carnet = $_POST['carnet']; 
        $Primer_Nombre = $_POST['Primer_Nombre'];
        $Segundo_Nombre = $_POST['Segundo_Nombre'];
        $Primer_Apellido = $_POST['Primer_Apellido'];
        $Segundo_apellido = $_POST['Segundo_apellido'];
        $Facultad = $_POST['Facultad'];
        $ciclo = $_POST['ciclo'];

        $consulta = "UPDATE estudiante SET PRIMER_NOMBRE = '$Primer_Nombre', SEGUNDO_NOMBRE = '$Segundo_Nombre',  PRIMER_APELLIDO = '$Primer_Apellido', SEGUNDO_APELLIDO = '$Segundo_apellido', fk_idFacultad = '$Facultad', CICLO = '$ciclo' WHERE CARNET = '$carnet'";
            
                $result=mysqli_query($db,$consulta);

                    if($result==null)
                    {
                        echo '<script>alert("Error en el procesamiento no se han actualizado los datos")</script>';
                        echo '<script>alert("ERROR EN PROCESAMIENTO NO SE HAN ACTUALIZADO LOS DATOS")</script>';
                        echo '<script>location.href="actualizadatos.php"</script>';
                    }
                    else{
                        echo '<script>alert("REGISTROS ACTUALIZADOS!")</script>';
                         echo '<script>location.href="Administracion.php"</script>';
                    }
?>