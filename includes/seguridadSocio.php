<?php
session_start();
include_once 'funciones.php';

if (comprobarlogueado())
{
	if ($_SESSION["rol"] != "socio")
	{
		//si no es socio, envio a la página principal
		header("Location: layout.php");
	}
}else
{
	header("Location: login.php");
	exit();
}
