<?php
session_start();
include_once ("conectbd.php");
include_once 'funciones.php';
?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Login</title>
	</head>
  <body>
  <div id='page-wrap'>

  	<?php include('includes/header.php'); ?>
	<?php include('includes/navigationMenu.php'); ?>

    <section class="main" id="s1">

	<div>
		<p>
		<?php
if
(isset($_POST['user']) && isset($_POST['pass']))
{
	verificarLogin($_POST['user'], $_POST['pass']);
}


function verificarLogin($user,$pass)
{
	//Encriptar la contraseña y posteriormente buscarlo en la bd
	$pass_c = sha1(md5($pass));
	$q = "select * from usuario where email='$user' and password='$pass_c'";

	//obtenemos el link de la BD y ejecutamos la consulta
	$link = Conectar();
	$result = $link->query($q);

	//Si el resultado obtenido no tiene nada
	if ($result->num_rows == 0)
	{
		echo'Usuario o Contrasenia Incorrecta';
	}
	
	//En otro caso
	//En $reg se guarda el resultado de la consulta
	else
	{
		$reg = mysqli_fetch_assoc($result);
		if($reg['baja']=='si'){
			echo 'Su usuario ha sido dado de baja.';
		}
		else{
			if($reg['alta']=='no')
			{
				echo 'Su usuario no ha sido dado de alta todavia.';
			}
			else {			
			session_start();
			$_SESSION["useremail"] = $reg['email'];
			$_SESSION["username"] = $reg['nombre'];
			$_SESSION["rol"]= $reg['rol'];
			
			header("location:layout.php");
			$link->close();
			die();
			}
		}
	}
}
	echo '</p><br/>';
		if (!comprobarLogueado())
		{ ?>
		<form action="login.php" method="post" class="login">
			<div>Usuario:<input name="user" type="text"></div>
			<div>Contraseña:<input name="pass" type="password"></div>
			<div><input name="login" type="submit" value="login"></div>
		</form>
		<?php
		}
		else
		{
			echo 'Ya estas logueado '.$_SESSION["username"].' <a href="layout.php">Atras</a>';
		}?>

			</div>
			</section>
			<?php include('includes/footer.html'); ?>
		</div>
	</body>
</html>
	
	
	
	
