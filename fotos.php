<?php
function subir_foto($link,$file,$codalbum,$nombre,$etiq1,$etiq2)
{		
	if ($file['error']!=0)
		echo "Fotografia no subida.<br/>";
	else
	{
		//addslashes to prevent any mysql injection
		$image = addslashes(file_get_contents($file['tmp_name']));
		$image_name = addslashes($file['name']);
		$image_size = getimagesize($file['tmp_name']);
		$image_type = addslashes($file['type']);
		
		//Querys
		$q1="INSERT INTO fotografia(codalbum, nombre,type,imagen,etiqueta1,etiqueta2) VALUES('$codalbum','$nombre','$image_type','$image','$etiq1','$etiq2')";
		$q2="INSERT INTO fotografia(codalbum, nombre,type,imagen,etiqueta1) VALUES('$codalbum','$nombre','$image_type','$image','$etiq1')";
		$q3="INSERT INTO fotografia(codalbum, nombre,type,imagen,etiqueta2) VALUES('$codalbum','$nombre','$image_type','$image','$etiq2')";
		$q4="INSERT INTO fotografia(codalbum, nombre,type,imagen) VALUES('$codalbum','$nombre','$image_type','$image')";

		if ($image_size==FALSE) //if is not an image will return false
			echo "No has seleccionado una imagen, fotografia no subida<br/>";
		else//hay imagen
		{
			if ($etiq1!="" && $etiq2!="") //las dos etiquetas son validas 
			{
				if (!$insert = mysqli_query($link,$q1))
					printf("No se ha podido insertar la fotografia en la base de datos:</br> %s>", $link->error);
				else
					echo "La fotografia se ha guardado correctamente</br>";
			}
			else //alguna o ninguna es valida
			{
				if ($etiq1!="") //etiqueta dos no valida 
				{
					if (!$insert = mysqli_query($link,$q2))
						printf("No se ha podido insertar la fotografia en la base de datos:</br> %s>", $link->error);
					else
						echo "La fotografia se ha guardado correctamente</br>";
				}
				else{
					if ($etiq2!="") //etiqueta uno no valida
					{
						if (!$insert = mysqli_query($link,$q3))
							printf("No se ha podido insertar la fotografia en la base de datos:</br> %s>", $link->error);
						else
							echo "La fotografia se ha guardado correctamente</br>";
					}
					else//ninguna etiqueta es valida 
					{
						if (!$insert = mysqli_query($link,$q4))
							printf("No se ha podido insertar la fotografia en la base de datos:</br> %s>", $link->error);
						else
							echo "La fotografia se ha guardado correctamente</br>";
					}
				}
			}
		}
	}
}
?>

<?php session_start();
include ("conectbd.php");

$link = Conectar();

$codalbum = $_SESSION['codalbum'];
$nombre = $_REQUEST['nombre'];
$image = $_FILES['upload'];
$etiq1 = $_REQUEST['etiq1'];
$etiq2 = $_REQUEST['etiq2'];
?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Insertando...</title>
	</head>
  <body>
  <div id='page-wrap'>

  	<?php include('includes/header.php');
	      include('includes/navigationMenu.php');
		  include('includes/seguridadSocio.php');?>

    <section class="main" id="s1">

	<div>
	<?php subir_foto($link,$image,$codalbum,$nombre,$etiq1,$etiq2);?>
	</div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>

<?php mysqli_close($link); ?>
