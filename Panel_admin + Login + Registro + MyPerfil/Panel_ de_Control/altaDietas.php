	<!-- Este fichero esta para que se llegue a subir los archivos y insertarlo en la BD -->
<?php

	include './lib/dietas.php';
	$dietas=new dietas();
	//-- Esto de aqui sirve para verificar que EXISTE el lo que hemos enviado del formulario. --\\
		if(!isset($_POST)){
		header("Location: agregarDietas.php");
		}else{
			//-- Insertamos el producto --\\
			$dietas->InsertarDietas($_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['fecha']);
			header ("Location: agregarDietas.php?Dietas=La dieta ha sido insertada");
		 }
?>
