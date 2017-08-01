<?php
                                session_start();
                                require 'db/connect.php';
                                                //Almacena datos del formulario html  
                                                $idUsuario = $_POST['idUsuario'];
                                                $user = $_POST['user'];
                                                $password = $_POST['password'];
                                                $Correo_Alternativo = $_POST['Correo_Alternativo'];
                                                $E_Carnet = $_POST['carnet'];
                                                $idAdministrador = $_POST['idAdministrador'];


                                                //Consulta para insertar
                                              $insertar = "INSERT INTO usuario(idUsuario, user, password, Correo_Alternativo, E_Carnet, idAdministrador) VALUES('$idUsuario','$user','$password','$Correo_Alternativo','$E_Carnet','$idAdministrador')";
                                                
                                                $verificar_usuario = mysqli_query($db, "SELECT *FROM usuario WHERE idUsuario = '$idUsuario'");

                                                if(mysqli_num_rows($verificar_usuario) > 0){
                                                    echo'<script>
                                                        alert("El usuario ya esta registrado!");
                                                        window.history.go(-1);
                                                    </script>';
                                                    exit;
                                                }
                                     
                                                $verificar_correo = mysqli_query($db, "SELECT *FROM usuario WHERE Correo_Alternativo = '$Correo_Alternativo'");

                                                if(mysqli_num_rows($verificar_correo) > 0){
                                                    echo'<script>
                                                        alert("El correo ya esta registrado!");
                                                        window.history.go(-1);
                                                    </script>';
                                                    exit;
                                                }

                                                $verificar_carnet = mysqli_query($db,"SELECT *FROM usuario WHERE E_Carnet = '$E_Carnet'");
                                                if(mysqli_num_rows($verificar_carnet) > 0){
                                                    echo'<script>
                                                        alert("El carnet ya cuenta con un usuario!");
                                                        window.history.go(-1);
                                                    </script>';
                                                    exit;
                                                }

                                                //Ejecuta consulta
                                                $result = mysqli_query($db, $insertar);
                                                if(!$result){
                                                    echo '<script> alert("Error en la consulta!")
                                                    window.history.go(-1);
                                                    </script>';
                                                    exit;
                                                }
                                                else{
                                                    echo'<script> alert("Usuario registrado exitosamente")
                                                    window.history.go(-1);
                                                    </script>';
                                                    exit;
                                                }

                                                mysqli_close($db);  
                    ?>