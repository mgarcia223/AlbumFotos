<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
<?php include('includes/metaAndCSS.html'); ?>
	<title>Dar de baja</title>
	</head>
  <body>
  <div id='page-wrap'>
	
  	<?php include('includes/header.php'); 
		  include('includes/navigationMenu.php'); 
		  include('includes/seguridadAdministrador.php'); ?>
	

    <section class="main" id="s1">

	<div>
	<div id="listaUsuarios"></div>
	<div id="mostrarUsuario"></div>
	<input type="button" class="botonesgestion" name="baja" value="Dar de baja" onclick="darBajaAJAX()"/>
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
	$( window ).load(function() {
    mostrarUsuariosAJAX()
    });
	
	//HACE VISIBLE Y RELLENA EL DIV QUE CONTIENE LAS PREGUNTAS
	function mostrarUsuariosAJAX(){

		$.ajax({
			url: 'AJAX/selectUsuariosBaja.php',
			type: "POST",
			beforeSend:function(){$('#listaUsuarios').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			$('#listaUsuarios').html(datos);},
			error:function(){
			$('#listaUsuarios').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
		});
	}
	
	//CAMBIA LA PREGUNTA VISUALIZADA EN EL HTML
	function cambiarUsuarioAJAX(){

	email = $("#select").val();

		$.ajax({
			url: 'AJAX/datosUsuario.php',
			type: "POST",
			data: "email="+email,
			beforeSend:function(){$('#mostrarUsuario').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			$('#mostrarUsuario').html(datos);},
			error:function(){
			$('#mostrarUsuario').html('<p class="error"><strong>El servidor parece que no responde</p>');
			}
		});
	}
	
	//GUARDA LA PREGUNTA EN LA BBDD Y XML
	function darBajaAJAX(){
		
		var email = $("#email").val();
			$.ajax({
			url: 'AJAX/darBajaAJAX.php',
			type: "POST",
			data: "email="+email,
			beforeSend:function(){$('#mensaje').html('<div><img src="images/loading.gif"/></div>')},
			success:function(datos){
			console.log(datos);
				if(datos=="OK")
					$('#mensaje').html('<p class="error"><strong>Usuario dado de baja</p>');
				else
					$('#mensaje').html('<p class="error"><strong>No se ha podido dar de baja el usuario</p>');	
				},
			error:function(){
			$('#mensaje').fadeIn().html('<p class="error"><strong>No se ha podido dar de baja el usuario</p>');
			}
		});
	}	
</script>
