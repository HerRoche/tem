<?php
session_start();
session_destroy();
    echo '<script>window.location="LoginA.php"</script>';
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
            <script language="javascript">location.href = "LoginA.php"</script>
        </body>
    </html> 