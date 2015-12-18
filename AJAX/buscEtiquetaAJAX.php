<?php session_start(); 
	include_once ("../conectbd.php");
	$link=Conectar();	
	
		
		$result=mysqli_query($link, "select codfoto, nombre, imagen, type, codalbum from fotografia where etiqueta1='".$_REQUEST['etiqueta']."' or etiqueta2='".$_REQUEST['etiqueta']."'");
		if(mysqli_num_rows($result)!=0) {		
			while ($row = mysqli_fetch_array($result)) {
				$codalbum =$row['codalbum'];
				$result2=mysqli_query($link, "SELECT nombre FROM album WHERE codigo = '$codalbum' and socio='".$_SESSION["useremail"]."'");		
					
				if(mysqli_num_rows($result2)!=0){	
					echo '<table id="tablaUsuarios">';
					while ($row2 = mysqli_fetch_array($result2)) {
							echo'<tr>';
								echo'<td>'.$row2["nombre"].'</td>';
								echo'<td>'.$row["nombre"].'</td>';
								echo '<td><img src="data:image/png;base64,'.base64_encode( $row['imagen'] ).'" width=200 height =200/></td>';					
							echo'</tr>';
					}
				mysqli_free_result($result2);	
				}
			}
		}	
	echo'</table>';
	mysqli_free_result($result);
	mysqli_close($link);

?> 