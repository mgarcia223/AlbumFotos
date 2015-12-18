<?php
session_start();
include_once ("../conectbd.php");
$link=Conectar();


$result = $link->query("select email,nombre from usuario where alta='no'");

//GENERA UN SELECT CON TODOS LOS USUARIOS SIN DAR DE ALTA
echo 'Usuario:<br/>';
echo '<select id="select" onChange="cambiarUsuarioAJAX()">';
echo "<option value='0'>--Seleccione:--</option>";
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value=". $row["email"].">". $row["nombre"] ."</option>";
}
echo '</select>';

?>
