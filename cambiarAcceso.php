<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Etiquetar Fotos</title>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); 
		  include('includes/navigationMenu.php'); 
		  include('includes/seguridadSocio.php'); ?>

    <section class="main" id="s1">
	<div>
		<div id="listaAlbumes"></div><br/>
		<div id="mostrarAlbum"></div><br/>
		<br/><br/>
		<div id="listaFotos" style="visibility: hidden;"></div><br/>
		<div id="mostrarFotos" style="visibility: hidden;"></div>
		<br/><br/>
		<div id="boton" style="visibility: hidden;">
			<form id="etiqueta" method="POST">
				Acceso: <select id="acceso">
							<option value='0'>--Seleccione:--</option>
							<option value="privada">Privada</option>
							<option value="accesoLimitado">Acceso Limitado</option>
							<option value="publica">Publica</option>
						</select>
			</form>
			<input name="acceso" type="button" value="Modificar acceso" onClick="accesoFotografiaAJAX()">
		</div>	
		<div id="mensaje"></div>
	</div>
    </section>
	<?php include('includes/footer.html'); ?>
</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>

<script>

	//Al cargar la pagina
		$(window).load(function() {
			mostrarAlbumesAJAX();
		});

	//RELLENA EL DIV QUE CONTIENE LOS ALBUMES
	function mostrarAlbumesAJAX(){

		$.ajax({
			url: 'AJAX/selectAlbumes.php',
			type: "POST",
			beforeSend:function(){$('#listaAlbumes').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			$('#listaAlbumes').html(datos);},
			error:function(){
			$('#listaAlbumes').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
		});
	}
	
		//CAMBIA El ALBUM
	function cambiarAlbumesAJAX(){

		var cod1 = $("#select").val();
		if (cod1==0) {
			$("#boton").css("visibility", "hidden");
			$("#listaFotos").css("visibility", "hidden");
			$("#mostrarFotos").css("visibility", "hidden");
			$("#mensaje").css("visibility", "hidden");
			$("#mostrarAlbum").css("visibility", "hidden");	
		}
		else {
			$("#mostrarAlbum").css("visibility", "visible");	
			$.ajax({
				url: 'AJAX/datosAlbum.php',
				type: "POST",
				data: "cod="+cod1,
				
				beforeSend:function(){$('#mostrarAlbum').html('<div><img src="images/loading.gif"/></div>')},
				success:function(datos){
				$('#mostrarAlbum').html(datos);
				mostrarFotosAJAX();},
				error:function(){
				$('#mostrarAlbum').html('<p class="error"><strong>El servidor parece que no responde</p>');
				}
			});	
			mostrarFotosAJAX();
			$("#listaFotos").css("visibility", "visible");
		}
	}
	
	//RELLENA EL DIV QUE CONTIENE LAS FOTOS
	function mostrarFotosAJAX(){
		$.ajax({
			url: 'AJAX/selectFotos.php',
			type: "POST",
			beforeSend:function(){$('#listaFotos').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			$('#listaFotos').html(datos);},
			error:function(){
			$('#listaFotos').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
		});
	}
	
	//CAMBIA LAS FOTOS
	function cambiarFotosAJAX(){

		cod2 = $("#selectfoto").val();
		if (cod2==0){ 
			$("#boton").css("visibility", "hidden");
			$("#mensaje").css("visibility", "hidden");
			$("#mostrarFotos").css("visibility", "hidden");
		}
		else {
			$("#mostrarFotos").css("visibility", "visible");
			$("#boton").css("visibility", "visible");
			
			$.ajax({
			url: 'AJAX/datosFotos.php',
			type: "POST",
			data: "cod="+cod2,
			beforeSend:function(){$('#mostrarFotos').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			$('#mostrarFotos').html(datos);},
			error:function(){
			$('#mostrarFotos').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
			});
		}	
	}

	function accesoFotografiaAJAX() {
	
	var cod2 = $("#selectfoto").val();
	var acceso = $("#acceso").val();
	if (acceso!=0) {
		$("#mensaje").css("visibility", "visible");
			$.ajax({
				url: 'AJAX/modificarAcceso.php',
				type: "POST",
				data: "cod="+cod2+"&acceso="+acceso,
				beforeSend:function(){$('#mensaje').html('<div><img src="images/loading.gif"/></div>')},
				success:function(datos){
				$('#mensaje').html(datos);},
				error:function(){
				$('#mensaje').html('<p class="error"><strong>El servidor parece que no responde</p>');
				}
			});	
		}	
	}
</script>
