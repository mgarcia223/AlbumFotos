<?php
	include_once ('funciones.php');
	
if ($_SESSION['rol']=="socio"){ //MENU DE SOCIO  ?>
	
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='crearAlbum.php'>Crear album</a></span>
		<span><a href='subirFotos.php'>Subir fotografias</a></span>
		<span><a href='etiquetarFotos.php'>Etiquetar fotografia</a></span>
		<span><a href='consultarAlbum.php'>Consultar album</a></span>
		<span><a href='buscarEtiqueta.php'>Buscar etiqueta</a></span>
		<span><a href='consultarFotosSocio.php'>Fotografias</a></span>
		<span><a href='cambiarAcceso.php'>Cambiar acceso</a></span>
	</nav>
	
	
<?php	
}else if($_SESSION['rol']=="administrador"){ //MENU DE ADMINISTRADOR ?>

	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='darAlta.php'>Solicitud alta</a></span>
		<span><a href='darBaja.php'>Dar de baja</a></span>
		<span><a href='eliminarAlbum.php'>Eliminar album</a></span>
		<span><a href='eliminarFotos.php'>Eliminar foto</a></span>
	</nav>
	
	
<?php
}else{//MENU DE USUARIO ANONIMO ?>
	
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='creditos.php'>Creditos</a></span>
		<span><a href='consultarFotosAnonimo.php'>Fotos</a></span>
	</nav>

<?php	
}
?>

		


