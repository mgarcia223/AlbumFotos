<?php
session_start();
include_once ("../conectbd.php");
require_once '../funciones.php';
$link=Conectar();


$result = $link->query("select codigo,nombre,fecha from album where codigo='".$_REQUEST['cod']."'");	
$result = mysqli_fetch_assoc($result);

$_SESSION["codalbum"] = $result['codigo'];
echo '<table style="margin:0 auto; border-collapse: collapse;" border="2">';
echo "<tr><td><strong>Nombre:</strong></td><td><input type='text' id='nombre' value='".$result['nombre']."' disabled></td></tr>";
echo "<tr><td><strong>Fecha:</strong></td><td><input type='text' id='fecha' value='".$result['fecha']."' disabled/></td></tr>";
echo '</table>';
?>