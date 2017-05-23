<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body>

  <h1>Registrate</h1><hr>

	<?php
		include 'lib/usuarios.php';
    //-- Si no hemos enviado nada se visualizara el formulario --\\
		if ((empty($_POST['Usuario'])) && (empty($_POST['Pass']))  && (empty($_POST['Pass2'])) && (empty($_POST['Nombre'])) && (empty($_POST['Apellidos']))){

	?>

  <form class="" action="registro.php" method="post">

	<label>Usuario</label>
  <input type="text" name="Usuario"  placeholder="Introduce tu usuario" required/><br><br>

	<label>Contraseña</label>
  <input type="password" name="Pass" placeholder="Introduce tu contraseña" required/><br><br>

	<label>Rescriba su contraseña</label>
  <input type="password" name="Pass2"  placeholder="Vuelve a introducir tu contraseña" required/><br><br>

	<label>Nombre</label>
  <input type="text" name="Nombre" placeholder="Introduce tu nombre"  required/><br><br>

	<label>Apellidos</label>
  <input type="text" name="Apellidos" placeholder="Introduce tu apellido" required/><br><br>

	<input type="submit" name="" value="ENVIAR">

	<?php
	}
  /*-- Si el Formulario ha sido enviado que haga la comprobacion de que funciona --*/
	if((isset($_POST['Usuario'])) && (!empty($_POST['Usuario'])) && (isset($_POST['Pass'])) && (!empty($_POST['Pass'])) && (isset($_POST['Pass2'])) && (!empty($_POST['Pass2'])) && (isset($_POST['Nombre'])) && (!empty($_POST['Nombre']))
   && (isset($_POST['Apellidos'])) && (!empty($_POST['Apellidos']))) {

    $usuario = new usuario();
		$resultado=$usuario->mostrarUsuario($_POST['Usuario']);
      //-- Comprueba que los dos correos son iguales --\\
			if (($_POST['Usuario'])==($resultado['Usuario'])){
				echo "<font color='red'><h3>Este usuario ya existe, porfavor introduce otro.</h3></font><br><br>";
				?>
				<form action="registro.php" method="post">

				<label>Usuario:</label>
        <input type="text" name="Usuario"  placeholder="Introduce tu usuario" required/><br><br>

				<label>Contraseña</label><input type="password" name="Pass" placeholder="Introduce tu contraseña"  value="<?=$_POST['Pass']?>" required/><br><br>

				<label>Reinscribe tu contraseña:</label>
        <input type="password" name="Pass2"  placeholder="Vuelve a introducir tu contraseña" value="<?=$_POST['Pass2']?>" required/><br><br>

				<label>Nombre:</label>
        <input type="text" name="Nombre" placeholder="Introduce tu nombre" value="<?=$_POST['Nombre']?>" required/><br><br>

				<label>Apellidos</label>
        <input type="text" name="Apellidos" placeholder="Introduce tu apellido" value="<?=$_POST['Apellidos']?>" required/><br><br>

				<input type="submit" name="" value="ENVIAR">
				<?php

			}else{
  				if(($_POST['Pass'])==($_POST['Pass2'])) {
  					echo "Las contraseñas coinciden.<br><br>";
  					echo "Registrado correctamente<br><br>";
  					echo "Logeate <a href=index.php> Aquí! </a>";


  					$registro = new usuario();
  					$registro->insertarUser($_POST['Usuario'],$_POST['Pass'],$_POST['Pass2'],$_POST['Nombre'],$_POST['Apellidos']);

  				}else{
  					echo "Hay un error, por favor realize otra vez el formulario<br><br>";
  					echo "<a href=registro.php>Registrate</a>";
  					return null;
  				}
   		}
		}
	?>
  </form>
</body>
</html>
