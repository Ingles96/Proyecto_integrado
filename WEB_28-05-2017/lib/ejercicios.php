<?php
include_once ("db.php");
/**
  Clase para la tabla Ejercicios - Videos -
 */
class ejercicios extends db{
  function __construct()
  {
    parent::__construct();
  }
  //-- Funcion para Insertar Ejercicios --\\
    public function InsertarEjercicio($duracion, $nombre, $categoria, $url){
      $sql="INSERT INTO ejercicios_videos(Duracion, Nombre, Categoria, Url)
      VALUES ('".$duracion."','".$nombre ."','".$categoria ."','".$url."')";
      $insertEjercicio=$this->realizarConsulta($sql);
      if ($insertEjercicio=!false) {
        return true;
      }else {
        return false;
      }
    }
  //-- Funcion para ACTUALIZAR Ejercicio --\\
    public function ActualizarEjercicio($nombre, $categoria, $url, $id){
      $sql="UPDATE ejercicios_videos SET Nombre='".$nombre ."',
                                         Categoria='".$categoria ."',
                                         Url='".$url."'
                                     WHERE idEjercicios_Videos='".$id ."'";
      $actualizarEjercicio=$this->realizarConsulta($sql);
      if ($actualizarEjercicio=!false) {
        return true;
      }else {
        return false;
      }
    }
  //-- Funcion para ELIMINAR Ejercicio --\\
    public function BorrarEjercicio($Id){
      $sql="DELETE FROM ejercicios_videos WHERE idEjercicios_Videos='".$Id ."'";
      $borrarEjercicio=$this->realizarConsulta($sql);
      if ($borrarEjercicio=!false) {
        return true;
      }else {
        return false;
      }
    }
    //-- Funcion para MOSTRAR Ejercicio --\\
    public function MostrarEjercicios(){
      $sql="SELECT *
            FROM ejercicios_videos
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
    public function MostrarPecho(){
      $sql="SELECT *
            FROM ejercicios_videos
            WHERE Categoria='Pecho'
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
    public function MostrarHombro(){
      $sql="SELECT *
            FROM ejercicios_videos
            WHERE Categoria='Hombro'
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
    public function MostrarBrazo(){
      $sql="SELECT *
            FROM ejercicios_videos
            WHERE Categoria='Brazo'
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
    public function MostrarEspalda(){
      $sql="SELECT *
            FROM ejercicios_videos
            WHERE Categoria='Espalda'
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
    public function MostrarPiernas(){
      $sql="SELECT *
            FROM ejercicios_videos
            WHERE Categoria='Piernas'
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
    public function MostrarAbdomen(){
      $sql="SELECT *
            FROM ejercicios_videos
            WHERE Categoria='Abdomen'
            ";
      return $mostrarDietasProteicas=$this->realizarConsulta($sql);
      if ($mostrarDietasProteicas=!false) {
        return true;
      }else {
        return false;
      }
    }
}
?>
