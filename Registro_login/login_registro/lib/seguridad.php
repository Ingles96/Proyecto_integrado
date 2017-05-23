<?php

class seguridad
{
	private $usuarios=null;

  function __construct()
  {
		//-- Iniciamos session en el momento que hacemos el include --\\
    session_start();
		if(isset($_SESSION['Usuario'])){
			$this->usuarios=$_SESSION['Usuario'];
		}

  }
	//-- Funcion para mostrar el nombre de los Usuarios --\\
  public function getUsuario(){
	return $this->usuarios;
  }
	//-- Añade el Usuarioo de la base de datos a la sesion --\\
  public function addUsuario($usuario){
	$_SESSION['Usuario']=$usuario;
	$this->usuarios=$usuario;
  }
	//-- Funcion que elimina La sesiones --\\
  public function logout(){
    $_SESSION=[];
	  session_destroy();
  }
}
  ?>
