<?php 
  $db = new mysqli('localhost','root','','sistemapago'); 
   
   // echo $db->connect_errno;

    if($db->connect_errno){
        echo ($db->connect_error);
        die('Problemas en la base de datos...');
    }
?>