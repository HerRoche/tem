<?php
    session_start();
    require 'db/connect.php';
    if(isset($_SESSION['user'])){
        echo '<script>window.location="Perfil.php";</script>';
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
                    <form action="Validar.php" method="post">
                    <h2 class="form-titulo">Iniciar Sesión</h2>
                        <div class="contenedor-inputs">
                            <input type="email" name="user" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="USER" placeholder="example@ted.com" maxlenght="50" for="usuario" class="input-48" required/>
                            <input type="password" name="password" id="password" placeholder="Contraseña" maxlenght="100" for="password" class="input-48" required/>
                            <input type="submit" name="login" value="INGRESAR" class="btn-enviar" class="input-48"/>
                            <p class="form-link"><a class="form-link" href="#">¿Olvidaste tu usuario o contraseña?</a></p>
                            <p class="form-link"><a class="form-link" href="LoginA.php">Admin</a></p>
                        </div>
                    </form>
                </section>
            </main>
        </body>
    </html>