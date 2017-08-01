<?php
    session_start();
    require 'db/connect.php';
    
        if(isset($_SESSION['user'])){
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
                           <li><a href="Logout.php">Salir</a></li> 
                        </ul>
                    </nav>
            </header>
            <main>
                <section id="reg">Bienvenido! <strong><?php echo ' '.$_SESSION['user'].' '; ?></strong> </section>
                
                <section class="form-register">
                    <form action="RegistroP.php" method="post">
                    <h2 class="form-titulo">Registrar Pago</h2>
                        <div class="contenedor-inputs">
                            <input type="text" name="No_boleta" id="usuario" placeholder="NO. BOLETA" maxlenght="50" class="input-48" required/>
                            <input type="text" name="Banco" id="banco" placeholder="BANCO" maxlenght="100" for="password" class="input-48" required/>
                            <input type="text" name="Mes" id="mes" placeholder="MES" maxlenght="100"  class="input-48" required/>
                            <input type="date" name="Fecha_Pago" id="fecha" placeholder="FECHA DE PAGO" maxlenght="100" class="input-48" required/>
                            <input type="text" name="Monto" id="monto" placeholder="MONTO" maxlenght="100" class="input-48" required/>
                            <input type="text" name="E_Carnet" id="carnet" placeholder="CARNET" maxlenght="100" class="input-48" required/>
                            
                            <input type="submit" value="REGISTRAR" class="btn-enviar" class="input-48"/>
                            
                        </div>
                    </form>
                </section>
            </main>
        </body>
    </html>         
<?php
}else{
    echo'<script> window.location="Login.php";</script>';
    }

    $profile = $_SESSION['user'];
?>

