<?php
	
function Conectar()
{
	$link = mysqli_connect("mysql.hostinger.es", "u424851376_root", "administrador", "u424851376_album");

	if (!$link)
	{
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	return $link;
}
?>