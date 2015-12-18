<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Consultar Album</title>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); 
		  include('includes/navigationMenu.php'); 
		  include('includes/seguridadSocio.php'); ?>
	

    <section class="main" id="s1">
	<div>
		<div id="listaAlbumes"></div><br/>
		<div id="mostrarAlbum"></div>	
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

	cod = $("#select").val();

		$.ajax({
			url: 'AJAX/fotosAlbum.php',
			type: "POST",
			data: "cod="+cod,
			beforeSend:function(){$('#mostrarAlbum').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			$('#mostrarAlbum').html(datos);},
			error:function(){
			$('#mostrarAlbum').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
		});
	}
</script>
