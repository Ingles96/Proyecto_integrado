<?php
if (!empty($_POST)) {
  include 'noticias.php';
  $noticia=new noticia();

  $ActualizarNoticia=$titulo->ActualizarNoticia($_POST["titulo"], $_POST["subtitulo"], $_POST["descripcion"], $_POST["fecha"]);
  if ($ActualizarNoticia==true) {
    $tabla=$titulo->DevolverTituloNombre($_POST["titulo"]);
    foreach ($tabla as $fila) {
      echo "Titulo: ".$fila["Titulo"]."<br>";
      echo "Subtitulo: ".$fila["Subtitulo"]."<br>";
      echo "Descripcion: ".$fila["Descripcion"]."<br>";
      echo "Fecha: ".$fila["Fecha"]."<br>";
    }
  }

//Actualizamos.
echo "<br>";
echo "<a href='actualizarNoticia.php?Titulo: " .$fila["Titulo"] ."<br>Subtitulo: " .$fila["Subtitulo"] ."<br>Descripcion: " .$fila["Descripcion"] ."<br>Fecha: " .$fila["Fecha"]."'>Actualizar registro.</a>";
//Enlace para borrar el registro.
echo "<br>";
echo "<a href='listaNoticias.php'>Borrar noticia</a>";
}else {
echo "<a href='insertarNoticia.php'> Debes rellenar todos los campos </a>";
}
?>
