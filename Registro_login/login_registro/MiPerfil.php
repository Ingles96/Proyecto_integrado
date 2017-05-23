<?php
include 'lib/seguridad.php';
$seguridad = new seguridad();
	if ($seguridad->getUsuario()== null){
		header('Location: index.php');
		exit;
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
	<?php
		if ((empty($_POST['Usuario']))&&
		(empty($_POST['Nombre']))&&
		(empty($_POST['Apellidos']))){

	?>
	<h1>Bienvenido al perfil</h1>
	<br>
	<form  action="MiPerfil.php" method="post">

	<label>Usuario:</label><input type="text" name="Usuario"  placeholder="Usuario" value="<?=$_GET['Usuario']?>" readonly required/><br><br>

	<label>Nombre:</label><input type="text" name="Nombre" placeholder="Actualiza tu nombre"><br><br>

	<label>Apellidos:</label>
	<input type="text" name="Apellidos" placeholder="Actualiza tu apellido"><br><br>


	    <label for="imagen">Imagen:</label>
	    <input id="imagen" name="imagen" size="30" type="file" />

	    <input name="submit" type="submit" value="Guardar" />

	<br><br><input type="submit" name="" value="ACTUALIZAR">

	</form>

	<form  action="MiPerfil.php" method="post">
	<input type="hidden" name="logout" value="Logout">
	<input type="submit" name="logout" value="LogOut">
	<?php
	}
	//-- En el caso que le demos al botton de desconectarse, se enviara por POST logut y efectuara la funcion de desconectar --\\
	if (isset($_POST['logout'])){
			echo "Logout correcto";
			$seguridad->logout();
			header('Location: index.php');
		}
		/*En el caso de que se reciba informacion de POST  de actualizar se acualizara*/
	if((isset($_POST['Nombre'])) && (!empty($_POST['Nombre'])) && (isset($_POST['Apellidos'])) && (!empty($_POST['Apellidos'])) && (isset($_POST['Usuario'])) && (!empty($_POST['Usuario']))) {

		include 'lib/usuarios.php';
		$user = new usuario();
		$user->updateUser($_POST['Nombre'],$_POST['Apellidos'],$_POST['Usuario']);
		echo "Tu usuario ha sido actualizado<br>";
		echo "<a href=miperfil.php>Volver al perfil</a>";
		}
	?>
	</body>
	</html>
