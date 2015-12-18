<?php

session_start();
include_once ("../conectbd.php");
require_once '../funciones.php';
$link=Conectar();

$result= mysqli_query($link,"select * FROM fotografia WHERE codalbum='".$_REQUEST['cod']."'");

$numrow=mysqli_num_rows($result);
if ($numrow!=0)
{
	$delete = mysqli_query($link,"DELETE FROM fotografia WHERE codalbum='".$_REQUEST['cod']."'");
	$delete2 = mysqli_query($link,"DELETE FROM album WHERE codigo='".$_REQUEST['cod']."'");
	if ((!$delete)&&(!$delete2))
		printf("No se ha podido borrar el album de la base de datos:</br> %s>", $link->error);
	else 
		echo "El album se ha borrado correctamente</br>";
}
else //no hay fotos en el album
{
if (!$delete = mysqli_query($link,"DELETE FROM album WHERE codigo='".$_REQUEST['cod']."'"))
		printf("No se ha podido borrar el album de la base de datos:</br> %s>", $link->error);
	else 
		echo "El album se ha borrado correctamente</br>";
}	
mysqli_free_result($result);
?>

