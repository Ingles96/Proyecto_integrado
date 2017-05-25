<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BORRAR UNA NOTICIA (ENTRADA)</title>
  </head>
  <body>

    <?php
//////INCLUIR CONEXION//////
      include 'noticias.php';
      $equipo=new noticia();

      $borrar=$titulo->BorrarNoticia($_GET["titulo"]);

      if ($borrar==true) {
       ?>

       <p>Se ha borrado con exito</p>
       <a href="index.php">Volver a inicio</a>
       <a href="listaNoticias.php"> Borrar otro registro</a>

       <?php
      }else {
        ?>
        <a href="listaNoticias.php">No se ha podido borrar.</a>

        <?php
      }
     ?>
  </body>
</html>
