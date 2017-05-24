<?php
include_once "db.php";

class usuario extends db{

	function __construct()
	{
		parent::__construct();
	}

	public function insertarUsuario($usuario,$nombre,$apellidos,$email,$password){
		if($this->buscarUsuario($usuario) != false){
	   		echo "Existe un usuario con este nombre de usuario";
			return false;
		}
		if ($this->checkearEmail($email)) {
			echo "Existe un usuario con este email";
			return false;
		}
	  $sqlInsercion="INSERT INTO usuarios(idUsuarios,Nombre,Apellidos,Correo,Usuario,rol,Pass,Altura,Peso,Foto)
		Values(NULL,'".$nombre."','".$apellidos."','".$email."','".$usuario."','user','".sha1($password)."',0,0,'perfilUser.jpg')";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado!=null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}

	public function checkearEmail($email){
	  	$sqlInsercion="SELECT * FROM usuarios WHERE Correo='".$email."'";
	     $resultado=$this->realizarConsulta($sqlInsercion);
	     if ($resultado->num_rows != null) {
	     	return true;
	     }else{
	     	return false;
	     }
	}

	 function buscarUsuario($user){
	    $sql="SELECT * FROM usuarios WHERE Usuario='".$user."'";
	    $resultado = $this->realizarConsulta($sql);
	    if ($resultado->num_rows != null) {
	     	return $resultado;
	     }else{
	     	return false;
	     }
	}
	function buscarLogin($usuario){
	    //Construimos la consulta  OPCION CON fetch_assoc     devuelve objeto mysqli
	    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
	    //Realizamos la consulta
	    $resultado=$this->realizarConsulta($sql);
	    if($resultado!=false){
	        return $resultado->fetch_assoc();
	    }else{
	        return null;
	      }
  	}
	 function buscarUsuarioInsert($usuario){
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
    return $resultado=$this->realizarConsulta($sql);
		}
  	public function actualizarUsuario($nombre,$apellidos,$email,$altura,$peso,$sexo,$id){
  		$sqlActualizar="UPDATE usuarios SET Nombre='".$nombre."',
																					Apellidos='".$apellidos."',
																					Correo='".$email."',
																					Altura='".$altura."',
																					Peso='".$peso."',
																					Sexo='".$sexo."'
																			WHERE idUsuarios='".$id."'";
  		return $resultado=$this->realizarConsulta($sqlActualizar);
  	}
		// ----Panel de Administracion---\\
		public function BorrarUsuario($Id){
		  $sql="DELETE FROM usuarios WHERE idUsuarios='".$Id ."'";
		  $borarUsuario=$this->realizarConsulta($sql);
		  if ($borarUsuario=!false) {
		    return true;
		  }else {
		    return false;
		  }
		}
		public function ActualizarRol($rol, $id){
		  $sql="UPDATE usuarios SET rol='" .$rol ."'
		                      WHERE idUsuarios='" .$id ."'";
		  $actualizarusuarios=$this->realizarConsulta($sql);
		  if ($actualizarusuarios=!false) {
		    return true;
		  }else {
		    return false;
		  }
		}
}
?>
