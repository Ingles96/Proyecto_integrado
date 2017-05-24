<?php
	include '../lib/ejercicios.php';
	$ejercicios=new ejercicios();
	if($_POST['Caso']=="Eliminar"){/*Comprobamos si le han dado click a Eleminar*/
		$ejercicios->BorrarEjercicio($_POST['Id']);/* Eleminamos el producto seleccionado*/
		echo 'El Ejercicio se ha eliminado'; /*Este es el mensaje que tiene que salir en el alert()*/
	}
	else if($_POST['Caso']=="Modificar"){/*Comprobamos si le han dado click a Modificar*/
		$ejercicios->ActualizarEjercicio($_POST['Nombre'],$_POST['Categoria'],$_POST['Url'],$_POST['Id']);
		echo 'El Ejercicio se ha modificado';
	}
?>
