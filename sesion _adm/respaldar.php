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
			 
if(isset($_POST["nombre"]) and isset($_POST["clave"])){
    if($_POST["nombre"]!='' and $_POST["clave"]!=''){

        include("../conexion/conexion.php");
        $sql="select nomb_resp, clave from responsables where nomb_resp='".$_SESSION['username']."';";
        $con=mysqli_connect($host,$user,$clave,$db);
        $busq=mysqli_query($con, $sql);
        $datos = mysqli_fetch_array($busq);
        if($_POST['clave']==$datos['clave']){
            $dump_path = "../db/"; //input location for the backup to be saved
            $name = $_POST["nombre"]."_".date('d-m-y').'.sql';

            $command="C:\AppServ\MySQL\bin\mysqldump.exe -h $host -u $user --password=$clave $db > C:\AppServ\www\S.I.P.L.O.D.D\db\\$name"; 
            system($command);
            echo "<script>alert('Respaldo realizado con exito')</script>";
        }
        else{
            echo "<script>alert('Error en contraseña')</script>";
        }
     }
    else{
        echo "<script>alert('Debe Ingresar el nombre y la contraseña para respaldar')</script>";
    }
}

			 
			 
			 
			 
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8"> <!--Formato De Codificacion De Caracteres-->
	<link rel="stylesheet" type="text/css" href="css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href="css/agency.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo0.css">
	<link rel="icon" href="img/img_0.ico">
	<title>S.I.P.L.O.D.D.</title>
	<script language="JavaScript">
											function damelahora(){
													momentoActual = new Date()
													hora = momentoActual.getHours()
													minuto = momentoActual.getMinutes()
													segundo =momentoActual.getSeconds()
											
											document.write(" " + hora+":"+minuto+":"+segundo+" ");
											<!--setTimeout("damelahora()",1000)
												
											}
											</script>
	</head>
<body >

    <?php include("base/navbar.php"); ?>
    <!-- Header -->
    <header>
        <div class="container">
        </div>
    </header>
     <div class="block" >
                <div class="container">
                    <div class="row">
                        <div class="" style="padding-top: 50px">
                            <div class="form-block">
                                <img class="img-circle form-icon" src="img/img_4.png" alt="" />
                                <div class="form-wrapper">
                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Respaldar Base de Datos</h2>
                                            
                                        </div>
                                    </div>
                                    <form action="" name="form" method="post" >
                                        <div class="field-entry">
                                            <label for="field-2">Nombre de la Base de Datos *</label>
                                            <input type="text" name="nombre" id="field-1" value="Alcaldia" />
                                        </div>
										<div class="field-entry">
                                            <label for="field-2">Fecha de Respaldo *</label>										
											<!--<input name="txtfecha" class="form-control" type="text" id="txtfecha"  value=<?php echo date('d/m/y g:ia');?> />-->
										</div>
										<div class="field-entry">
										<table>
										 <tr>
											<td>		
											<label >
											<script>
											var meses = new  Array 
											("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
											var diasSemana = new 
											Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
											var f=new Date();
											document.write(diasSemana[f.getDay()] 
											+ "," + f.getDate() + " " + "de" + " " + 
											meses[f.getMonth()] + " "+ "del" + " " +
											f.getFullYear());
											</script>
											</label>
												</td>
											</tr>
										</table>								
                                        </div>
										
                                        <div class="field-entry">
                                            <label for="field-1">Hora *</label>
										<table>
										 <tr>
											<td>		
											<label >

											<script>
											damelahora();
											</script>
											</label>
												</td>
											</tr>
										</table>								
                                        		
                                        </div>
                                        <div class="field-entry">
                                            <label for="field-3">Contraseña *</label>
                                            <input type="password"name="clave" id="field-2" />
                                        </div>
										
               				<table>
						        <tr>                      
									<td>&nbsp&nbsp&nbsp
                                        <div class="button">Respaldar Información<input type="submit" name="adm" value="Respaldar"/></div>	
                                    </form>
									</td>
									
									<td>&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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