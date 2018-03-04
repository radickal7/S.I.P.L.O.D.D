<?php
session_start();
             if(isset($_SESSION['username'])){
                
                if($_SESSION['tipo_usuario']=='Personal Administrativo')
				{
                    echo "<script>alert('No tienes permiso para ingresar aquí')</script>";
                    echo "<script>window.location='../index.html'</script>";
                }
                
                } else{
                
                echo "<script>alert('No has Iniciado Sesion')</script>";
                echo "<script>window.location='login_adm.php'</script>";

             } 
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="img/img_0.ico">
    <title>S.I.P.L.O.D.D </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilo0.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

   <!-- Navegación -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">
				<img src="img/img_2.png" style="display: inline-block;" width="45px" height="50px" class="img-responsive img-circle">
				<span style="display: inline-block;">S.I.P.L.O.D.D </span>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="example-navbar-collapse">
			<ul class="nav navbar-nav navbar-right" id="green">					
				<li class="dropdown">  
				<a href="http://localhost/Empresa/crear.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">
				Gestión de Documentos <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
				</a>
				<ul class="dropdown-menu">
						<li><a tabindex="-1" href="registrar_documen.php" >Ingresar Documentos</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="modf_doc.php" >Modificar Documentos</a></li>						
						<li class="divider"></li>
						<li><a tabindex="-1" href="consul_doc.php" >Consultar Documentos</a></li>
				</ul>
				</li>
				<li class="dropdown">  
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">
				Gestión de Reportes <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
				</a>
				<ul class="dropdown-menu">
					<li><a tabindex="-1" href="reporte.php" > Reportes Documentos </a></li>						
				</ul>
				</li>
				
				<li class="dropdown">  
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">
				Herramientas <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
				</a>
				<ul class="dropdown-menu">
					<li><a tabindex="-1" href="modf_usua.php">Modificar Contraseña</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" href="respaldar.php">Respaldar Base de Datos</a></li>
					<li class="divider"></li>
					<li><a tabindex="-1" <a href="https://www.w3schools.com" target="_blank">Manual de Usuario</a></li>
					<li class="divider"></li>
					<li><a class="page-scroll" href="#team">Creditos</a>
					</li>
				</ul>
				</li>
				
				
				<li>
					<a class="page-scroll" href="cerrarsesion.php">Cerrar Sesion</a>
				</li>
				  
			</ul>
		</div>
	</div>
</nav>


    <!-- Header -->
 <header>
        <div class="container">
            <div class="intro-text">
             
            </div>
        </div>
		
    </header>

    <section id="relleno">
        <div class="container">
            <div class="text-center">
                <a href="#" class="page-scroll btn btn-xl"> Bienvenid@ :  <?=$_SESSION['username']?></a>
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Creditos</h2>
                    <h3 class="section-subheading text-muted">Equipo de Trabajo.</h3>
                </div>
            </div>
            <div class="col-sm-2">
                    <div class="team-member">
                        <h4></h4>
                        <p class="text-muted"></p>
                        <ul class="list-inline social-buttons">
                    </div>
                </div>
            
                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Juan Hernández</h4>
                        <p class="text-muted">TSU INFORMATICA</p>
                        <ul class="list-inline social-buttons">
                            <li class="facebook"><a href="https://www.facebook.com/JuanRaDiCkaL"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="instagram"><a href="https://www.instagram.com/juanradickal/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
			   
			   
			   
				<div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Genesis Rojas</h4>
                        <p class="text-muted">TSU INFORMATICA</p>
                        <ul class="list-inline social-buttons">
                            <li class="facebook"><a href="https://www.facebook.com/genee.rojas.37"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            
			<div class="col-sm-3">
                    <div class="team-member">
                        <img src="img/team/4.jpg" class="img-responsive img-circle" alt="">
                        <h4>Carlos Belandria</h4>
                        <p class="text-muted">TSU INFORMATICA</p>
                        <ul class="list-inline social-buttons">
                            <li class="facebook"><a href="https://www.facebook.com/carlos.belandria.75"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
        </div>
    </section>

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
