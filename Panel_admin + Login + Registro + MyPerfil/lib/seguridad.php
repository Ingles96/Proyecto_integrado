<?php
/**
 * Clase encargada del control de seguridad de la app,usuarios despues cookies
 */
class Seguridad{

  private $usuario=null;
  //-- viene el sesion start en el construct, despues genero funciones para aladir el usuario y poder entrar para despues hacer logout --\\
  function __construct()
  {
    //-- Arrancamos la sesion --\\
    session_start();
    if(isset($_SESSION["usuario"])) $this->usuario=$_SESSION["usuario"];
  }
  public function getUsuario(){
    return $this->usuario;
  }
  public function addUsuario($usuario){
    $_SESSION["usuario"]=$usuario;
    $this->usuario=$usuario;
  }
  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }
}
?>
