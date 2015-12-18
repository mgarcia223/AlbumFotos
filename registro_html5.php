<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">	
	
	function matchPassword(input) {
        if (input.value != document.getElementById('passw1').value) {
            input.setCustomValidity('Las contraseñas no coinciden');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
	</script>
    <?php include('includes/metaAndCSS.html'); ?>
</head>

 <div id='page-wrap'>

  	<?php include('includes/header.php'); ?>
	<?php include('includes/navigationMenu.php'); ?>	
	
    <section class="main" id="s1">
	
	<?php if (!comprobarLogueado()){ 
	?>		
	
	<div>
	<form id='registro' action='registrar.php' method="post" enctype="multipart/form-data" onsubmit='return validacionSoap()'>
	<table>
		<tr>
			<td>
				Nombre y apellidos(*):
			</td>
			<td>
				<input type="text" name="name" id="name" placeholder="Marta Garcia Gutierrez" pattern="([A-Z][a-z]*\s){2,3}[A-Z][a-z]*" required="">
			</td>
		</tr>
		<tr>
			<td>
				Dirección de correo(*):
			</td>
			<td>
				<input type="email" name="email" id="email"  required="" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
			</td>
		</tr>
		<tr>
			<td>
				Password(*):
			</td>
			<td>
				<input type="password" name="passw1" id="passw1" pattern="^[\w]{6,20}$" required="">
			</td>

		</tr>
		<tr>
			<td>
				Repite password:(*):
			</td>
			<td>
				<input type="password" name="passw2" id="passw2" pattern="^[\w]{6,20}$" oninput="matchPassword(this)" required="" >
			</td>
		</tr>
	</table>
    <input name="Submit" type="submit" value="Submit">
    </form>
	</div>
<?php } else{
			echo 'Ya estas logueado '.$_SESSION['username'].', no hace falta que te registres de nuevo';
		
}
	 ?>
	
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>