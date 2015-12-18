<?php
session_start();
include_once ("conectbd.php");
include_once ("funciones.php");

function insertarEnBD($link,$nombre,$fecha)
{
	$email=$_SESSION['useremail'];
	$sql = "INSERT INTO album (socio,nombre,fecha)
	VALUES ('$email','$nombre','$fecha')";
	if (mysqli_query($link, $sql))
	{
		echo 'Album creado correctamente';
	}else
	{
		printf("No se ha podido crear el album:</br> %s>", $link->error);
	}
	mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Crear album</title>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); ?>
	<?php include('includes/navigationMenu.php'); ?>
	<?php include('includes/seguridadSocio.php'); ?>

    <section class="main" id="s1">

	<div>
		<form id='album' method="post" action='crearAlbum.php'>
			Nombre:(*):<br/>
			<input name="nombre" type="text" required><br/><br/>
			Fecha:(*):<br/>
			<input name="fecha" placeholder="2015-12-24" type="text" required><br/><br/>
			<input type="submit" name="submit" value="Enviar"><br>
		</form>
		<br/>
		<?php
			if(isset($_POST['submit']))
			{
				$link = Conectar();
				$nombre = mysqli_real_escape_string($link, $_POST['nombre']);
				$fecha = mysqli_real_escape_string($link, $_POST['fecha']);
				insertarEnBD($link,$nombre,$fecha);
			}
		?>
	</div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>