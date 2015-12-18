<?php session_start(); 
	include_once ("../conectbd.php");
	$link=Conectar();	
	
		
		$result=mysqli_query($link, "select codfoto, nombre, imagen, type, codalbum from fotografia");
		if(mysqli_num_rows($result)!=0) {		
			while ($row = mysqli_fetch_array($result)) {
				$codalbum =$row['codalbum'];
				$result2=mysqli_query($link, "SELECT nombre FROM album WHERE codigo = '$codalbum' and socio='".$_SESSION["useremail"]."'");		
					
				if(mysqli_num_rows($result2)!=0){	
					while ($row2 = mysqli_fetch_array($result2)) {
							//GENERA UN SELECT CON TODOS LOS USUARIOS SIN DAR DE ALTA
							echo 'Foto:<br/>';
							echo '<select id="selectfoto" onChange="cambiarFotosAJAX()">';
							echo "<option value='0'>--Seleccione:--</option>";
							while ($row = mysqli_fetch_assoc($result))
							{
								echo "<option value=". $row["codfoto"].">". $row["nombre"] ."</option>";
							}
							echo '</select>';

					}
				mysqli_free_result($result2);	
				}
			}
		}	
	echo'</table>';
	mysqli_free_result($result);
	mysqli_close($link);

?> 