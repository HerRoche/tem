<?php
    session_start();
    require 'db/connect.php';
    if(isset($_SESSION['useradmin'])){
        echo '<script>window.location="Admin.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="es">
        <head>
            <title>TED</title>
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
                            
                        </ul>
                    </nav>
            </header>
            <main>
                <section id="reg"></section>
                <section class="form-register">
                    <form action="ValidarA.php" method="post">
                    <h2 class="form-titulo">Iniciar Sesión</h2>
                        <div class="contenedor-inputs">
                            <input type="email" name="useradmin" id="USER" placeholder="Usuario" maxlenght="50" for="usuario" class="input-48" required/>
                            <input type="password" name="pass_admin" id="password" placeholder="Contraseña" maxlenght="100" for="password" class="input-48" required/>
                            <input type="submit" name="login" value="INGRESAR" class="btn-enviar" class="input-48"/>
                            <p class="form-link"><a class="form-link" href="Login.php">Estudiante</a></p>
                        </div>
                    </form>
                </section>
            </main>
        </body>
    </html>