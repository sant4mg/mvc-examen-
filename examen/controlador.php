 <?php 
                
    @$datoBuscar = $_POST['txtNombre'];
    @$nombre = $_POST['nombre'];
    @$cant = $_POST['cant'];
    @$precio = $_POST['precio'];

    require 'modelo.php';

    $obj_prod = new Productos();

    if (isset($_POST['btnEnviar'])) {
        if ($_POST['btnEnviar']=="Registrar") {
            $obj_prod->insertar($nombre,$cant,$precio);
        }
        else if ($_POST['btnEnviar']=="Modificar"){
            $id = @$_POST['idProd'];
            $obj_prod->modificar($nombre,$cant,$precio,$id);
        }
    }
    else if (isset($_GET['id_eliminar'])) {
        $id = $_GET['id_eliminar'];
        $obj_prod->eliminar($id);
    }
    else if (isset($_GET['id_mod'])) {
        $id = $_GET['id_mod'];
        @$cat_mod = $obj_prod->cat_mod($id);
    }

    $result = $obj_prod->buscar($datoBuscar);
    require 'vista.php';
       
?>