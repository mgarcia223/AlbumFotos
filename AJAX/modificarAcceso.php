<?php session_start(); 
	include_once ("../conectbd.php");
	$link=Conectar();	
	
		$acceso = $_REQUEST['acceso'];
		if(!$update=mysqli_query($link, "Update fotografia set acceso='".$acceso."' where codfoto='".$_REQUEST['cod']."'"))
				printf("No se ha podido modificar el acceso en la base de datos:</br> %s>", $link->error);
			else
				echo "La fotografia se ha modificado correctamente</br>";
				
				
	mysqli_close($link);

?> 