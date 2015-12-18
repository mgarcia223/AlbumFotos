<?php

session_start();
include_once ("../conectbd.php");
require_once '../funciones.php';
$link=Conectar();

if (!$result= mysqli_query($link,"DELETE FROM fotografia WHERE codfoto='".$_REQUEST['cod']."'")) 
	printf("No se ha podido borrar la fotografia de la base de datos:</br> %s>", $link->error);
else 
	echo "La fotografia se ha borrado correctamente</br>";	
?>

