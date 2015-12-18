<?php
session_start();
include_once ("../conectbd.php");
$link=Conectar();


$result = $link->query("select codigo ,nombre from album");
//GENERA UN SELECT CON TODOS LOS USUARIOS SIN DAR DE ALTA
echo 'Album:<br/>';
echo '<select id="select" onChange="cambiarAlbumesAJAX()">';
echo "<option value='0'>--Seleccione:--</option>";
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value=". $row["codigo"].">". $row["nombre"] ."</option>";
}
echo '</select>';

?>
