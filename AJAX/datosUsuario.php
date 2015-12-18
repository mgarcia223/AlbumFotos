<?php
session_start();
include_once ("../conectbd.php");
require_once '../funciones.php';
$link=Conectar();


$result = $link->query("select email,nombre from usuario where email='".$_REQUEST['email']."'");	
$result = mysqli_fetch_assoc($result);

echo '<table style="margin:0 auto;     border-collapse: collapse;" border="2">';
echo "<tr><td><strong>Nombre y Apellidos:</strong></td><td><input type='text' id='nombre' value='".$result['nombre']."' disabled></td></tr>";
echo "<tr><td><strong>Email:</strong></td><td><input type='text' id='email' value='".$result['email']."' disabled/></td></tr>";
echo '</table>';
?>