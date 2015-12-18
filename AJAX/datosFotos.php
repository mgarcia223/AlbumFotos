<?php
session_start();
include_once ("../conectbd.php");
require_once '../funciones.php';
$link=Conectar();


$result = $link->query("select codfoto,imagen from fotografia where codfoto='".$_REQUEST['cod']."'");	
$result = mysqli_fetch_assoc($result);

$_SESSION["codfoto"] = $result['codfoto'];
echo '<table style="margin:0 auto; border-collapse: collapse;" border="2">';
echo '<tr><td><img src="data:image/png;base64,'.base64_encode( $result['imagen'] ).'" width=200 height =200/></td></tr>';
echo '</table>';
?>