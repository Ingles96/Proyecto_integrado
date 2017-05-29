<?php
include_once ("db.php");
/**
  Clase Mostrar los Ejercicios que ha selecionado el usuario a su Perfil      s
 */
class usuarios_ejerciciosvideos extends db{

  function __construct()
  {
    parent::__construct();
  }
  //-- Funcion para INSERTAR una dieta --\\
    public function InsertarEjerciciosFav($Usuarios_idUsuarios, $EjerciciosVideos_idEjerciciosVideos){
    $sql="INSERT INTO usuarios_ejerciciosvideos(Usuarios_idUsuarios, EjerciciosVideos_idEjerciciosVideos)
    VALUES ('".$Usuarios_idUsuarios."', '".$EjerciciosVideos_idEjerciciosVideos ."')";
    $insertDietas=$this->realizarConsulta($sql);
    if ($insertDietas=!false) {
      return true;
    }else {
      return false;
    }
  }
  //-- Funcion para ELIMINAR EjerciciosFav de MyPerfil --\\
  public function BorrarEjerciciosFav($Id,$Id_ej){
    $sql="DELETE FROM usuarios_ejerciciosvideos
    WHERE Usuarios_idUsuarios=".$Id." AND EjerciciosVideos_idEjerciciosVideos=".$Id_ej."";
    $borarDietas=$this->realizarConsulta($sql);
    if ($borarDietas=!false) {
      return true;
    }else {
      return false;
    }
  }

  //-- Funcion para MOSTRAR por Categoria Ejercicios en MyPerfil --\\
  public function MostrarAbdomen($id){
    $sql="SELECT *
          FROM usuarios_ejerciciosvideos, ejercicios_videos
          WHERE EjerciciosVideos_idEjerciciosVideos=idEjercicios_Videos
          AND Categoria='Abdomen'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarAbdomen=$this->realizarConsulta($sql);
    if ($mostrarAbdomen=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarPecho($id){
    $sql="SELECT *
          FROM usuarios_ejerciciosvideos, ejercicios_videos
          WHERE EjerciciosVideos_idEjerciciosVideos=idEjercicios_Videos
          AND Categoria='Pecho'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarPecho=$this->realizarConsulta($sql);
    if ($mostrarPecho=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarHombro($id){
    $sql="SELECT *
          FROM usuarios_ejerciciosvideos, ejercicios_videos
          WHERE EjerciciosVideos_idEjerciciosVideos=idEjercicios_Videos
          AND Categoria='Hombro'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarHombro=$this->realizarConsulta($sql);
    if ($mostrarHombro=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarBrazo($id){
    $sql="SELECT *
          FROM usuarios_ejerciciosvideos, ejercicios_videos
          WHERE EjerciciosVideos_idEjerciciosVideos=idEjercicios_Videos
          AND Categoria='Brazo'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarBrazo=$this->realizarConsulta($sql);
    if ($mostrarBrazo=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarEspalda($id){
    $sql="SELECT *
          FROM usuarios_ejerciciosvideos, ejercicios_videos
          WHERE EjerciciosVideos_idEjerciciosVideos=idEjercicios_Videos
          AND Categoria='Espalda'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarEspalda=$this->realizarConsulta($sql);
    if ($mostrarEspalda=!false) {
      return true;
    }else {
      return false;
    }
  }
  public function MostrarPiernas($id){
    $sql="SELECT *
          FROM usuarios_ejerciciosvideos, ejercicios_videos
          WHERE EjerciciosVideos_idEjerciciosVideos=idEjercicios_Videos
          AND Categoria='Piernas'
          AND Usuarios_idUsuarios=".$id."";
    return $mostrarPiernas=$this->realizarConsulta($sql);
    if ($mostrarPiernas=!false) {
      return true;
    }else {
      return false;
    }
  }
}
?>
