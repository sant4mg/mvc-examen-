<?php 
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>VISTA CLIENTE</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
        function caracter()
        {
            var nombre = document.getElementById("nombre").value;

            if (nombre.length >= 20) 
            {
                alert("Límite de caracteres excedido");
                return false;
            }
            return true;
        }


        function eliminar(id)
        {
            if (confirm("¿Estás seguro de eliminar el registro?"))
            {
                window.location = "indexa.php?id_eliminar=" + id;
            }
        }
        function modificar(id)
        {
            window.location = "indexa.php?id_mod=" + id;
        }
        function cerrar()
        {
            if (confirm("¿Quieres cerrar sesión?")) 
            {
                window.location = "cerrar.php"
            }
        }

        function texto(e)
        {
            var code; 
            if (!e) var e = window.event;
            if(e.keyCode) code = e.keyCode;
            else if (e.which) code =e.which;
            var character = String.fromCharCode(code);
            var AllowRegex = /^[\ba-zA-Z\s-]$/;
            if (AllowRegex.test(character)) return true;
            return false;
        }
    
    </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        
        <?php 
                
                @$datoBuscar = $_POST['txtNombre'];
                

                require 'bd/conexion_bd.php';

                $obj = new BD_PDO();

               


                $result = $obj->Ejecutar_Instruccion("select * from productos where nombre like '%$datoBuscar%'");

                
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
                        
                        <br><br><h2 class="text-white-50 mx-auto mt-2 mb-5">PRODUCTOS</h2>


                    <form id="frmBuscar" name="frmBuscar" action="indexc.php" method="post">
                    <div class="row">
                        <span>
                        <input class="form-control-right " id="txtNombre" name="txtNombre" type="text" placeholder="Buscar" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;width: 274px;" onkeypress="return Vbuscar();" /><br><br>
                        <input type="submit" id="btnBuscar" name="btnBuscar" class="btn btn-secondary" value="Buscar"><br><br>
                    </div>
                </form>

                <div class="row">
                <table style="background-color: white; border-color: white;border: 2px solid;" align="center">
                    <tr>
                        <td style="border-color: white;border: 2px solid;">Id del Producto</td>
                        <td style="border-color: white;border: 2px solid;">Nombre</td>
                        <td style="border-color: white;border: 2px solid;">Cantidad</td>
                        <td style="border-color: white;border: 2px solid;">Precio</td>
                        
                    </tr>
                    <?php foreach (@$result as $renglon) {
                     ?>
                    <tr>
                        <td style="border-color: white;border: 2px solid;"><?php echo $renglon[0]; ?></td>
                        <td style="border-color: white;border: 2px solid;"><?php echo $renglon[1]; ?></td>
                        <td style="border-color: white;border: 2px solid;"><?php echo $renglon[2]; ?></td>
                        <td style="border-color: white;border: 2px solid;"><?php echo $renglon[3]; ?></td>
                        
                    </tr>
                    <?php } ?>
                </table>
            </div> <br>
            <input type="button" id="btncerrarsesion" name="btncerrarsesion" value="Cerrar Sesion" onclick="javascript: cerrar();">
                        
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
