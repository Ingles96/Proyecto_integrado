<?php
include "./lib/usuario.php";
include "./lib/seguridad.php";

$user=new usuario();
$seguridad = new Seguridad();

if(isset($_POST["accion"])){
     //Registro de usuario
     if($_POST["accion"]=="registro"){
       if($_POST["contr1"]==$_POST["contr2"]){
         $usurioReg=$user->insertarUsuario($_POST['usuario'],$_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['contr1']);
         if($usurioReg!=null){
            header("Location: inicio.php?UsuarioCorrect=El usuario ha sido registrado correctamente");
         }else{
           header("Location: inicio.php?UsuarioCorrect=Existe un  usuario o un Correo con ese nombre");
         }
       }else{
        header("Location: inicio.php?UsuarioCorrect=Las contraseñas no son Iguales. Intente registrarse de nuevo con las contraseñas iguales.");
       }
     }
     //-- Login de usuario --\\
     elseif ($_POST["accion"]=="login") {
			$resultado=$user->buscarLogin($_POST["usuario"]);
      var_dump($resultado);
			if($resultado!=null){
				// Comparamos los passwords     CON sha1 esta encriptado...
				if($resultado["Pass"]==sha1($_POST["contr1"])){
					//con esta funcion hace sesion start en miperfil.php
					$seguridad->addUsuario($_POST["usuario"]);
          //-- Cuando este logueado te renvia a myperfil.php --\\
					header('Location: myPerfil.php?UsuarioCorrect=Bienvinido, te estabamos esperando');
				}else{
          //-- Cuando las contraseña es incorrecta --\\
         header('Location: inicio.php?UsuarioCorrect=Las contraseñas no coinciden con su Usuario');
				}
			}else{
        //-- Cuando el usuario no existe --\\
        header('Location: inicio.php?UsuarioCorrect=Su Usuario no Existe, por favor registrese.');
			}
		}
     //-- LogOut --\\
     elseif ($_POST["accion"]=="logout") {
       $seguridad->logOut();
       header('Location: inicio.php?UsuarioCorrect=Gracias por disfrutar de nuestros servicios.');
     }
 }
?>
