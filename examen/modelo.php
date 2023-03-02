<?php 

	require 'bd/conexion_bd.php';

	
	class Productos extends BD_PDO
	{
		function insertar($nombre, $cant, $precio)
		{
			$this-> Ejecutar_Instruccion("insert into productos(nombre,cant,precio) values('$nombre','$cant','$precio')");
			echo '<script>alert("Registro exitoso!");</script>';
		}
		function buscar($datoBuscar)
		{
			$result = $this->Ejecutar_Instruccion("select * from productos where nombre like '%$datoBuscar%'");
			return $result;
		}
		function eliminar($id)
		{
			$this->Ejecutar_Instruccion("delete from productos where idProd = '$id'");
		}
		function modificar($nombre, $cant, $precio, $id)
		{
			$this->Ejecutar_Instruccion("update productos set nombre= '$nombre', cant= '$cant', precio= '$precio' where idProd = '$id'");		
		}
		function cat_mod($id)
		{
			$cat_mod = $this->Ejecutar_Instruccion("Select * from productos where idProd = '$id'");
			return $cat_mod;
		}
	}


 ?>