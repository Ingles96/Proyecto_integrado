<?php
	include '../lib/usuario.php';
	$usuarios=new usuario();
	if($_POST['Caso']=="Eliminar"){/*Comprobamos si le han dado click a Eleminar*/
		$usuarios->BorrarUsuario($_POST['Id']);/* Eleminamos el producto seleccionado*/
		echo 'El Usuario se ha eliminado'; /*Este es el mensaje que tiene que salir en el alert()*/
	}
	else if($_POST['Caso']=="Modificar"){/*Comprobamos si le han dado click a Modificar*/
		$usuarios->ActualizarRol($_POST['Rol'],$_POST['Id']);
		echo 'El rol del Usuario ha sido modificado';
	}
?>
