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
                    <section id="reg">Crear Usuario</section>
                    <?php
                        extract($_GET);
                        $consulta =  $db->query("SELECT *FROM estudiante WHERE Carnet = '$id'");
                                     while($dato=mysqli_fetch_array($consulta)){
                                            $carnet = $dato[0];
                                     }
                    ?>
                    <form method="post" action="ActualizaU.php">
                        <div class="contenedor-inputs">
                            <input type="number" name="idUsuario" placeholder="ID"  maxlenght="50" class="input-48" required/>
                            <input type="text" name="user" placeholder="Usuario" maxlenght="100" for="password" class="input-48" required/>
                            <input type="password" name="password" placeholder="Contraseña" maxlenght="100"  class="input-48" required/>
                            <input type="text" name="Correo_Alternativo" placeholder="Correo Electronico" maxlenght="100" class="input-48" required/>
                        <input type="number" name="carnet" placeholder="Carnet" value="<?php echo $carnet; ?>" maxlenght="16" class="input-48" required/>
                        <input type="number" name="idAdministrador" placeholder="ID Administrador" maxlenght="100" class="input-48" required/>
                            <input type="submit" value="Guardar" class="btn-enviar" class="input-48"/>
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