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
                            <li><a href="Administracion.php">Administración</a></li>
                            <li><a href="Control.php">Pagos</a></li>
                            <li><a href="Configuracion.php">Configuración Administrador</a></li>
                            <li><a href="out.php">Salir</a></li> 
                        </ul>
                    </nav>
            </header>
            <main>
                <section id="reg">Bienvenido Administrador! <strong><?php echo ''.$_SESSION['useradmin'].''; ?></strong> </section>
                <section class="form-register">
                    <section id="reg">Registro de Alumnos</section>
                    <form action="Registro.php" method="post">
                        <div class="contenedor-inputs">
                        <input type="text" name="Carnet" id="carnet" placeholder="Carnet" maxlenght="50" for="carnet" class="input-48" required/>
                        <input type="text" name="PRIMER_NOMBRE" id="" placeholder="Primer Nombre" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="SEGUNDO_NOMBRE" id="" placeholder="Segundo Nombre" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="PRIMER_APELLIDO" id="" placeholder="Primer Apellido" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="SEGUNDO_APELLIDO" id="" placeholder="Segundo Apellido" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="FACULTAD" id="" placeholder="Código Facultad" maxlenght="50" for="" class="input-48" required/>
                        <input type="text" name="CICLO" id="" placeholder="CICLO" maxlenght="50" for="" class="input-48" required/>
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

