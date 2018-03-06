<?php
include("../conexion/conexion.php");

$con=mysqli_connect($host,$user,$clave, $db)
 	or die("Problemas Al Conectar Con El Servidor o base de datos");

$sql = "SELECT * FROM responsables WHERE cedu_resp ='".$_POST['cedula']."'";
$busq=mysqli_query($con,$sql);

if ($reg=mysqli_fetch_array($busq)){
	echo "<script>alert('Ya existe este numero de cedula')</script>";
	echo "<script>window.location='registrar_usua.php'</script>";
}else{
 if(isset($_POST['nombre']) && !empty ($_POST['nombre']) &&
	isset($_POST['apellido']) && !empty ($_POST['apellido']) &&
	isset($_POST['cedula']) && !empty ($_POST['cedula']) &&
	isset($_POST['clave']) && !empty ($_POST['clave'])   &&
 	isset($_POST['clave2']) && !empty ($_POST['clave2']) &&
 	isset($_POST['usua']) && !empty ($_POST['usua']) &&
	
	$_POST['clave'] == $_POST['clave2']) 
 	{
 		$con=mysql_connect($host,$user,$clave)
 		or die("Problemas Al Conectar Con El Servidor");

 		mysql_select_db($db,$con)
 		or die ("Problemas Al Conectar Con La Base De Datos");

		mysql_query("insert into responsables (nomb_resp, apellido_resp, cedu_resp, clave, tipo_usuario) values 
			('$_POST[nombre]','$_POST[apellido]','$_POST[cedula]','$_POST[clave]','$_POST[usua]')",$con);
		echo "<script>alert('Datos registrados con exito ')</script>";
		echo "<script>window.location='inicio_adm.php'</script>";	
 	}else{
 		echo "<script>alert('Verifica que llenaste todos los campos y que las claves coincidan')</script>";
 		echo "<script>window.location='registrar_usua.php'</script>";
 	}
}
?>