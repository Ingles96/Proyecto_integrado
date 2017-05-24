	<!-- Este fichero esta para que se llegue a subir los archivos y insertarlo en la BD -->
<?php

	include '../lib/noticias.php';
	$noticias=new noticias();
	//-- Esto de aqui sirve para verificar que EXISTE el lo que hemos enviado del formulario. --\\
		if(!isset($_POST)){
			header("Location: agregarNoticias.php");
		}else{
			//-- Insertamos el producto --\\
			$noticias->InsertarNoticia($_POST['titulo'],$_POST['subtitulo'],$_POST['descripcion'],$_POST['fecha']);
			header ("Location: agregarNoticias.php?Noticias=La noticia ha sido insertada");
		 }
?>
