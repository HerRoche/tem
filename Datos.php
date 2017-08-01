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
                        $consulta =  $db->query("SELECT *FROM estudiante  WHERE carnet = '$id'");
                                     while($dat=mysqli_fetch_array($consulta)){
                                            $carnet = $dat[0];
                                            $Primer_Nombre = $dat[1];
                                            $Segundo_Nombre = $dat[2];
                                            $Primer_Apellido = $dat[3];
                                            $Segundo_apellido = $dat[4];
                                            $Facultad = $dat[5];
                                            $ciclo = $dat[6];
                                     }
                    ?>
                    <form method="post" action="actualizadatos.php">
                        <div class="contenedor-inputs">
                        <input type="text" name="carnet" placeholder="Carnet" value="<?php echo $carnet;?>" maxlenght="50" for="carnet" class="input-48" required/>
                        <input type="text" name="Primer_Nombre" placeholder="Primer Nombre" value="<?php echo $Primer_Nombre;?>" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="Segundo_Nombre" placeholder="Segundo Nombre" value="<?php echo $Segundo_Nombre;?>" maxlenght="50" for="" class="input-48" />
                        <input type="text" name="Primer_Apellido"  placeholder="Primer Apellido" value="<?php echo $Primer_Apellido; ?>" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="Segundo_apellido"  placeholder="Segundo Apellido" value="<?php echo $Segundo_apellido;?>" maxlenght="50" for="" class="input-48" />
                        <input type="text" name="Facultad" placeholder="Código Facultad" value="<?php echo $Facultad; ?>" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="ciclo" placeholder="Ciclo" value="<?php echo $ciclo; ?>" maxlenght="50" for="" class="input-48" required/>
                        <input type="submit" value="Actualizar" class="btn-enviar" class="input-48"/>
                        <a href="Administracion.php">Cancelar</a>
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