<?php
//session_start();
include_once 'funciones.php';

if (comprobarlogueado())
{
	if ($_SESSION["rol"] != "administrador")
	{
		//si no es administrador, envio a la página principal
		header("Location: layout.php");
	}
}else
{
	header("Location: login.php");
	exit();
}
