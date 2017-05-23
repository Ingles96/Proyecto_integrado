<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
  </head>
  <body>
    <div>
      <h2>Login</h2>
      <form method="post" action="seguridad.php">
        <label for="user">Usuario</label>
        <input type="text" id="user" name="Usuario" placeholder="Tu usuario.." value=<?php if(isset($_COOKIE["Usuario"])) {echo $_COOKIE["Usuario"];} ?>>

        <label for="pass0">Contraseña</label>
        <input type="password" id="pass0" name="Pass" placeholder="Contraseña..">
        <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["Usuario"])) { ?> checked <?php } ?> />
        <label for="remember-me">Recordarme</label>
        <input type="hidden" name="accion" value="login">

        <input type="submit" value="Login">
      </form>
    </div>
  </body>
</html>
