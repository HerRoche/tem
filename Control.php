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
                            <li><a href="Administracion.php">Administración</a></li>
                            <li><a href="Configuracion.php">Configuración Usuario</a></li>
                            <li><a href="Logout.php">Salir</a></li>
                        </ul>
                    </nav>
            </header>
            <main>
                <section id="reg">Bienvenido Administrador! <strong><?php echo ''.$_SESSION['useradmin'].''; ?></strong> </section>
                <section class="form-register">
                    <section id="reg">Pagos Recientes</section>
                </section>
                <section id="table">
                    <strong><?php
                                   
                                      $verificar_pago = $db->query("SELECT No_boleta, Banco, Mes, Fecha_pago, Monto, E_Carnet FROM pago ORDER BY No_boleta DESC");
    
                                        echo "<table border='1' class='form-register'>";
                                        echo "<tr>";
                                        echo "<td>No. Boleta</td>";
                                        echo "<td>Banco</td>";
                                        echo "<td>Mes</td>";
                                        echo "<td>Fecha de Pago</td>";
                                        echo "<td>Monto</td>";
                                        echo "<td>Carnet</td>";
                                        
                                                while($extraido = mysqli_fetch_array($verificar_pago)){
                                                    
                                                    echo "<tr>";
                                                    echo "<td>$extraido[0]</td>";//No_boleta
                                                    echo "<td>$extraido[1]</td>";//Banco
                                                    echo "<td>$extraido[2]</td>";//Mes
                                                    echo "<td>$extraido[3]</td>";//Fecha_pago
                                                    echo "<td>$extraido[4]</td>";//Monto
                                                    echo "<td>$extraido[5]</td>";//Carnet
                                                    echo "</tr>";
                                                
                                                }
                                                    echo "</table>";
                            ?></strong>
                </section>
                <section class="form-register">
                    <form action="Control.php" method="post">
                        <div class="contenedor-inputs">
                        <input type="text" name="Carnet" id="" placeholder="Número de carnet" maxlenght="16" for="" class="input-48" required/>
                        <input type="submit" name="Consulta" value="Consulta" class="btn-enviar" class="input-48"/>
                        </div>
                    </form>
                        <?php
                 if(isset($_POST['Consulta'])){
                             $Carnet = $_POST['Carnet'];

                            $result = $db->query("SELECT e.Primer_Nombre,e.Primer_Apellido, p.Fecha_Pago, p.Mes FROM estudiante e, pago p WHERE e.Carnet = p.E_Carnet AND p.E_Carnet = '$Carnet'");
                                     echo "<table border='1' class='form-register'>";
                                        echo "<tr>";
                                        echo "<td>Fecha de Pago</td>";
                                        echo "<td>Mes</td>";
                                        
                                                while($dato = mysqli_fetch_array($result)){
                                                    
                                                    $nombre = $dato[0];
                                                    $apellido = $dato[1];
                                                    echo "<tr>";
                                                    echo "<td>$dato[2]</td>";
                                                    echo "<td>$dato[3]</td>";
                                                    echo "</tr>";
                                                
                                                }
                            $dt = date("d-m-Y");
                            echo "--------"."Nombre:".$nombre." ".$apellido."-------"."<a href='Control.php'>Imprimir</a>"."-------".$dt."--------";
                            echo "</table>";
                                                    
                 }
?>
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

