<?php
session_start();
		     if(isset($_SESSION['username'])){
				
                if($_SESSION['tipo_usuario']!='Administrador'){
                    echo "<script>alert('No tienes permiso para ingresar aquí')</script>";
                    echo "<script>window.location='login_adm.php'</script>";
                }
				
				} else{
				
		     	echo "<script>alert('No has Iniciado Sesion')</script>";
				echo "<script>window.location='login_adm.php'</script>";

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

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<title>S.I.P.L.O.D.D.</title>
</head>
<body id="page-top" class="index">

    <?php include("base/navbar.php"); ?>
    <!-- Header -->
    <header>
        <div class="">
        </div>
    </header>
<div class="block">
	<form action="report_pdf.php" name="form" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">

                        <div style="padding-top: 50px;">
                            <div class="form-block">
                                <img class="img-circle form-icon" src="img/img_4.png" alt="" />

                                <div class="form-wrapper">
                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Reportes S.I.P.L.O.D.D</h2>
                                            
                                        </div>
                                    </div>
                                 
						<table>
							<tr>  	
							
								<td>
									<div class="field-entry2">
										<label for="field-2"> Nº de Documento</label>
									</div>
								</td>
								<td>
									<div class="field-entry2">
										<label for="field-2"> Destino/Origen</label>
									</div>
								</td>
								<td>
									<div class="field-entry2">
										<label for="field-2"> Responsable</label>
									</div>
								</td>
								<td>
									<div class="field-entry2">
										<label for="field-2"> Tipo de Documento</label>
									</div>
								</td>
								<td>
									<div class="field-entry2">
										<label for="field-2"> Fecha de Recepcion/Enviado</label>								
									</div>
								</td>
								<td>
									<div class="field-entry2">
										<label for="field-2"> Documento</label>								
									</div>
								</td>
							</tr>
<?PHP
$append = '';
if(isset($_POST['respo']) and $_POST['respo']!='')
{
	$responsable = explode('-',$_POST['respo']);
	$append .= ' documentos.cod_resp='.$responsable[0].' ';
}
else if(isset($_POST['tipodocu']) and $_POST['tipodocu']!='')
{
	$append .= ' tipo_doc="'.$_POST['tipodocu'].'" ';
}
else if(isset($_POST['depn']) and $_POST['depn']!='')
{
	$dependencia = explode('-',$_POST['depn']);
	$append .= ' documentos.cod_origen='.$dependencia[0].' ';
}
else if(isset($_POST['fecha_inicio']) or isset($_POST['fecha_hasta'])){
	if($_POST['fecha_inicio']!='' and $_POST['fecha_hasta']=='')
	{
		$fi = date("Y-m-d", strtotime($_POST['fecha_inicio']));
		$append .= ' fech_reg >="'.$fi.'" ';
	}
	else if($_POST['fecha_hasta']!='' and $_POST['fecha_inicio']=='')
	{
		$fh = date("Y-m-d", strtotime($_POST['fecha_hasta']));
		$append .= ' fech_reg <="'.$fh.'" ';
	}
	else if($_POST['fecha_inicio']!='' and $_POST['fecha_hasta']!='')
	{
		$fi = date("Y-m-d", strtotime($_POST['fecha_inicio']));
		$fh = date("Y-m-d", strtotime($_POST['fecha_hasta']));
		$append .= ' fech_reg >="'.$fi.'" AND fech_reg <="'.$fh.'" ';
	}
}

$sql="SELECT num_doc, documentos.cod_origen, documentos.cod_resp, 
tipo_doc, fech_reg, adju_doc, 
origen.nomb_origen as nombre_departamento, 
responsables.nomb_resp as nomb_resp, responsables.apellido_resp as apellido_resp
FROM documentos
INNER JOIN origen ON origen.cod_origen=documentos.cod_origen
INNER JOIN responsables ON responsables.cod_resp=documentos.cod_resp
";
if(strlen($append)>2){
	$sql .= ' WHERE '.$append; 
}
$sql .= ' ORDER BY fech_reg ASC;';
$busq = mysqli_query($con, $sql);
$i=0;
	while($reg=mysqli_fetch_array($busq)){
		$i+=1;
?>
	<tr>
		<td>
			<div class="field-entry4">
			<input id="field-2" value="&nbsp;<?php echo $reg[num_doc]; ?>"/>
            </div>
			</td>
		<td>		
			<div class="field-entry4">
			<input id="field-2" value="&nbsp;<?php echo $reg[nombre_departamento]; ?>"/>
			 </div>
		</td>
		<td>
			<div class="field-entry4">
			<input id="field-2" value="&nbsp;<?php echo $reg[nomb_resp].' '.$reg[apellido_resp]; ?>"/>
		    </div>
		</td>
		<td>	
			<div class="field-entry4">
			<input id="field-2" value="&nbsp;<?php echo $reg[tipo_doc]; ?>"/>
			</div>
		</td>
		<td>
			<div class="field-entry4">
			<input id="field-2" value="&nbsp;<?php echo $reg[fech_reg]; ?>"/>
			</div>
		</td>
		<td>
			<div class="blue">
				<?php 
					if($reg[adju_doc]){
						echo "<a target='_blank' href='../uploads/".$reg[adju_doc]."'>";
						echo "<i class='fa fa-eye' aria-hidden='true'></i> Ver Documento</a>";
					}
					else{
						echo "<p>No hay documentos adjuntos</p>";
					}
				?>
			</div>
		</td>
	</tr>
	<?PHP
	};
	
	?>

	
						</table>
<td>
			<div class="field-entry4">
				<input id="field-2" value="Total de Documentos : <?php echo $i; ?>"/>
			</div>
		</td>

               					
											
               				<table>
						        <tr>                      
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <div class="button">Descargar<input type="submit" name="adm" href="repor.php"/></div>	
                                    </td>
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									
									
                                    
								
									<td> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<a class="button" href="inicio_adm.php">Regresar</a>
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

    <input type="hidden" value="<?php echo $_POST['respo']; ?>" name="respo" />
    <input type="hidden" value="<?php echo $_POST['tipodocu']; ?>" name="tipodocu" />
    <input type="hidden" value="<?php echo $_POST['depn']; ?>" name="depn" />
    <input type="hidden" value="<?php echo $_POST['fecha_inicio']; ?>" name="fecha_inicio" />
    <input type="hidden" value="<?php echo $_POST['fecha_hasta']; ?>" name="fecha_hasta" />

    </form>

  

    

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


	</body>
</html>
</body>
</html>
