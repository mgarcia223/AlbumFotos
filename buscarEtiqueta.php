<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
	<?php include('includes/metaAndCSS.html'); ?>
	<title>Buscar etiqueta</title>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); ?>
	<?php include('includes/navigationMenu.php'); ?>
	<?php include('includes/seguridadSocio.php'); ?>
	

    <section class="main" id="s1">

	<div>
		<form id="eti" method="post">
			Etiqueta:<input name="etiqueta" type="text" id="etiqueta">
		</form>
		</br>
		<input type="button" class="botonesgestion" name="buscar" value="Buscar" onclick="mostrarEtiquetaAJAX()"/>
	</div>
	<div id="mostrarfotos"></div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>

<script>

function mostrarEtiquetaAJAX(){

	var etiqueta = $("#etiqueta").val();
	
	if ((etiqueta == '')){
		alert ("La etiqueta no puede ser vacia");
 	}
 	else{
	 	var header = "etiqueta="+etiqueta;

	$.ajax({
	url: 'AJAX/buscEtiquetaAJAX.php',
	type: "POST",
	data: header,
	beforeSend:function(){$('#mostrarfotos').html('<div><img src="images/loading.gif"/></div>')},
	success:function(datos){
	$('#mostrarfotos').html(datos);},
	error:function(){
	$('#mostrarfotos').fadeIn().html('<p class="error"><strong>No se han encontrado </p>');
	}
	});
 	
	}
}
</script>