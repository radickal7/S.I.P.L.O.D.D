<?php
session_start();//INICIAR SESION EN PHP

session_destroy();//CERRAR SESION EN PHP
	echo "<script>alert('Has Cerrado Sesion de Manera Exitosa')</script>";
	echo "<script>window.location='../index.html'</script>";

?>