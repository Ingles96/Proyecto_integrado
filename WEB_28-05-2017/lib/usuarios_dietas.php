<?php
include_once ("db.php");
/**
  Clase para la tabla Dietas
 */
class usuarios_dietas extends db{

  function __construct()
  {
    parent::__construct();
  }
  //-- Funcion para INSERTAR una dieta --\\
    public function InsertarDietasFav($Usuarios_idUsuarios, $Dietas_idDietas){
    $sql="INSERT INTO usuarios_dietas(Usuarios_idUsuarios, Dietas_idDietas)
    VALUES (".$Usuarios_idUsuarios.",".$Dietas_idDietas .")";
    $insertDietas=$this->realizarConsulta($sql);
    if ($insertDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  //-- Funcion para ELIMINAR Dietas de los favoritos de MyPerfil.php--\\
  public function BorrarDietasFav($Id,$Id_die){
    $sql="DELETE FROM usuarios_dietas
          WHERE Usuarios_idUsuarios=".$Id." AND Dietas_idDietas=".$Id_die."";
    $borarDietas=$this->realizarConsulta($sql);
    if ($borarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  //-- Funciones por Categoria --\\
    //-- Funcion para MOSTRAR Dietas --\\
  public function MostrarVegetariana($id){
    $sql="SELECT *
          FROM dietas , usuarios_dietas
          WHERE idDietas=Dietas_idDietas
          AND Categoria='Vegetariana'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarDietas=$this->realizarConsulta($sql);
    if ($mostrarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarHipocaloricas($id){
    $sql="SELECT *
          FROM dietas , usuarios_dietas
          WHERE idDietas=Dietas_idDietas
          AND Categoria='Hipocaloricas'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarDietas=$this->realizarConsulta($sql);
    if ($mostrarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarHipercaloricas($id){
    $sql="SELECT *
          FROM dietas , usuarios_dietas
          WHERE idDietas=Dietas_idDietas
          AND Categoria='Hipercaloricas'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarDietas=$this->realizarConsulta($sql);
    if ($mostrarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarProteicas($id){
    $sql="SELECT *
          FROM dietas , usuarios_dietas
          WHERE idDietas=Dietas_idDietas
          AND Categoria='Proteicas'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarDietas=$this->realizarConsulta($sql);
    if ($mostrarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarOtrasDietas($id){
    $sql="SELECT *
          FROM dietas , usuarios_dietas
          WHERE idDietas=Dietas_idDietas
          AND Categoria='Otras dietas'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarDietas=$this->realizarConsulta($sql);
    if ($mostrarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
}
?>
