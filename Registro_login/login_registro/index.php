<?php
include 'lib/usuarios.php';
include 'lib/seguridad.php';
$login = new usuario();
$seguridad = new seguridad();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
  </head>
  <body>

  	<h1>Inicio</h1>
    <br>
  	<?php
    //-- El Formulario solo se vera en el caso de que el Usuario y el Pass esten vacias --\\
  	if((empty($_POST['Usuario'])) && (empty($_POST['pass']))) {
  			?>

  	<form action="index.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="Usuario"  placeholder="Escribe tu nombre de usuario" required/><br><br>
        <label>Contraseña:</label>
  			<input type="password" name="Pass" placeholder="Escribe tu contraseña" required/><br><br>

  			<input type="submit" name="" value="ENTRAR" required/><br><br>

  			<a href="registro.php">Registrarse</a>


  	</form>

  	<?php
  	}
      //-- Si la Contraseña y el usuario Existe Y que NO este vacio --\\
  		if ((isset($_POST['Usuario'])) && (!empty($_POST['Usuario'])) && (isset($_POST['Pass'])) && (!empty($_POST['Pass']))){

          //-- llamamos la funcion de login para recoger los usuarios de la DB --\\
  				$usuario=$login->login($_POST['Usuario']);
            //-- En este if comprobamos que el usuario $_POST['usuario'] que es lo que recivimos del formulario es igual ha algun usuario de la DB ya registrado --\\
  					if ($usuario['Usuario']==$_POST['Usuario']){
  						echo "Usuario encontrado<br>";
                //-- Comprobamos que las contraseñas sean las mismas (la de la DB y la del Login) --\\
    						if ((sha1($_POST['Pass'])==($usuario['Pass']))){
    							echo "Logeado correctamente.<br><br>";
                  //-- Al saber si el usuario ha sido verficado añadimos el usuario a $_SESION['usuario']- --\
    							$seguridad->addUsuario($usuario['Usuario']);
                  //-- Al ver que el usuario a sido añadido a la session le ponemos un Hypervinculo que nos lleva a perfil con la informacion del correo electronico de el u --\\
    							echo "Inicia sesion en tu <a href=MiPerfil.php?Usuario=".$usuario['Usuario'].">perfil</a>";

                  /** En l caso que el loguien no se efectue corecctamente o bien por la contraseña o usuario pasara esto */
                  //-- Este es en el caso que en la VERIFICACION DEL PASS sea ERRONEA nos envie a index --\\
                  }else{
    							echo "Las contraseñas no coinciden, vuelve a <a href=index.php>logearte</a><br><br>";
    							}
                //-- En el caso de que el usuario no coincida en la DB que nos envie a Registrarnos --\\
  						}else {
  							echo "Si no tienes cuenta, registrate aquí ! <a href=registro.php>REGISTRO</a><br><br>";
  							}
  						}
  		?>
</body>
</html>
