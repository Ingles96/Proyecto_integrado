<?php
	include '../lib/usuario.php';
	$usuarios=new usuario();
	include "../lib/seguridad.php";
	$seguridad = new seguridad();
	$resultado = $usuarios->buscarUsuario($seguridad->getUsuario());
		if ($resultado != false) {
			$data=[];
			foreach ($resultado as $key => $fila) {
				$data=$fila;
			}
		}
	if ($seguridad->getUsuario() == null ) {
		header('Location: ../inicio.php');

	}elseif ($data['rol']=='user') {
		header('Location: ../inicio.php');
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar Dietas</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/master.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="./js/modificarListadoUsuarios.js"></script>
  </head>
  <body>
    <header>
  		<div class="container-fluid">
				<img style="float:left; width:108px; height:61px;" src="../IMAGENES/logo.png" alt="">
  			<h1 style="float:left;" >Panel de Administración</h1>

				<form style="float: right; margin:5px;"method="post" action="../accion.php">
					<input type="hidden" name="accion" value="logout">
					<input type="submit" class="btn btn-danger"value="LogOut">
				</form>

  		</div>
  	</header>
  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="visible-xs navbar-brand">Menu</span>
          </div>
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <div class="navbar-header">
            <a class="navbar-brand" href="../inicio.php">DietPlus+</a>
          </div>
          <ul class="nav navbar-nav navcolor">
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"></span>Agregar <span class="glyphicon glyphicon-plus"></span></a>
              <ul class="dropdown-menu">
								<li><a href="agregarDietas.php">Dietas</a></li>
                <li><a href="agregarEjercicios.php">Ejercicios</a></li>
                <li><a href="agregarNoticias.php">Noticias</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Modificar <span class="glyphicon glyphicon-play"></span></a>
              <ul class="dropdown-menu">
								<li><a href="modificarDietas.php">Dietas</a></li>
                <li><a href="modificarEjercicios.php">Ejercicios</a></li>
                <li><a href="modificarNoticias.php">Noticias</a></li>
              </ul>
            </li>
            <li><a href="listadoUsuario.php">Lista de Usuarios</a></li>
          </ul>
        </div>
        </div>
      </nav>
    </div>
    <!-- Contenido del panel de administracion -->
    <section class="col-sm-8 contenido" >
      <article style="color:#5cb8b5; margin:25px; padding:5px;">
        <h1 >MODIFICAR Y/O ELIMINAR</h1>
        <table class="table table-responsive table-hover table-striped">
          <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellidos</td>
						<td>Correo</td>
						<td>Usuario</td>
						<td>rol</td>
						<td>Altura</td>
						<td>Peso</td>
						<td>Sexo</td>
						<td>Eliminar</td>
						<td>Modificar</td>
          </tr>
        <?php

          $tabla=$usuarios->MostrarUsuarios();

          while($fila=mysqli_fetch_array($tabla)){
            /*$fila[0]==IdDietas*/ /*$fila[1]==Nombre*/ /*$fila[2]==Descripcion*/ /*$fila[3]==Categoria*/ /*$fila[4]==Fecha*/
            echo '
            <tr>
              <td>
                <input type="hidden" value="'.$fila[0].'">'.$fila[0].'
              </td>
              <td>'.$fila[1].'</td>
              <td>'.$fila[2].'</td>
							<td>'.$fila[3].'</td>
							<td>'.$fila[4].'</td>
							<td><select class="rol" >
										 <option value="'.$fila[7].'"> Actual: '.$fila[7].' </option>
										 <option value="admin"> admin </option>
										 <option value="user"> user</option>
										 <option value="userVip"> UserVip </option>
							</select></td>
							<td>'.$fila[9].'</td>
							<td>'.$fila[10].'</td>
							<td>'.$fila[8].'</td>
              <td><button class="eliminar btn btn-danger" data-id="'.$fila[0].'">Eliminar</button></td>
              <td><button class="modificar btn btn-warning" data-id="'.$fila[0].'">Modificar</button></td>
            </tr>';

					}
        ?>
      </table>
      </article>
  </div>
  </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
