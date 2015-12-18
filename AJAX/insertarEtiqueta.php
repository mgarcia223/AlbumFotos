<?php session_start(); 
	include_once ("../conectbd.php");
	$link=Conectar();	
	
		$etiq = $_REQUEST['etiq'];
	
		$result=mysqli_query($link, "select etiqueta1, etiqueta2 from fotografia where codfoto='".$_REQUEST['cod']."' ");
		$row = mysqli_fetch_array($result);
		
		if ($row["etiqueta1"]=="") {
			if(!$update=mysqli_query($link, "Update fotografia set etiqueta1='".$etiq."' where codfoto='".$_REQUEST['cod']."'"))
				printf("No se ha podido guardar la etiqueta en la base de datos:</br> %s>", $link->error);
			else
				echo "La fotografia se ha etiquetado correctamente</br>";
		}
		else //etiqueta dos libre o ambas ocupadas
		{
			if ($row["etiqueta2"]=="") {
				if(!$update= mysqli_query($link, "Update fotografia set etiqueta2='".$etiq."' where codfoto='".$_REQUEST['cod']."'"))
					printf("No se ha podido guardar la etiqueta en la base de datos:</br> %s>", $link->error);
				else
					echo "La fotografia se ha etiquetado correctamente</br>";
			}
			else //ambas etiquetas estan ocupadas
				echo 'No se pueden poner mas de 2 etiquetas por fotografia';
		}
		
	mysqli_free_result($result);
	mysqli_close($link);

?> 