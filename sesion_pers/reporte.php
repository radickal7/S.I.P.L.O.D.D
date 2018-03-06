<?php
session_start();
		     if(isset($_SESSION['username'])){
				
				
				} else{
				
		     	echo "<script>alert('No has Iniciado Sesion')</script>";
				echo "<script>window.location='login_pers.php'</script>";

			 }
			 
		
include("../conexion/conexion.php");	 
	$con=mysqli_connect($host,$user,$clave,$db);

		 
			          
			 
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8"> <!--Formato De Codificacion De Caracteres-->
	<link rel="stylesheet" type="text/css" href="css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/lightbox2/css/lightbox.min.css">
	<link rel="icon" href="img/img_0.ico">
	    <link href="css/agency.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo0.css">

	<title>S.I.P.L.O.D.D.</title>
</head>
<body id="page-top" class="index">
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
	<form action="report.php" name="form" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3 wow fadeInUp">
                            <div class="form-block">
                                <img class="img-circle form-icon" src="img/img_4.png" alt="" />

                                <div class="form-wrapper">
                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Consulta General de Documento</h2>
                                            
                                        </div>
                                    </div>
                                 
						<table>
							<tr>   
								<td>	
										<div class="field-entry2">
                                            <label for="field-2"> Responsable *</label>
												<datalist id="respo">
													<option value="Seleccione...">	
													<?php 
														$sql="select * from responsables";
														$busq=mysqli_query($con, $sql);
														if($reg=mysqli_fetch_array($busq)){
															do{
															if($reg["cod_resp"]==$var2)
															{
																$var2=$reg["cod_resp"].'-'.$reg["nomb_resp"].' '.$reg["apellido_resp"];
															}

													?>
													<option value="<?php echo $reg["cod_resp"]; ?>-<?php echo $reg["nomb_resp"]; ?> 	<?php echo $reg["apellido_resp"]; ?>">
													<?php 	}while($reg=mysqli_fetch_array($busq)); 
														}
													?>
												</datalist>
												<input type="tel" name="respo" id="field-1" value="" list="respo" title="Seleciona el Responsable" />	
                                        </div>
									</td>
									<td>	
									<div class="field-entry1">
                                            <label for="field-2"> Tipo de Documento *</label>
                                            <input type="tel" name="tipodocu" id="field-2" value="<?PHP echo $var7; ?>" list="tipodocu" />
												<datalist id="tipodocu">
													<option value="Comunicación">
													<option value="Orden de Compras">									
													<option value="Orden de Servicio">									
													<option value="Ayuda Ecónomica">									
													<option value="Resoluciones">									
													<option value="Transferencias Entes">									
												</datalist>		
                                        </div>
									
										
										
								</td>		
							</tr>
						</table>
						
						<div class="field-entry1">
                                            <label for="field-2"> Origen / Destino *</label>
                                         
												<datalist id="depn">
													<option value="Seleccione...">	
													<?php 
														$sql="select * from origen";
														$busq=mysqli_query($con,$sql);
														if($reg=mysqli_fetch_array($busq)){
														do{
															if($reg["cod_origen"]==$var3)
															{
																$var3=$reg["cod_origen"].'-'.$reg["nomb_origen"];
															}
													?>
													<option value="<?php echo $reg["cod_origen"]; ?>-<?php echo $reg["nomb_origen"];?>">
													<?php 	}while($reg=mysqli_fetch_array($busq)); 
														}
													?>
												</datalist>	
												<input type="tel" name="depn" id="field-2" list="depn" title="Seleciona el Organo o Ente" value="" />		
                                        </div>
						
						<table>
							<tr>   
								<td>							
                                        <div class="field-entry4">
                                            <label for="field-3">Desde *</label>
                                            <input type="date" name="fecha_inicio" id="field-2" value="" />
                                        </div>
								</td>	
								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								</td>
								<td>
										<div class="field-entry4">
                                            <label for="field-3">Hasta *</label>
                                            <input type="date" name="fecha_hasta" id="field-2" value="" />
                                        </div>
                                </td>		
							</tr>
						</table>       


                                            <label for="field-3"  > </label>
               					
											
               				<table>
						        <tr>                      
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<button type="submit" class="button" href="report.php">Consultar</button>
                                    </td>
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								</td>
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									
									
                                    
								
									<td> &nbsp&nbsp
										<a class="button" href="inicio_pers.php">Regresar</a>
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

    </form>

  

    

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/idangerous.swiper.min.js"></script>
    <script src="js/global.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="../vendor/lightbox2/js/lightbox-plus-jquery.min.js"></script>
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