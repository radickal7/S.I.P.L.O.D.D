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
			 
if(isset($_POST["archivo"]) and isset($_POST["fecha"])){
    if($_POST["archivo"]!='' and $_POST["fecha"]!=''){	
        include("../conexion/conexion.php");
        $command='C:\AppServ\MySQL\bin\mysql.exe -h '.$host.' -u '.$user.' --password='.$clave.' '.$db.' < C:\AppServ\www\S.I.P.L.O.D.D\db\\'.$_POST["archivo"];
        system($command);
    	echo "<script>alert('Respaldo realizado con exito')</script>";
     
     }
     else{
        echo "<script>alert('Debe seleccionar un archivo')</script>";
     }
 }

			 
$dirs = array_diff(scandir('../db/'), array('..', '.'));

			 
			 
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8"> <!--Formato De Codificacion De Caracteres-->
	<link rel="stylesheet" type="text/css" href="css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

                        <div class="">
                            <div class="form-block">
                                <img class="img-circle form-icon" src="img/img_4.png" alt="" />

                                <div class="form-wrapper">

                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Restaurar Base de Datos</h2>
                                            
                                        </div>
                                    </div>
									<table>
										<tr>
											<div class="field-entry">
											<label for="field-2" align="center"><h2>Lista de Base de Datos </h2></label>

                                            <table>
                                                <thead>
                                                    <tr>    
                                                        <td>
                                                            <div class="field-entry2">
                                                                <label for="field-2"> Nombre de la Base de datos</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="field-entry2">
                                                                <label for="field-2"> Fecha del Archivo</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="field-entry2">
                                                                <label for="field-2"> Opción</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php  foreach($dirs as $key => $value): 
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="field-entry4">
                                                        <input id="field-2" value="&nbsp;<?php echo $value; ?>"/>
                                                        </div>
                                                        </td>
                                                    <td>        
                                                        <div class="field-entry4">
                                                        <?php 
                                                            $date = date ("d-m-Y H:i:s.", filemtime('../db/'.$value));
                                                        ?>
                                                        <input id="field-2" value="&nbsp;<?php echo $date; ?>"/>
                                                         </div>
                                                    </td>
                                                    <td>        
                                                        <div class="field-entry4">
                                                            <a onclick="lockfile('<?php echo $value;?>','<?php echo $date;?>')"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Seleccionar</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php  endforeach; ?>
                                                </tbody>
												
											</div>
										</tr>
									</table>
											<div class="field-entry">
											<label for="field-2" align="center"><h2> </h2></label>
											<label for="field-2" align="center"><h2> </h2></label>
											<label for="field-2" align="center"><h2> </h2></label>
												
											</div>									
								   <table>
								   
								   <tr>
								   <form action="" name="form" method="post" >
<td>
<label>   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   </label>
										</td>                                   
								   <td>
										<div class="field-entry">
                                            <label for="field-2">Fecha de Respaldo *</label>
                                            <input type="text" name="fecha" id="field-1 filedate" value="" readonly="true">
                                        </div>
							
										</td>
										<td>
<label>   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </label>
										</td>
										<td>
										
										<div class="field-entry">
                                            <label for="field-3">Nombre del Archivo *</label>
                                            <input type="text" name="archivo" id="field-2 filename" readonly="true" />
                                        </div>
										</td>
									</tr>
									</table>	
               				<table>
						        <tr> <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								</td>
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <div class="button">Restaurar Información<input type="submit" name="adm" value="Restaurar"/></div>	
                                    </form>
									</td>
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									</td>
									<td> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<form class="button" action="inicio_adm.php" name="adm" method="post">Regresar<input type="submit" value=""/>
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
        function lockfile(filename,date){
            if(filename!='' && date!=''){
                document.getElementsByName('archivo')[0].value = filename;
                document.getElementsByName('fecha')[0].value = date;
            }
        }
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