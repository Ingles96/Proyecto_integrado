<?php
include "db.php";
/**
 *
 */
class Usuario extends db
{
  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
  //Insertamos un nuevo usuario
  public function insertarUsuario($nombre,$apellidos,$usuario,$correo,$pass){
    //Construimos la consulta
    $sql="INSERT INTO usuarios (Usuario,Nombre,Apellidos,Correo,Pass)
          VALUES ('".$usuario."', '".$nombre."', '".$apellidos."','".$correo."', '".sha1($pass)."')";

    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from usuarios ORDER BY idUsuarios DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  //DEvolvemos un nuevo usuario
  function buscarUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuarios WHERE Usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
}
 ?>
