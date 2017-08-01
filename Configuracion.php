<?php
    session_start();
    require 'db/connect.php';
    
        if(isset($_SESSION['useradmin'])){
?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <title>My site</title>
            <meta charset="Utf-8">
            <meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minium-scale=1">
            <link rel="stylesheet" href="css/estilos.css">
            <link rel="stylesheet" href="css/registro.css">
        </head>
        <body>
            <header>
              <input type="checkbox" id="btn-menu">
                <label for="btn-menu"><img src="img/icono-menu.jpg" alt=""></label>
                    <nav class="menu">
                        <ul> 
                            <li><a href="Admin.php">Principal</a></li>
                            <li><a href="Control.php">Pagos</a></li>
                            <li><a href="Administracion.php">Administración</a></li>
                            <li><a href="Logout.php">Salir</a></li>
                        </ul>
                    </nav>
            </header>
            <main>
                <section id="reg">Bienvenido Administrador! <strong><?php echo ''.$_SESSION['useradmin'].''; ?></strong> </section>
                <section class="form-register">
                    <section id="reg">Configuración de usuarios</section>
                </section>
                <section id="table">
                    <strong><?php
                                   
                                      $verificar_administrador = $db->query("SELECT idAdministrador, Primer_Nombre, Primer_Apellido, useradmin FROM administrador");
    
                                        echo "<table border='1' class='form-register'>";
                                        echo "<tr>";
                                        echo "<td>ID</td>";
                                        echo "<td>Nombre</td>";
                                        echo "<td>Apellido</td>";
                                        echo "<td>Usuario</td>";
                                        
                                                while($extraido = mysqli_fetch_array($verificar_administrador)){
                                                    
                                                    echo "<tr>";
                                                    echo "<td>$extraido[0]</td>";
                                                    echo "<td>$extraido[1]</td>";
                                                    echo "<td>$extraido[2]</td>";
                                                    echo "<td>$extraido[3]</td>";
                                                    echo "<td><a href='ActualizaA.php?id=$extraido[0]'>Editar</a></td>";
                                                    echo "<td><a href='Configuracion.php?id=$extraido[0]&ideliminar=2'>Eliminar</a></td>";
                                                    echo "</tr>";
                                                
                                                }
                                                    echo "</table>";

                                                    extract($_GET);
                                                    if(@$ideliminar==2){
                                                        $sqleliminar = "DELETE FROM administrador WHERE idAdministrador = $id";
                                                        $resultado = mysqli_query($db,$sqleliminar);
                                                            echo '<script>alert("REGISTRO ELIMINADO")</script>';
                                                            echo "<script>location.href='Configuracion.php'</script>";
                                                    }


                            ?></strong>
                </section>
                <section class="form-register">
                    <section id="reg">Registro de Administradores</section>
                    <form action="RegistroA.php" method="post">
                        <div class="contenedor-inputs">
                        <input type="number" name="idAdministrador" id="" placeholder="ID" maxlenght="2" for="" class="input-48" required/>
                        <input type="text" name="Primer_Nombre" id="" placeholder="Primer Apellido" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="Primer_Apellido" id="" placeholder="Segundo Apellido" maxlenght="50" for="" class="input-48" required/>
                        <input type="email" name="useradmin" id="" placeholder="example@ted.com" maxlenght="50" for="" class="input-48" required/>
                        <input type="password" name="pass_admin" id="" placeholder="Contraseña" maxlenght="50" for="" class="input-48" required/><span><h6 class="contenedor-inputs">Su contraseña debe contar con caracteres especiales</h6></span>
                        <input type="submit" name="Registro" value="REGISTRO" class="btn-enviar" class="input-48"/>
                        </div>
                    </form>
                </section>
            </main>
        </body>
    </html>         
<?php
}else{
    echo'<script> window.location="LoginA.php";</script>';
    }

    $profile = $_SESSION['useradmin'];
?>