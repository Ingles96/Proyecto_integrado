<?php

include 'db.php';
class noticia extends db{
  function __construct(){
    parent::__construct();
  }

/////DEVOLVER NOTICIA NOMBRE/////
  public function DevolverTituloNombre($nombre){
    $sql="SELECT * FROM noticias WHERE Titulo='" .$nombre ."'";
    $devolverNoticia=$this->realizarConsulta($sql);
    if($devolverNoticia!=null){
      $tablaTitulo=[];
      while($fila=$devolverNoticia->fetch_assoc()){
        $tablaTitulo[]=$fila;
      }
      return $tablaTitulo;
    }else{
      return null;
    }
  }

//////INSERTAR UN EQUIPO//////
  public function InsertarNoticia($titulo, $subtitulo, $descripcion, $fecha){
    $sql="INSERT INTO noticias(Titulo, Subtitulo, Descripcion, Fecha)
    VALUES ('".$titulo."', '".$subtitulo ."', '" .$descripcion ."', '" .$fecha ."')";
    $insertNoticia=$this->realizarInsert($sql);
    if ($insertNoticia=!false) {
      return true;
    }else {
      return false;
    }
  }

/////FUNCION PARA LISTAR NOTICIAS/////
  public function ListarNoticias(){
    $sql="SELECT * FROM noticias";
    $listaNoticias=$this->realizarConsulta($sql);
    if ($listaNoticias!=null) {
      $tablalista=[];
      while ($fila=$listaNoticias->fetch_assoc()) {
        $tablalista[]=$fila;
      }
      return $tablalista;
    }else {
      return null;
    }
  }

/////FUNCION PARA ACTUALIZAR NOTICIAS/////
  public function ActualizarNoticia($titulo, $subtitulo, $descripcion, $fecha){
    $sql="UPDATE noticias SET Titulo='" .$titulo ."', Subtitulo='" .$subtitulo ."', Descripcion='" .$descripcion ."', Fecha='" .$fecha ."' WHERE Titulo='" .$titulo ."'";
    $ActualizarNoticia=$this->realizarActualizacion($sql);
    if ($ActualizarNoticia=!false) {
      return true;
    }else {
      return false;
    }
  }

/////FUNCION PARA BORRAR NOTICIAS/////
  public function BorrarNoticia($titulo){
    $sql="DELETE FROM noticias WHERE Titulo='".$titulo ."'";
    $borrarNoticia=$this->realizarBorrado($sql);
    if ($borrarNoticia=!false) {
      return true;
    }else {
      return false;
    }
  }
}
?>
