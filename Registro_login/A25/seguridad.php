<?php
include "lib/Usuario.php";
include "lib/Seguridad.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fichero de control de seguridad</title>
  </head>
  <body>
    <div>
    <?php
    //Control de las acciones a realizar
    if(isset($_POST["accion"])){
      //GEneramos el nuevo objeto
      $user=new Usuario();
      $seguridad=new Seguridad();
      //Registro de usuario
      if($_POST["accion"]=="registro"){
        if($_POST["Pass"]==$_POST["Pass1"]){
          $usurioReg=$user->insertarUsuario($_POST["Nombre"],$_POST["Apellidos"],$_POST["Usuario"],
                                 $_POST["Correo"],$_POST["Pass"]);

echo "ENHORABUENA HAS SIDO REGISTRADO CORRECTAMENTE<br>";
echo "<a href=index.php>Iniciar sesion</a>";
  header('Location:./index.php');


                               }else{
                                 //Contraseñas diferentes
                                 echo "<h2>Las contraseñas no son iguales</h2></br>";
                                 echo "<a href=registro.php>Volver al formulario de registro</a>";
                               }
        }else{
            //Usuario no insertado
            //-- En el caso que le demos al botton de desconectarse, se enviara por POST logut y efectuara la funcion de desconectar --\\
            if (isset($_POST['logout'])){
                echo "Logout correcto";
                $seguridad->logout();
                header('Location: index.php');
              }
        }


      //Login de usuario
      if ($_POST["accion"]=="login") {
        if($seguridad->comprobarRemember()){
          echo "<h2>Usuario encontrado</h2></br>";
          header("Location: miperfil.php");
        }else{

          $usurioReg=$user->buscarUsuario($_POST["Usuario"]);
          if($usurioReg!=null)
          {
            //Comparamos los passwords
            if($usurioReg["Pass"]==sha1($_POST["Pass"])){
              echo "<h2>Usuario encontrado</h2></br>";
              if(isset($_POST["remember"])) $seguridad->addUsuario($usurioReg["Usuario"],$usurioReg["Pass"],true);
              else $seguridad->addUsuario($usurioReg["Usuario"],$usurioReg["Pass"],false);
            }else{
              echo "<h2>Las contraseñas no coinciden</h2></br>";
              echo "<a href=miperfil.php>Volver al formulario de login</a>";
            }
          }else{
            echo "<h2>Usuario no encontrado</h2></br>";
            echo "<a href=miperfil.php>Volver al formulario de login</a>";
          }
        }
      }
    }


      //-- En el caso que le demos al botton de desconectarse, se enviara por POST logut y efectuara la funcion de desconectar --\\
      if (isset($_POST['logout'])){
          echo "Logout correcto";
          $seguridad->logout();
          header('Location: index.php');
        }

    ?>
    </div>
  </body>
</html>
