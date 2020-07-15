<?php 

require_once 'conexion.php';

session_start();
 
$Correo = $_POST['Correo'];
$Password =$_POST['Password'];
$Respuesta ="";

if ($Correo=='' && empty($Password)) {
$Respuesta= "Los valores no deben estar vacios";
header("Location:/Pagina%20Kevin/login/login.php?data=".$Respuesta);
}
else{
	$Consulta = "SELECT * FROM usuario WHERE Correo_User = '$Correo' ";
	$Resultado = mysqli_query($mysqli, $Consulta);
	$Fila= mysqli_fetch_array($Resultado);
	$Respuesta="";
	if (sizeof($Fila)>0) 
	{
		if ($Fila["Contra_User"] == $Password) 
		{

			session_start();
			$_SESSION ["id"] = $Fila["ID_User"];
			$_SESSION ["nombre"] = $Fila["Nombre_User"];
			$_SESSION ["status"] = $Fila["Status"];


			$Respuesta = 1;
		}
			else
			{
				$Respuesta="La contraseña no coincide con el Correo";
			}
		
	}
	else
	{
		$Respuesta="USUARIO NO ENCONTRADO";
	}

	if ($Respuesta == 1) {
		
		header("Location:/Pagina%20Kevin/");
	}
	else{
		header("Location:/Pagina%20Kevin/login/login.php?data=".$Respuesta);

	}



//que no esten vacios

//verificar que los datos esten en la base de datos

//coinsidir la password de la base de datos


}
 ?>