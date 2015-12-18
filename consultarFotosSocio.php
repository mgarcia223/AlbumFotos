
<?php session_start(); 
	include ("conectbd.php");
		$link=Conectar();
		$result=mysqli_query($link, "select * from fotografia where acceso='accesoLimitado' or acceso='publica'");
	
?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Fotografias Acceso Limitado</title>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); 
		  include('includes/navigationMenu.php'); 
		  include('includes/seguridadSocio.php'); ?>

    <section class="main" id="s1">

	<div>
	<table id="tablaUsuarios">
			<tr>
				<td>Nombre</td>
				<td>Foto</td>
			</tr>
			
			<?php				
				while ($row = mysqli_fetch_array($result)) {			
			?>
				<tr>
					<td><?php echo $row["nombre"]; ?></td>
					<td><?php echo '<img src="data:image/png;base64,'.base64_encode( $row['imagen'] ).'" width=200 height =200/>'; ?></td>
					
				</tr>
			
			<?php
				}
			mysqli_free_result($result);
			mysqli_close($link);
			?>
		</table>
	</div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>
	