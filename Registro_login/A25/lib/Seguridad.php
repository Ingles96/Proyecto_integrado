<?php
/**
 * Clase encargada del control de seguridad de la app
 */
class Seguridad
{
  private $usuario=null;
  function __construct()
  {
    //Arrancamos la sesion
    session_start();
    if(isset($_SESSION["Usuario"])) $this->usuario=$_SESSION["Usuario"];
  }
  public function getUsuario(){
    return $this->usuario;
  }
  public function addUsuario($usuario,$pass,$remember=false){
    //GEnerando la variable de sesion
    $_SESSION["Usuario"]=$usuario;
    $this->usuario=$usuario;
    //Almacenaremos el user/pass cookies
    if($remember)
    {
      setcookie("Usuario",$usuario,time()+(60*60));
      setcookie("Pass0",$pass,time()+(60*60));
    }
  }
  public function comprobarRemember(){
    if(isset($_COOKIE["Usuario"])){
      $_SESSION["Usuario"]=$_COOKIE["Usuario"];
      return true;
    }else{
      return false;
    }
  }
  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }
}
 ?>
