<?php session_start();
include_once 'funciones.php';
include_once 'includes/BrowserDetection.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Creditos</title>
		<?php include('includes/metaAndCSS.html'); ?>
	</head>
  <body>
  <div id='page-wrap'>

  	<?php include('includes/header.php'); ?>
	<?php include('includes/navigationMenu.php'); ?>

    <section class="main" id="s1">

	<div>
	<h1>Marta Garcia </h1><br/>
	<p class="titles">• Especialidad:</p> Ingeniería de Software <br/>
	<p class="titles">• Aficiones:</p> Me gusta viajar y estar con mis amigas.<br/>
	<p class="titles">• Foto :</p> <img id="foto" src="http://www.thepartyworks.com/ip/images15/151949/32502.jpg" > <br/>
	<a id="atras" href="layout.php">Atras </a>
	</div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>
