<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BORRAR UNA NOTICIA</title>
  </head>
  <body>
    <?php
//////INCLUIR CONEXION//////
      include 'noticias.php';
      $noticias=new noticia();
      $borrar=$noticias->BorrarNoticia($_GET["titulo"]);
      if ($borrar==true) {
       ?>

       <p>Se ha borrado la noticia</p>
       <a href="index.php">Volver a inicio</a>
       <a href="listaNoticias.php"> Borrar otro registro</a>

       <?php
      }else {
        ?>

        <a href="listaNoticias.php">No ha sido posible borrarse</a>

        <?php
      }
     ?>
  </body>
</html>
