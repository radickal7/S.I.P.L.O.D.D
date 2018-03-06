<?php
session_start();
		     if(isset($_SESSION['username'])){
				

				} else{
				
		     	echo "<script>alert('No has Iniciado Sesion')</script>";
				echo "<script>window.location='login_adm.php'</script>";

			 }  
			 
		
include("../conexion/conexion.php");	 
	$con=mysql_connect($host,$user,$clave)
 		or die("Problemas Al Conectar Con El Servidor");

 		mysql_select_db($db,$con)
 		or die ("Problemas Al Conectar Con La Base De Datos");
	
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
	
	 if(isset($_POST["adm"])){
		 $boton=$_POST["adm"];
		 if($boton=="Consultar"){
			 $sql = "select * from responsables where cedu_resp='$cedula'";
			 $busq=mysql_query($sql,$con);
			 if($reg=mysql_fetch_array($busq)){
				 $var=$reg[0]; 
				 $var1=$reg[1];
				 $var2=$reg[2];
				 $var3=$reg[3];
				 $var4=$reg[4];
				 $var5=$reg[5];
				 
			 }else{
			echo "<script>alert('El usuario no fue encontrado')</script>";
				}
		 }
		 
		 if($boton=="Modificar"){
			$nombre = $_POST[nombre];
			$cedula = $_POST[cedula];
			$pw = $_POST[pw];
			$usua = $_POST[usua];
			
			 $sql = "update responsables set  nomb_resp='$nombre', apellido_resp='$apellido',cedu_resp='$cedula', clave='$pw', tipo_usuario='$usua' 
			 where cedu_resp='$cedula'";
			 $busq=mysql_query($sql,$con);
			 
			echo "<script>alert('Datos Modificados con exito')</script>";
				}
		 
		 
	 }
			 
			          
			 
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8"> <!--Formato De Codificacion De Caracteres-->
	<link rel="stylesheet" type="text/css" href="css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="icon" href="img/img_0.ico">
	<link href="css/agency.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo0.css">
	<title>S.I.P.L.O.D.D.</title>
</head>
<body>
	 <?php include("base/navbar.php"); ?>
    <!-- Header -->
    <header>
        <div class="container">
        </div>
    </header>
     <div class="block" >
                <div class="container">
                    <div class="row">


<div class="block">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3 wow fadeInUp">
                            <div class="form-block">
                                <img class="img-circle form-icon" src="img/img_4.png" alt="" />

                                <div class="form-wrapper">
                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Modificar Contraseña</h2>
                                            
                                        </div>
                                    </div>
                                    <form action="" name="form" method="post" >
                                        <div class="field-entry">
                                            <label for="field-1">Cedula *</label>
                                            <input type="text" name="cedula" id="field-2" value="<?PHP echo $var3; ?>" pattern="[0-9]{8}" title="Ingrese solo los 8 Digitos de tu Cedula de Identidad"/>
                                        </div>										
										<div class="field-entry">
                                            <label for="field-2">Nombre de Usuario *</label>
                                            <input type="text" name="nombre" id="field-1" value="<?PHP echo $var1; ?>" />
                                        </div>
										<div class="field-entry">
                                            <label for="field-2">Apellido de Usuario *</label>
                                            <input type="text" name="apellido" id="field-1" value="<?PHP echo $var2; ?>" />
                                        </div>
                                        <div class="field-entry">
                                            <label for="field-3">Contraseña *</label>
                                            <input type="tex"name="pw" id="field-2" value="<?PHP echo $var4; ?>" />
                                        </div>
                                       	
               				<table>
						        <tr>                      
									<td>&nbsp&nbsp
                                        <div class="button">Consultar<input type="submit" name="adm" value="Consultar"/></div>	
                                    </td>
									<td>
									&nbsp&nbsp&nbsp&nbsp
									</td>
									<td>&nbsp&nbsp
									<div class="button">Modificar<input type="submit" name="adm" value="Modificar"/></div>	
                                    </form>
								<td>
									&nbsp&nbsp&nbsp&nbsp
									</td>
									
									<td> &nbsp&nbsp
										<form class="button" action="inicio_pers.php" name="adm" method="post">Regresar<input type="submit" value=""/>
										</form>
									</td>
								</tr>
							</table>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
</div>
                </div>
            </div>
            

        </div>

    </div>

  

    

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/idangerous.swiper.min.js"></script>
    <script src="js/global.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        var wow = new WOW(
            {
                boxClass:     'wow',      // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset:       100,          // distance to the element when triggering the animation (default is 0)
                mobile:       true,       // trigger animations on mobile devices (default is true)
                live:         true,       // act on asynchronously loaded content (default is true)
                callback:     function(box) {
                  // the callback is fired every time an animation is started
                  // the argument that is passed in is the DOM node being animated
                }
            }
        );
        wow.init();
    </script>
<!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>


	</body>
</html>
</body>
</html>