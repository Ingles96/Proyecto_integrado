<?php
	include '../lib/dietas.php';
	$dietas=new dietas();
	if($_POST['Caso']=="Eliminar"){/*Comprobamos si le han dado click a Eleminar*/
		$dietas->BorrarDietas($_POST['Id']);/* Eleminamos el producto seleccionado*/
		echo 'La dieta se ha eliminado'; /*Este es el mensaje que tiene que salir en el alert() en el caso que lo eliminaremos*/
	}
	else if($_POST['Caso']=="Modificar"){/*Comprobamos si le han dado click a Modificar*/
		$dietas->ActualizarDietas($_POST['Nombre'],$_POST['Categoria'],$_POST['Descripcion'],$_POST['Id']);
		echo 'La dieta se ha modificado';/*Este es el mensaje que tiene que salir en el alert() en el caso que lo eliminaremos*/
	}
?>
