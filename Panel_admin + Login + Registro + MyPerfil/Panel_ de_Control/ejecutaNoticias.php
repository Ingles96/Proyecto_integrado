<?php
	include './lib/noticias.php';
	$noticias=new noticias();
	if($_POST['Caso']=="Eliminar"){/*Comprobamos si le han dado click a Eleminar*/
		$noticias->BorrarNoticia($_POST['Id']);/* Eleminamos el producto seleccionado*/
		echo 'La noticia se ha eliminado'; /*Este es el mensaje que tiene que salir en el alert()*/
	}
	else if($_POST['Caso']=="Modificar"){/*Comprobamos si le han dado click a Modificar*/
		$noticias->ActualizarNoticia($_POST['Titulo'],$_POST['Subtitulo'],$_POST['Descripcion'],$_POST['Id']);
		echo 'La noticia se ha modificado';
	}
?>
