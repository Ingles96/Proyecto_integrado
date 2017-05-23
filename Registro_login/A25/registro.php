<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
  </head>
  <body>
    <div>
      <h2>Formulario de registro</h2>
      <form method="post" action="seguridad.php">
        <label for="fname">Nombre</label>
        <input type="text" id="fname" name="Nombre" placeholder="Tu nombre..">

        <label for="lname">Apellidos</label>
        <input type="text" id="lname" name="Apellidos" placeholder="Tus apellidos..">

        <label for="user">Usuario</label>
        <input type="text" id="user" name="Usuario" placeholder="Tu usuario..">

        <label for="email">Correo</label>
        <input type="text" id="email" name="Correo" placeholder="Tu correo..">

        <label for="pass0">Contraseña</label>
        <input type="password" id="pass0" name="Pass" placeholder="Contraseña..">

        <label for="pass1">Repite Contraseña</label>
        <input type="password" id="pass1" name="Pass1" placeholder="Contraseña..">

        <input type="hidden" name="accion" value="registro">

        <input type="submit" value="Registrar">
      </form>
    </div>
  </body>
</html>
