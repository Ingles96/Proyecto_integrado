<?php

class db
{
  //-- Variables de Conexion --\\
  private $ip="localhost";
  private $usuario="root";
  private $contraseña="";
  private $db="dietplus";

  //-- Variable de verificacion de conexion --\\
  private $conexion;

  //-- Variable de verificacion de error --\\
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->ip, $this->usuario, $this->contraseña, $this->db);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  //-- Funcion para saber si hay error en la conexion --\\
  function hayError(){
    return $this->error;
  }

  function conexion(){
	return $this->conexion;
  }


  public function realizarConsulta($consulta){
    if($this->error==false){
      $resultado = $this->conexion->query($consulta);
      return $resultado;
    }else{
      $this->error="Imposible realizar la consulta: ".$consulta;
      return null;
    }
  }

}
