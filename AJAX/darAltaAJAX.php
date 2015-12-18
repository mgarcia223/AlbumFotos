<?php
session_start();
include_once ("../conectbd.php");
include_once ("../funciones.php");


	$link=Conectar();
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$sql = "UPDATE usuario SET alta='si' WHERE email='$email'";
	if (mysqli_query($link, $sql))
	{
		echo 'OK';
	}else
	{
		echo 'ERROR '.$link->error;
	}
	mysqli_close($link);
?>