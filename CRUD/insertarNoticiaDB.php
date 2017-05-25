<?php
if (!empty($_POST)) {
  include 'noticias.php';
  $noticia=new noticia();
  $noticia->InsertarNoticia($_POST["titulo"],  $_POST["subtitulo"], $_POST["descripcion"], $_POST["fecha"]);

echo "ULTIMA NOTICIA: <br>";
$tablaTitulo=$noticia->DevolverTituloNombre($_POST["titulo"]);
foreach ($tablaTitulo as $fila) {
  echo "Titulo: " .$fila["Titulo"] ."<br>Subtitulo: " .$fila["Subtitulo"] ."<br>Descripcion: " .$fila["Descripcion"] ."<br>Fecha: " .$fila["Fecha"];
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
