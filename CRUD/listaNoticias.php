<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LISTAR EQUIPOS</title>
  </head>
  <body>
    <?php
      include 'noticias.php';
      $noticias=new noticia();
      ?>
      <table border="1px">
        <thead>
         <tr>
           <th>Titulo</th>
           <th>Subtitulo</th>
           <th>Descripcion</th>
           <th>Fecha</th>
           <th>Borrar</th>
         </tr>
        </thead>
      <?php
      $tablalista=$noticias->ListarNoticias();
      foreach ($tablalista as $fila) {
          echo "<tr><td>" .$fila["Titulo"] ."</td><td>" .$fila["Subtitulo"] ."</td><td>" .$fila["Descripcion"] ."</td><td>" .$fila["Fecha"] ."</td><td><a href='borrarNoticiaBD.php?titulo=".$fila["Titulo"]."'>Borrar registro</a></td></tr>";
      }
     ?>
     </table>
  </body>
</html>
