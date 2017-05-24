<?php
include_once ("db.php");
/**
  Clase para la tabla Dietas
 */
class dietas extends db{

  function __construct()
  {
    parent::__construct();
  }
  //-- Funcion para INSERTAR una dieta --\\
    public function InsertarDietas($nombre, $descripcion, $categoria, $fecha){
    $sql="INSERT INTO dietas(Nombre, Descripcion, Categoria, Fecha)
    VALUES ('".$nombre."', '".$descripcion ."', '" .$categoria ."', '" .$fecha ."')";
    $insertDietas=$this->realizarConsulta($sql);
    if ($insertDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  //-- Funcion para ACTUALIZAR Dietas --\\
  public function ActualizarDietas($nombre, $categoria, $descripcion, $id){
    $sql="UPDATE dietas SET Nombre='" .$nombre ."',
                            Categoria='" .$categoria ."',
                            Descripcion='" .$descripcion ."'
                        WHERE idDietas='" .$id ."'";
    $actualizarDietas=$this->realizarConsulta($sql);
    if ($actualizarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  //-- Funcion para ELIMINAR Dietas --\\
  public function BorrarDietas($Id){
    $sql="DELETE FROM dietas WHERE idDietas='".$Id ."'";
    $borarDietas=$this->realizarConsulta($sql);
    if ($borarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
    //-- Funcion para MOSTRAR Dietas --\\
  public function MostrarDietas(){
    $sql="SELECT * FROM dietas";
    return $mostrarDietas=$this->realizarConsulta($sql);
    if ($mostrarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarUsuarios(){
    $sql="SELECT * FROM usuarios";
    return $mostrarNoticias=$this->realizarConsulta($sql);
    if ($mostrarNoticias=!false) {
      return true;
    }else {
      return false;
    }
  }
}
?>
