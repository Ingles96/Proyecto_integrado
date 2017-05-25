<?php

class db{
//////ATRIBUTOS PARA LA CONEXION//////
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="dietplus";

//////CONECTAR//////
  private $conexion;

//////CONTROL DE ERRORES//////
  private $error=false;
  private $error_msj="";

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
        $this->error_msj="No se ha podido realizar la conexion a la bd. Revisar base de datos o parámetros";
      }
  }
//////FUNCION PARA SABER SI HAY ERRORES//////
  function hayError(){
    return $this->error;
  }

//////DEVOLVER MENSAJE DE ERROR//////
  function msjError(){
    return $this->error_msj;
  }

//////METODO PARA REALIZAR CONSULTA EN LA BD//////
  public function realizarConsulta($consulta){
    if($this->error==false){
      $resultado = $this->conexion->query($consulta);
      return $resultado;
    }else{
      $this->error_msj="Imposible realizar la consulta: ".$consulta;
      return null;
    }
  }

//////METODO PARA REALIZAR LA INSERCCION EN LA BD//////
public function realizarInsert($insert){
  if($this->error==false){
    if (!$this->conexion->query($insert)) {
      echo "Falló la insercion en la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
      return false;
    }else {
      return true;
    }
  }else{
    $this->error_msj="Imposible realizar la insercion: ".$insert;
    return false;
  }
}

//////METODO PARA REALIZAR LA ACTUALIZACION EN LA BD//////
public function realizarActualizacion($update){
  if ($this->error==false) {
    if (!$this->conexion->query($update)) {
      echo "Fallo en la actuazlizacion de la tabla (" . $this->conexion->errno .")" . $this->conexion->error;
      return false;
    }else {
      return true;
    }
  }else {
    $this->error_msj="Imposible realizar la actualizacion: ".$update;
    return false;
  }
}

//////METODO PARA BORRAR DATOS DE LA BD//////
public function realizarBorrado($delete){
  if($this->error==false){
    if (!$this->conexion->query($delete)) {
      echo "Falló el borrado de la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
      return false;
    }else {
      return true;
    }
  }else{
    $this->error_msj="Imposible realizar el borrado: ".$update;
    return false;
    }
  }
}

?>
