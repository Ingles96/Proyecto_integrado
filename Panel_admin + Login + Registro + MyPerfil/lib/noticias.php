<?php
include_once ("db.php");
/**
  Clase para la tabla noticias
 */
class noticias extends db{
  function __construct()
  {
    parent::__construct();
  }
  //-- Funcion para INSERTAR Noticias//////
    public function InsertarNoticia($titulo, $subtitulo, $descripcion, $fecha){
      $sql="INSERT INTO noticias(Titulo, Subtitulo, Descripcion, Fecha)
      VALUES ('".$titulo."', '".$subtitulo ."', '" .$descripcion ."', '" .$fecha ."')";
      $insertNoticia=$this->realizarConsulta($sql);
      if ($insertNoticia=!false) {
        return true;
      }else {
        return false;
      }
    }

  //-- Funcion para  ACTUALIZAR Noticias --/
    public function ActualizarNoticia($titulo, $subtitulo, $descripcion, $id){
      $sql="UPDATE noticias SET Titulo='" .$titulo ."',
                                Subtitulo='" .$subtitulo ."',
                                Descripcion='" .$descripcion ."'
                            WHERE idNoticias='" .$id ."'";
      $ActualizarNoticia=$this->realizarConsulta($sql);
      if ($ActualizarNoticia=!false) {
        return true;
      }else {
        return false;
      }
    }

  //-- Funcion para ELIMINAR Noticias --\\
    public function BorrarNoticia($Id){
      $sql="DELETE FROM noticias WHERE idNoticias='".$Id ."'";
      $borrarNoticia=$this->realizarConsulta($sql);
    if ($borrarNoticia=!false) {
        return true;
      }else {
        return false;
      }
    }
    //-- Funcion para MOSTRAR Noticias --\\
      public function MostrarNoticias(){

        $sql="SELECT * FROM noticias";
        return $mostrarNoticias=$this->realizarConsulta($sql);
        if ($mostrarNoticias=!false) {
          return true;
        }else {
          return false;
        }
  }
}
?>
