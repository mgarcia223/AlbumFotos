<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Subir Fotos</title>
	<script>
	
	function createImage(){
        //delete the old one
        try{
            document.getElementById("uploadedImage").remove();
        }catch(error){

        }
        var img = document.createElement("img");
        img.src = "#";
        img.width = 150;
        img.height = 200;
        img.alt = "your photo";
        img.id = "uploadedImage";
        $("#upload").after("<br id='uploadBR'/>");
        $("#uploadBR").after(img);
    }

    $("document").ready(function(){
    $("#upload").change(function() {
                createImage();
                readURL(this);
            });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#uploadedImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
	</script>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); 
		  include('includes/navigationMenu.php'); 
		  include('includes/seguridadSocio.php'); ?>
	

    <section class="main" id="s1">
	<div>
		<form id='subfoto' action='fotos.php' method="post" enctype="multipart/form-data">
		<div id="listaAlbumes"></div><br/>
		<div id="mostrarAlbum"></div>
		<br/><br/>
		Nombre: <input type='text' id="nombre" name="nombre">
		<br/><br/>
		Sube tu foto: <input type='file' id="upload" name="upload">
		<br/><br/>
		<div id="boton" style="visibility: hidden;">
			Etiqueta 1: <input type='text' id="etiq1" name="etiq1">
			Etiqueta 2: <input type='text' id="etiq2" name="etiq2">
			</br>
			<input name="subir" type="submit" value="Subir foto">
		</div>
		</form>		
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
			success:function(datos){
			$('#listaAlbumes').html(datos);},
			error:function(){
			$('#listaAlbumes').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
		});
	}
	
		//CAMBIA El ALBUM
	function cambiarAlbumesAJAX(){

	var cod = $("#select").val();
	
	if (cod==0)
		$("#boton").css("visibility", "hidden");
		
	else {		
		$("#boton").css("visibility", "visible");
		
		$.ajax({
			url: 'AJAX/datosAlbum.php',
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
	
	}
</script>
