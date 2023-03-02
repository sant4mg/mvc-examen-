<?php 
session_start();
error_reporting(1);

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar sesión</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
        function Vusername()
        {
            var username = document.getElementById("txtUsuario").value;

            if (username.length >= 15) 
            {
                alert("Límite de caracteres excedido");
                return false;
            }
            return true;
        }
    </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        
        <?php 
        require 'bd/conexion_bd.php';
        $obj = new BD_PDO();

        if (isset($_POST['btnIniciar'])) 
        {
            $username = $_POST['txtUsuario'];
            $password = $_POST['txtContra'];
            $usuario = $obj->Ejecutar_Instruccion("select * from usuarios where username ='$username' and password='$password'");

            $Us = $obj->Ejecutar_Instruccion("select username from usuarios where username='$username'");
            $Contra = $obj->Ejecutar_Instruccion("select password from usuarios where password='$password'");


            if ($usuario[0][0]>0) 
            {
                $SESSION['privilegio'] = $usuario[0][3];
                if ($SESSION['privilegio']== 'Admin') {
                    echo '<script>alert("Bienvenido");</script>';
                    header("Location: controlador.php");
                }
                else if ($SESSION['privilegio']== 'Cliente') {
                    echo '<script>alert("Bienvenido");</script>';
                    header("Location: indexc.php");
                }
            }
           if ($password != $Contra and $username = $Us) 
            {
                echo '<script>alert("¡Contraseña incorrecta!");</script>';
            }
            else
            {
                echo '<script>alert("¡Usuario no registrado!");</script>';
            }
        }
        
     ?>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
              
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">INICIAR SESIÓN</h2>

                         <form action="index.php" method="post">

                                               
                        <br>
                        <br>
                        <label style="color:white;text-align: left">Ingrese su Usuario:</label>
                        <br>

                            <input class="form-control-right " type="text" name="txtUsuario" id="txtUsuario" placeholder="Usuario" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;width: 274px;" autocomplete="off" onkeypress="return Vusername();" required=""><br><br>

                        <label  style="color:white;text-align: left">Ingrese su contraseña:</label>
                            <br>
                            <input class="form-control-right " type="password" name="txtContra" id="txtContra" placeholder="Contraseña" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;width: 274px;" autocomplete="off" required><br><br>

                            <input class="form-control-right btn btn-success" type="submit" name="btnIniciar" id="btnIniciar" value="Ingresar">
                           
                    </form>

                    
                        
                    </div>
                </div>
            </div>
        </header>        

        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
