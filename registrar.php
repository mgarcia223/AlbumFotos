<?php

function validarDatos()
{
	if (!filter_var($_REQUEST['name'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-Z][a-z]*\s){2,3}[A-Z][a-z]*/")))) //nombre
		return false;
	if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/")))) //email
		return false;
	if (!filter_var($_REQUEST['passw1'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[\w]{6,20}$/")))) //contraseña
		return false;
		
	return true;
}


function registrar_usuario($link,$sql)
{
	if (mysqli_query($link, $sql))
	{
		printf("Usuario registrado correctamente</br>");
		printf("En breves aceptaremos su solicitud</br> ");
		header( "refresh:10;url=layout.php" );
		//die();
	}else

		printf("No se ha podido insertar el usuario en la base de datos:</br> %s>", $link->error);
}


?>

<?php session_start();


include ("conectbd.php");

$link = Conectar();

// escape variables for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['passw1']);
$password_enc = sha1(md5($password));

//prepare and insert SQL statement
$sql = "INSERT INTO Usuario (email, nombre, password)
	VALUES ('$email','$name','$password_enc')";

?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Registrando...</title>
	</head>
  <body>
  <div id='page-wrap'>

  	<?php include('includes/header.php'); ?>
	<?php include('includes/navigationMenu.php'); ?>

    <section class="main" id="s1">

	<div>
	<?php

if
(validarDatos())
{
	registrar_usuario($link,$sql);
}else
{
	echo "Datos no validos, vuelve a la p&aacutegina de formulario -> <a href='registro_html5.html' >REGISTRO</a>";
}
?>	</div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>

<?php mysqli_close($link); ?>
