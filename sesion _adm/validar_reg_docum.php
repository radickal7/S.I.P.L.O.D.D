<?php
include("../conexion/conexion.php");

$con=mysqli_connect($host,$user,$clave, $db)
 	or die("Problemas Al Conectar Con El Servidor o base de datos");

$sql = "SELECT * FROM documentos WHERE num_doc='".$_POST['numdoc']."'";
$busq=mysqli_query($con,$sql);

if ($reg=mysqli_fetch_array($busq)){
	echo "<script>alert('Ya existe este código de documento')</script>";
	echo "<script>window.location='registrar_documen.php'</script>";
}

else if(isset($_POST['numdoc']) && !empty ($_POST['numdoc']) &&
	isset($_POST['respo']) && !empty ($_POST['respo']) &&
	isset($_POST['depn']) && !empty ($_POST['depn']) &&
	isset($_POST['fech']) && !empty ($_POST['fech'])   &&
 	isset($_POST['Hora']) && !empty ($_POST['Hora']) &&
 	isset($_POST['stat']) && !empty ($_POST['stat']) &&
 	isset($_POST['tipodocu']) && !empty ($_POST['tipodocu']) &&
 	isset($_POST['descripcion']) && !empty ($_POST['descripcion']) /*&&
	$_POST['numdoc'] == $_POST['numdoc']*/) 
 	{
	
		$respo=explode("-",$_POST['respo']);
		$depn=explode("-",$_POST['depn']);
		if(!$depn[1]){
			echo $sql="insert into origen(nomb_origen) values('".$depn[0]."')";
			mysqli_query($con,$sql);
			$depn[0]=mysqli_insert_id($con);
		}

		$ext = strtolower(pathinfo($_FILES['adjdocu']['name'],PATHINFO_EXTENSION));
 		$filename = md5(time()).'.'.$ext;
 		move_uploaded_file($_FILES["adjdocu"]["tmp_name"], '../uploads/'.$filename);

		$sql="insert into documentos (num_doc, cod_resp, cod_origen, fech_reg, hora_reg, esta_doc, desc_doc, tipo_doc,adju_doc) values 
			('$_POST[numdoc]','".$respo[0]."','".$depn[0]."','$_POST[fech]','$_POST[Hora]','$_POST[stat]','$_POST[descripcion]','$_POST[tipodocu]','".$filename."')";
		$query = mysqli_query($con,$sql);
		if($query){
			echo "<script>alert('Datos registrados con exito ')</script>";
			echo "<script>window.location='registrar_documen.php'</script>";
		}else{
			echo "<script>alert('Verifica que llenaste todos los campos ')</script>";
			//echo "<script>window.location='registrar_documen.php'</script>";
		}
 	}
?>