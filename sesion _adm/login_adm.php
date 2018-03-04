<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8"> <!--Formato De Codificacion De Caracteres-->
	<link rel="stylesheet" type="text/css" href="css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="icon" href="img/img_0.ico">
	<title>S.I.P.L.O.D.D.</title>
</head>
    <body >
 <div class="block" >
                <div class="container">
                    <div class="row">
	<div class="col-md-6 col-md-offset-3 wow fadeInUp"> <!-- POSICION DE LA TABLA-->
                            <div class="forma-block">
                                <img class=" forma-icono" src="img/img_2.png"/>
                                <div class="forma-wrapper">
                                    <div class="row">
                                        <div class="block-header">
                                            <h2 class="title">Sistema de Información <br>
                                            para la Optimización <br>
                                            de Documentos <br>
                                            (S.I.P.L.O.D.D)</h2>
											<h3 class="title">ADMINISTRADOR</h3>
                                            <!-- br se utiliza para saltos de linea-->
                                        </div>
                                    </div>
                                    <form name="form" method="post" action="verificar_adm.php">
                                        <div class="field-entry">
                                            <label for="field-1">Nombre de Usuario *</label>
                                            <input type="text" name="nombre" required />
                                        </div>
                                        <div class="field-entry">
                                            <label for="field-2">Contraseña *</label>
                                            <input type="password" name="clave" required >
                                        </div>
                                       
                                        <div class="button">Iniciar sesión<input type="submit" value="" /></div>
                                    </form>
                                </div>
                            </div>
                        </div>
						</div>
						</div>
						</div>

	</body>
</html>
</body>
</html>
<?php

    // Respaldar
    $dump_path = "../db/"; //input location for the backup to be saved
    $host = "localhost";  //db host e.g.- localhost 
    $user = "root";  //user e.g.-root
    $pass = "1234";  //password
    $db = "alcaldia";
    $name = "alcaldia_".date('d-m-Y').'.sql';
    $dirs = scandir('../db/');
    $hacer_respaldo = True;
    $todos_menores = false;
    $diferencia = 99;
    foreach ($dirs as $key => $value) {
        $fecha = explode('_', $value);
        if (sizeof($fecha)>1){
            $hacer_respaldo = False;
            $fecha = explode('.', $fecha[1]);
            $date1 = new DateTime(date('d-m-Y',strtotime($fecha[0])));
            $date2 = new DateTime('now');
            $diff = $date2->format('d-m-Y') - $date1->format('d-m-Y');
            if($diff<$diferencia){
                $diferencia = $diff;
            }
        }
    }
    if($diferencia>=5){
        $hacer_respaldo = True;
    }
    if($hacer_respaldo){
        $command="C:\AppServ\MySQL\bin\mysqldump.exe -h $host -u $user --password=$pass $db > C:\AppServ\www\S.I.P.L.O.D.D\db\\$name"; 
        system($command);
    }
    
    // Restaurar

    /*$command='C:\AppServ\MySQL\bin\mysql.exe -h '.$host.' -u '.$user.' --password='.$pass.' '.$db.' < C:\AppServ\www\S.I.P.L.O.D.D\db\alcaldia_25-01-2018.sql';
    system($command);*/
    
?> 