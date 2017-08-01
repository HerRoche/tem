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
                    <section id="reg">Actualizar Datos</section>
                    <?php
                        extract($_GET);
                        $consulta =  $db->query("SELECT *FROM administrador WHERE idAdministrador = '$id'");
                                     while($data=mysqli_fetch_array($consulta)){
                                            $Id = $data[0];
                                            $Primer_Nombre = $data[1];
                                            $Primer_Apellido = $data[2];
                                            $user = $data[3];
                                            $pass_admin = $data[4];
                                     }
                    ?>
                    <form method="post" action="ActualizarAdmin.php">
                        <div class="contenedor-inputs">
                        <input type="number" name="Id" placeholder="ID" value="<?php echo $Id;?>" maxlenght="50" class="input-48" required/>
                        <input type="text" name="Primer_Nombre" placeholder="Nombre" value="<?php echo $Primer_Nombre;?>" maxlenght="100" for="password" class="input-48" required/>
                        <input type="text" name="Primer_Apellido" placeholder="Apellido" value="<?php echo $Primer_Apellido;?>" maxlenght="100"  class="input-48" required/>
                        
                        <input type="password" name="pass_admin" placeholder="Contraseña" value="<?php echo $pass_admin;?>" maxlenght="16" class="input-48" required/>
                        <input type="submit" value="Actualizar" class="btn-enviar" class="input-48"/>
                        <a href="Configuracion.php">Cancelar</a>
                        </div>
                    </form>
                </section>
                <section id="table">
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