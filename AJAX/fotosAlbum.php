<?php
session_start();
include_once ("../conectbd.php");
require_once '../funciones.php';
$link=Conectar();


$result = $link->query("select codfoto,nombre,imagen from fotografia where codalbum='".$_REQUEST['cod']."'");	
$rowcount=mysqli_num_rows($result);
if ($rowcount==0) {
	echo 'Este album no contiene fotografias todavia';
}
else {
	echo '<table style="margin:0 auto; border-collapse: collapse;" border="2">';
	echo "<tr><td>Nombre</td><td>Foto</td></tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo'<tr><td>'.$row["nombre"].'</td><td><img src="data:image/jpg;base64,'.base64_encode( $row['imagen'] ).'" width=200 height =200/></td></tr>';
	}
	echo '</table>';
}
mysqli_free_result($result);
?>