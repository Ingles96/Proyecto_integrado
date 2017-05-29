	<!-- Este fichero esta para que se llegue a subir los archivos y insertarlo en la BD -->
<?php
	include '../lib/ejercicios.php';
	$ejercicios=new ejercicios();
	// -- Esto de aqui sirve para verificar que EXISTE el lo que hemos enviado del formulario. --\\
		if(!isset($_POST)){
			header("Location: agregarEjercicios.php");
		}else{
			//-- Insertamos el Ejercicio --\\
			$ejercicios->InsertarEjercicio($_POST['duracion'],$_POST['nombre'],$_POST['categoria'],$_POST['url']);
			// $ejercicios->InsertarEjercicio('11:12','hgjhj','sdsds','sdsdsds');
			header ("Location: agregarEjercicios.php?Ejercicios=El Ejercicio ha sido insertado");
		 }
?>
