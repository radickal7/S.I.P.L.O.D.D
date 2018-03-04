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
                                            <h2 class="title">Registro de Personal</h2>
                                            
                                        </div>
                                    </div>
                                    <form action="validar_reg_usua.php" name="form" method="post" >
                                        <div class="field-entry">
                                            <label for="field-2">Nombre de Usuario *</label>
                                            <input type="text" name="nombre" id="field-1" required/>
                                        </div>
										<div class="field-entry">
                                            <label for="field-2">Apellido de Usuario *</label>
                                            <input type="text" name="apellido" id="field-1" required/>
                                        </div>
                                        <div class="field-entry">
                                            <label for="field-1">Cedula *</label>
                                            <input type="text" name="cedula" id="field-2"  pattern="[0-9]{8}" title="Ingrese solo los 8 Digitos de tu Cedula de Identidad" required />
                                        </div>
                                        <div class="field-entry">
                                            <label for="field-3">Contraseña *</label>
                                            <input type="password"name="clave" id="field-2" required/>
                                        </div>
                                        <div class="field-entry">
                                            <label for="field-3">Confirmar Contraseña *</label>
                                            <input type="password"name="clave2" id="field-2" required/>
                                        </div>
										<div class="field-entry">
                                            <label for="field-3">Seleccione el Tipo Usuario *</label>
											<input type="tel" name="usua" id="field-1" list="usua"  required />
												<datalist id="usua">
													<option value="Administrador">
													<option value="Recepcionista">
													<option value="Personal Administrativo">
												</datalist>
                                        </div>
               				<table>
						        <tr>                      
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <div class="button">Registrar<input type="submit" value=""/></div>	
                                    </form>
									</td>
									<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
									<td> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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