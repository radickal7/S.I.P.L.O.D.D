<?php
session_start();//Permite Inicializar Una Sesion En PHP
include("conexion/conexion.php");
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	   isset($_POST['clave'])  && !empty($_POST['clave']))
		{
			$con=mysql_connect($host,$user,$clave) or die("Problemas Al Conectar Con El Servidor");
			mysql_select_db($db,$con) or die ("Problemas Con La Base De Datos");

			$sel=mysql_query("select nomb_resp, clave, tipo_usuario from responsables where nomb_resp='$_POST[nombre]'",$con);
			$sesion=mysql_fetch_array($sel);

			if($_POST['clave'] == $sesion['clave']){
				$_SESSION['username'] = $_POST['nombre'];
				$_SESSION['tipo_usuario'] = $sesion['tipo_usuario'];
				echo "<script>alert('Bienvenido Iniciaste sesion de manera Exitosa')</script>";
				echo "<script>window.location='inicio_pers.php'</script>"; 	
			}else{					
					echo "<script>alert('Ingresaste datos Invalidos o el usuario que estan ingresando no esta registrado ')</script>";
					echo "<script>window.location='login_pers.php'</script>";
			     } 
		}
?>