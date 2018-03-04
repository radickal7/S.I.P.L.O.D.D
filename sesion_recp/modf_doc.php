<?php
session_start();
		     if(isset($_SESSION['username'])){
			
				
				} else{
				
		     	echo "<script>alert('No has Iniciado Sesion')</script>";
				echo "<script>window.location='login_adm.php'</script>";

			 } 
			 
		
include("../conexion/conexion.php");	 
	$con=mysqli_connect($host,$user,$clave,$db);

	
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
$var6="";
$var7="";
$var8="";
$var9="";
	
	 if(isset($_POST["adm"])){
		 $boton=$_POST["adm"];
		 if($boton=="Consultar"){
			 $sql = "SELECT * FROM documentos WHERE num_doc='$numdoc'";
			 $busq=mysqli_query($con,$sql);
			 if($reg=mysqli_fetch_array($busq)){
				 $var=$reg[0]; 
				 $var1=$reg[1];
				 $var2=$reg[2];
				 $var3=$reg[3];
				 $var4=$reg[4];
				 $var5=$reg[5];
				 $var6=$reg[6];
				 $var7=$reg[7];
				 $var8=$reg[8];
				 $var9=$reg[9];
				 
			 }else{
			echo "<script>alert('El Documento no fue encontrado')</script>";
				}
		 }
		 
		 if($boton=="Modificar"){
			$sql = "SELECT * FROM documentos WHERE num_doc='$numdoc'";
			 $busq=mysqli_query($con,$sql);
			 if($reg=mysqli_fetch_array($busq)){
				 $var=$reg[0]; 
				 $var1=$reg[1];
				 $var2=$reg[2];
				 $var3=$reg[3];
				 $var4=$reg[4];
				 $var5=$reg[5];
				 $var6=$reg[6];
				 $var7=$reg[7];
				 $var8=$reg[8];
				 $var9=$reg[9];
				 
			}
			$numdoc = $_POST[numdoc];
			$respo = $_POST[respo];
			$depn = $_POST[depn];
			$fech = $_POST[fech];
			$Hora = $_POST[Hora];
			$stat = $_POST[stat];
			$descripcion = $_POST[descripcion];
			$tipodocu = $_POST[tipodocu];

			if($_FILES['adjdocu']){
				$ext = strtolower(pathinfo($_FILES['adjdocu']['name'],PATHINFO_EXTENSION));
				$filename = md5(time()).'.'.$ext;
				move_uploaded_file($_FILES["adjdocu"]["tmp_name"], '../uploads/'.$filename);
				unlink('../uploads/'.$var9);
			}
			else{
				$filename = $var9;
			}
			
			$respo=explode("-",$_POST['respo']);
			$depn=explode("-",$_POST['depn']);
			if(!$depn[1]){
				$sql="insert into origen(nomb_origen) values('".$depn[0]."')";
				mysqli_query($con, $sql);
				$depn[0]=mysqli_insert_id($con);
			}
			
			$sql = "update documentos set  num_doc='$numdoc', cod_resp='.$respo[0].', cod_origen='.$depn[0].', fech_reg='$fech', 
			hora_reg='$Hora', esta_doc='$stat', desc_doc='$descripcion', tipo_doc='$tipodocu', adju_doc='$filename' 
			 where num_doc='$numdoc'";
			 $busq=mysqli_query($con,$sql);
			 
			echo "<script>alert('Datos Modificados con exito')</script>";
			echo "<script>window.location='modf_doc.php'</script>";
		}
		 
		 
	 }
			 
			          
			 
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8"> <!--Formato De Codificacion De Caracteres-->
	<link rel="stylesheet" type="text/css" href="css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/lightbox2/css/lightbox.min.css">
	<link rel="icon" href="img/img_0.ico">   
	 <link rel="stylesheet" type="text/css" href="css/estilo0.css">

		<link href="css/agency.min.css" rel="stylesheet">
	<title>S.I.P.L.O.D.D.</title>
</head>
<body>
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
	<form action="" name="form" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3 wow fadeInUp">
                            <div class="form-block">
                                <img class="img-circle form-icon" src="img/img_4.png" alt="" />

                                <div class="form-wrapper">
                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Modificar Documento</h2>
                                            
                                        </div>
                                    </div>
                                 
						<table>
							<tr>   
								<td>	
										<div class="field-entry2">
                                            <label for="field-2"> Nº de Documento *</label>
                                            <input type="text" name="numdoc" id="field-1" value="<?PHP echo $var1; ?>" />
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
												<input type="tel" name="depn" id="field-2" list="depn" title="Seleciona el Organo o Ente" value="<?php echo $var3;?>" />		
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
												<input type="tel" name="respo" id="field-1" value="<?PHP echo $var2; ?>" list="respo" title="Seleciona el Responsable" />	
                                        </div>
									</td>
									<td>	
										<div class="field-entry2">                                        
											<label for="field-3">Estatus *</label>
											<input type="tel" name="stat" id="field-2" value="<?PHP echo $var6; ?>" list="stat" title="Seleciona el estatus del documento" />
												<datalist id="stat">
													<option value="Recibido">
													<option value="Enviado">
													<option value="Pendiente">
													<option value="Archivado">
												</datalist>
                                        </div>
									
								</td>
										
							</tr>
						</table>
						<table>
							<tr>   
								<td>							
                                        <div class="field-entry4">
                                            <label for="field-3">Fecha *</label>
                                            <input type="date"name="fech" id="field-2" value="<?PHP echo $var4; ?>" />
                                        </div>
								</td>								
								<td>
										<div class="field-entry5">
                                            <label for="field-3">Hora *</label>
                                            <input type="time"name="Hora" id="field-2" value="<?PHP echo $var5; ?>" />
                                        </div>
                                </td>		
							</tr>
						</table>       
						<table>
							<tr>
								<td> 
									<div class="field-entry3">													
	                                    <label for="field-2"> Adjuntar Documento *</label>
	                                    <input type="file" name="adjdocu" style="" />
										
									</div>
						<label for="field-3"  ></label>										
								</td>		
							</tr>
							
							<?php if($var9!=''): 
								$extension = explode('.', $var9);
							?>
							<?php if($extension[1] == 'pdf'): ?>
							<tr>
								<td>
									<a href="../uploads/<?= $var9 ?>"  target="_blank">Ver Completo</a>
								</td>
							</tr>
							<tr>
								<td>
									<iframe src='../uploads/<?= $var9 ?>'></iframe>
								</td>
							</tr>
							<?php else: ?>
								<tr>
									<td>
										<a class="example-image-link" href="../uploads/<?= $var9 ?>" data-lightbox="example-1"><img class="example-image" src="../uploads/<?= $var9 ?>" alt="image-1" / class="img-responsive" height="400px"></a>
										<?php endif; ?> 
									</td>
								</tr>
							<?php endif; ?>
						</table>
                                            <label for="field-3"  ></label>
               					
								<div class="field-entry7">
                                            <label for="field-3"  >Descripción *</label>
                                            <textarea name="descripcion"  ><?PHP echo $var8; ?></textarea>
                                        </div>			
               				<table>
						        <tr>                      
									<td>&nbsp&nbsp
                                        <div class="button">Consultar<input type="submit" name="adm" value="Consultar"/></div>	
                                    </td>
							<td>&nbsp&nbsp&nbsp
			
							<td>&nbsp&nbsp
									<div class="button">Modificar<input type="submit" name="adm" value="Modificar"/></div>	
       								<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

								
									<td> &nbsp&nbsp
										<a class="button" href="inicio_recp.php">Regresar</a>
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