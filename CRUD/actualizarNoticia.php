<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ACTUALIZAR NOTICIA</title>
  </head>
  <body>
    <form action="actualizNoticiaDB.php" method="post">
      Titulo:<br><input type="text" name="titulo" value=<?=$_GET["Titulo"]?> readonly>
      <br><br>
      Subtitulo:<br><input type="text" name="subtitulo" value=<?=$_GET["subtitulo"]?>>
      <br><br>
      Descripcion:<br><input type="text" name="descripcion" value=<?=$_GET["descripcion"]?>>
      <br><br>
      Fecha:<br><input type="text" name="fecha" value=<?=$_GET["fecha"]?>>
      <br><br>
      <input type="submit" value="Actulualizar">
    </form>
  </body>
</html>
