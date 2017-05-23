<?php
include 'db.php';

class usuario extends db
{

  function __construct()
  {
    //-- Realizamos la conexion a la base de datos --\\
    parent::__construct();

  }



  public function insertarUser($usuario,$nombre,$apellidos,$correo,$pass){

    if ($this->hayError()==true){
        return null;

    }else{

      $sqlInserction="INSERT INTO usuarios (Usuario,Nombre,Apellidos,Correo,Pass)
            VALUES ('".$usuario."', '".$nombre."', '".$apellidos."','".$correo."', '".sha1($pass)."')";

      $this->conexion()->query($sqlInserction);
    }

  }


  public function mostrarUsuario($usuario){

    if ($this->hayError()==true){
		return null;

	}else{

		$resultado = $this->conexion()->query("SELECT * FROM usuarios WHERE Usuario='".$usuario."'");
		return $resultado->fetch_assoc();
	}

	}
  //-- Esta funcion es para buscar un Usuario especifico en la BD para Verificar si es el Usuario del Formulario --\\
  public function login($usuario){
    if ($this->hayError()==true){
    return null;

  	}else{
      //-- hacemos una consulta de el usuario del formulario --\\
      $usuarioBuscado = $this->conexion()->query("SELECT * FROM usuarios WHERE Usuario='".$usuario."'");
      //-- Mostramos solo una Linea de la consultya --\\
      return $usuarioBuscado->fetch_assoc();
    }

    }

  //-- Con esta funcion actualizamos un Usuario --\\
  public function updateUser($nombre,$apellidos,$usuario){
	   if ($this->hayError()==true){
    return null;
  	}else{
       $this->conexion()->query("UPDATE usuarios SET Nombre='".$nombre."',Apellidos='".$apellidos."' WHERE Usuario='".$usuario."'");
    }
  }
}
?>
