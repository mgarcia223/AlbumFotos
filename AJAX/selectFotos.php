<?php
session_start();
include_once ("../conectbd.php");
$link=Conectar();


$result = $link->query("select codfoto,nombre from fotografia where codalbum='".$_SESSION['codalbum']."'");

//GENERA UN SELECT CON TODOS LOS USUARIOS SIN DAR DE ALTA
echo 'Foto:<br/>';
echo '<select id="selectfoto" onChange="cambiarFotosAJAX()">';
echo "<option value='0'>--Seleccione:--</option>";
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value=". $row["codfoto"].">". $row["nombre"] ."</option>";
}
echo '</select>';

?>
