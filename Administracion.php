<?php
    session_start();
    require 'db/connect.php';
    require('fpdf.php');
    
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
                    <section id="reg">Administración de usuarios</section>
                </section>
                <section id="reg">
                    <form action="Administracion.php" method="post">
            <p>
                Ciclo<label for="select"></label>
                <select name="select" id="select">
                    <option value="1">Primer</option>
                    <option value="2">Segundo</option>
                    <option value="3">Tercer</option>
                    <option value="4">Cuarto</option>
                    <option value="5">Quinto</option>
                    <option value="6">Sexto</option>
                    <option value="7">Séptimo</option>
                    <option value="8">Octavo</option>
                    <option value="9">Noveno</option>
                    <option value="10">Decimo</option>
                    <option value="11">Decimo Primer</option>
                    <option value="12">Decimo Segundo</option>
                </select>
                <input type="submit" name="buscador" value="Imprimir" />
            </p>
            <?php
                if(isset($_POST['buscador'])){
                    $buscar = $_POST['select'];
                    $dt = date("d-m-Y");
                    if(empty($buscar)){
                        echo 'No se ha ingresado ningun valor';
                    }else{
                        $consulta = $db->query("SELECT Carnet, PRIMER_NOMBRE, PRIMER_APELLIDO FROM estudiante WHERE Ciclo = '$buscar'");
                        
                                        $pdf = new FPDF();
                                        $pdf->AddPage();

                                        $pdf->SetFont('Helvetica', 'B', 14);
                                        $pdf->Cell(40,10,'TED',0,0,'C');
                                        $pdf->Cell(40);
                                        $pdf->Cell(40,10,'Asistencia',0,0,'C');
                                        $pdf->Cell(25);
                                        $pdf->Cell(40,10,date("d-m-Y"),0,0,'C');
                                        $pdf->Ln();
                                        $pdf->SetX(20);
                                        $pdf->Cell(40,7,"Carnet",1,0,'C');
                                        $pdf->SetX(60);
                                        $pdf->Cell(40,7,"Nombre",1,0,'C');
                                        $pdf->Cell(40,7,"Apellido",1,0,'C');
                                        $pdf->Cell(50,7,"Firma",1,1,'C');
            
                                                while($extraido = mysqli_fetch_array($consulta)){
                                                    $pdf->SetFont('Arial','',12); 
                                                    $pdf->SetX(20);
                                                    $pdf->Cell(40,7,$extraido['Carnet'],1,0,'C');
                                                    $pdf->SetX(60);
                                                    $pdf->Cell(40,7, utf8_decode($extraido['PRIMER_NOMBRE']),1,0,'C');  
                                                    $pdf->Cell(40,7, utf8_decode($extraido['PRIMER_APELLIDO']),1,0,'C');
                                                    $pdf->Cell(50,7,"",1,1,'C');
                                                }
                                               
                            $pdf->Output("AsistenciaTED.pdf",'F');
                            echo "<script language='javascript'>window.open('AsistenciaTED.pdf','_self','');</script>";  
                    }
                }
            ?>
        </form>
                </section>
                <section id="table">
                    <strong><?php
                                   
                                      $verificar_estudiante = $db->query("SELECT carnet, PRIMER_NOMBRE, PRIMER_APELLIDO FROM estudiante");
    
                                        echo "<table border='1' class='form-register'>";
                                        echo "<tr>";
                                        echo "<td>Carnet</td>";
                                        echo "<td>Nombre</td>";
                                        echo "<td>Apellido</td>";
                                        echo "<td>Actualizar Datos</td>";
                                        
                                                while($extraido = mysqli_fetch_array($verificar_estudiante)){
                                                    
                                                    echo "<tr>";
                                                    echo "<td>$extraido[0]</td>";
                                                    echo "<td>$extraido[1]</td>";
                                                    echo "<td>$extraido[2]</td>";
                                                    echo "<td><a href='Actualizar.php?id=$extraido[0]'>Crear Usuario</a></td>";
                                                    echo "<td><a href='Datos.php?id=$extraido[0]'>Editar</a></td>";
                                                    echo "<td><a href='Administracion.php?id=$extraido[0]&ideliminar=2'>Eliminar</a></td>";
                                                    echo "</tr>";
                                                
                                                }
                                                    echo "</table>";
                                                    extract($_GET);
                                                    if(@$ideliminar==2){
                                                        $sqleliminar = "DELETE FROM usuario WHERE E_carnet = $id";
                                                        $resultado = mysqli_query($db,$sqleliminar);
                                                        echo '<script>alert("REGISTRO ELIMINADO")</script>';
                                                        echo "<script>location.href='Administracion.php'</script>";
                                                    }
                            ?></strong>
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

