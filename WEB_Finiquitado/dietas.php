<?php
include "./lib/dietas.php";
$dietas = new dietas();
include "./lib/usuario.php";
$user=new usuario();
include "./lib/seguridad.php";
$seguridad = new seguridad();
//-- Esto es para que se pueda distribuir la informacion del Usuario --\\
$resultado = $user->buscarUsuario($seguridad->getUsuario());
	if ($resultado != false) {
		$data=[];
		foreach ($resultado as $key => $fila) {
			$data=$fila;
		}
	}
 ?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>INICIO</title>
    <!-- BOOTSTRAP -->
    <!-- BOOTSTRAP -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cabecera.css">
    <link rel="stylesheet" href="inicio.css">
<?php
if (!empty($_GET)) {
   ?>
  <script type="text/javascript">
    alert("<?=$_GET['DietaAñadida'] ?>");
  </script>
  <?php
}
?>
  <body>
		<?php


			# code...
		 ?>
		 <header>
	 		<div class="container">
	 			<div class="row">
	 				<div class="col-md-2">
	 							<img src="IMAGENES/logo.png">
	 				</div>
	 				<div class="col-md-7">
	 						<img src="IMAGENES/logo2.png" id="logo2img" width="500px" >
	 				</div>
	 				<div class="col-md-3">
						<?php
						if (isset($_SESSION["usuario"])) {

							 ?>
							<form method="post" action="accion.php">
								<input type="hidden" name="accion" value="logout">
								<input style="margin:5px ;" type="submit" class="btn btn-danger"value="LogOut">
							</form>
							<?php
						}else {

						 ?>
					<button style="margin:5px ;" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Iniciar Sesión</button><?php     # code...
						} ?>
	 				</div>
	 				<div class="modal fade" id="myModal" role="dialog">
	 					<div class="modal-dialog modal-lg">
	 						<div class="modal-content">
	 							<div class="modal-header">
	 								<h4 class="modal-title">Inicia Sesion</h4>
	 							</div>
	 							<div class="modal-body">
	 											<section>
	 												<form class="" action="accion.php" method="post">
	 														 <label for="Usuario">Usuario:</label>
	 														 <input type="text" name="usuario" value="" class="form-control input-sm" placeholder="usuario">
	 														 <label for="Contraseña">Contraseña:</label>
	 														 <input type="password" name="contr1" id="password" class="form-control input-sm" placeholder="Password"><br>
	 													 <input type="hidden" name="accion" value="login">
	 													 <input type="submit" value="Iniciar Sesion" class="btn btn-info registro">
	 												 </form>
	 											 </section>
	 							</div>
	 							<div class="modal-footer">
	 								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	 							</div>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="col-md-3">
						<?php if (!isset($_SESSION["usuario"])) {
               ?>
          <button style="margin:5px;"type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Registrate</button>
            <?php
            }
            ?>
	 				</div>
	 				<div class="modal fade" id="myModal2" role="dialog">
	 					<div class="modal-dialog modal-lg">
	 						<div class="modal-content">
	 							<div class="modal-header">
	 								<h3 class="modal-title">Registrate</h3>
	 							</div>
	 							<div class="modal-body">
	 									<section>
	 												<form class="" action="accion.php" method="post">
	 																<label for="Usuario">Usuario:</label><br>
	 																<input type="text" name="usuario" required><br>
	 																<label for="Nombre">Nombre:</label><br>
	 																<input type="text" name="nombre" required><br>
	 																<label for="Apellidos">Apellidos:</label><br>
	 																<input type="text" name="apellidos" required><br>
	 																<label for="Email">Email:</label><br>
	 																<input type="text" name="email" required><br>
	 																<label for="Contraseña">Contraseña:</label><br>
	 																<input type="password" name="contr1" required><br>
	 																<label for="Repita_Contraseña">Repita la Contraseña:</label><br>
	 																<input type="password" name="contr2" required><br>
	 													 <input type="hidden" name="accion" value="registro">
	 													 <input type="submit" value="Registrate" class="btn btn-info btn-block registro">
	 												 </form>
	 									</section>
	 							</div>
	 							<div class="modal-footer">
	 								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	 							</div>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>

	 		<nav>
	 			 <a href="inicio.php">INICIO</a>
	 			 <a href="noticias.php">NOTICIAS</a>
	 			 <a href="dietas.php">DIETAS</a>
	 			 <a href="ejercicios.php">EJERCICIOS</a>
				 <?php
        if (isset($_SESSION["usuario"])) {
         ?>
         <a href="myPerfil.php">PERFIL</a>
         <?php

        if ($data['rol']=='admin') {
         ?>
         <a href="Panel_de_Control/index.php">ADMINISTRACIÓN</a>
         <?php
        }
        }
        ?>
	 		</nav>
	 	</header>

    <!-- Contenido -->
    <div id="content">
      <h2 align="center">Dietas</h2>
      <div class="container-fluid">
						<ul class="nav nav-pills nav-stacked col-md-2">
							<li class="active"><a href="#vegetarianas" data-toggle="pill">Vegetarianas</a></li>
							<li><a href="#hipocaloricas" data-toggle="pill">Hipocaloricas</a></li>
							<li><a href="#hipercaloricas" data-toggle="pill">Hipercaloricas</a></li>
							<li><a href="#proteicas" data-toggle="pill">Proteicas</a></li>
							<li><a href="#Otrasdietas" data-toggle="pill">Otras dietas</a></li>
						</ul>
						<div class="tab-content col-md-10">
							<div class="tab-pane active" id="vegetarianas">
								<table class="table table-responsive table-hover ">
									<tr>
										<th>Nombre Dieta</th>
										<th>Informacion de la Dieta</th>

									</tr>
                        <?php
                        $tablaVegetariana=$dietas->MostrarDietasVegetarianas();
                        foreach ($tablaVegetariana as $fila) {
													 ?>
													 <form action="accion.php" method="post">
															 <tr>
													 <?php

                          echo "<td>".$fila['Nombre']."</td><td>".$fila['Descripcion']."</td>";
 												if (!empty($_SESSION) ){
                          echo   '<input type="hidden" name="accion" value="añadirDieta">
		                             	<input type="hidden" name="idUsuario" value="'. $data["idUsuarios"]. '">

		                             	<input type="hidden" name="idDietas" value="'. $fila["idDietas"].'">';
																	 ?>
		                             <td>	<input style="float:right;" type="submit"  value="+" class="aceptar btn btn-info"></td>

																	<?php
																}
											 ?></tr>
											 </form>
											 <?php
                        }
                         ?>
												 </table>
                </div>
							<div class="tab-pane" id="hipocaloricas">
											 <table class="table table-responsive table-hover ">
			 									<tr>
			 										<th>Nombre Dieta</th>
			 										<th>Informacion de la Dieta</th>

			 									</tr>
			                         <?php
			                           $tablaHipocaloricas=$dietas->MostrarDietasHipocaloricas();
			                         foreach ($tablaHipocaloricas as $fila) {
			 													 ?>
			 													 <form action="accion.php" method="post">
			 															 <tr>
			 													 <?php

			                           echo "<td>".$fila['Nombre']."</td><td>".$fila['Descripcion']."</td>";
			  												if (!empty($_SESSION) ){
			                           echo   '<input type="hidden" name="accion" value="añadirDieta">
			 		                             	<input type="hidden" name="idUsuario" value="'. $data["idUsuarios"]. '">

			 		                             	<input type="hidden" name="idDietas" value="'. $fila["idDietas"].'">';
			 																	 ?>
			 		                             <td>	<input style="float:right;" type="submit"  value="+" class="aceptar btn btn-info"></td>

			 																	<?php
			 																}
			 											 ?></tr>
			 											 </form>
			 											 <?php
			                         }
			                          ?>
			 												 </table>
              </div>
              <div class="tab-pane" id="hipercaloricas">
											 <table class="table table-responsive table-hover ">
			 									<tr>
			 										<th>Nombre Dieta</th>
			 										<th>Informacion de la Dieta</th>

			 									</tr>
			                         <?php
			                         $tablaHipercaloricas=$dietas->MostrarDietasHipercaloricas();
			                         foreach ($tablaHipercaloricas as $fila) {
			 													 ?>
			 													 <form action="accion.php" method="post">
			 															 <tr>
			 													 <?php

			                           echo "<td>".$fila['Nombre']."</td><td>".$fila['Descripcion']."</td>";
			  												if (!empty($_SESSION) ){
			                           echo   '<input type="hidden" name="accion" value="añadirDieta">
			 		                             	<input type="hidden" name="idUsuario" value="'. $data["idUsuarios"]. '">

			 		                             	<input type="hidden" name="idDietas" value="'. $fila["idDietas"].'">';
			 																	 ?>
			 		                             <td>	<input style="float:right;" type="submit"  value="+" class="aceptar btn btn-info"></td>

			 																	<?php
			 																}
			 											 ?></tr>
			 											 </form>
			 											 <?php
			                         }
			                          ?>
			 												 </table>
              </div>
              <div class="tab-pane" id="proteicas">
											 <table class="table table-responsive table-hover ">
												<tr>
													<th>Nombre Dieta</th>
													<th>Informacion de la Dieta</th>

												</tr>
															 <?php
															 $tablaproteicas=$dietas->MostrarDietasProteicas();
															 foreach ($tablaproteicas as $fila) {
																 ?>
																 <form action="accion.php" method="post">
																		 <tr>
																 <?php

																 echo "<td>".$fila['Nombre']."</td><td>".$fila['Descripcion']."</td>";
																if (!empty($_SESSION) ){
																 echo   '<input type="hidden" name="accion" value="añadirDieta">
																				<input type="hidden" name="idUsuario" value="'. $data["idUsuarios"]. '">

																				<input type="hidden" name="idDietas" value="'. $fila["idDietas"].'">';
																				 ?>
																			 <td>	<input style="float:right;" type="submit"  value="+" class="aceptar btn btn-info"></td>

																				<?php
																			}
														 ?></tr>
														 </form>
														 <?php
															 }
																?>
															 </table>
              </div>

              <div class="tab-pane" id="Otrasdietas">
                <form  action="accion.php" method="post">
									 <table class="table table-responsive table-hover ">
										<tr>
											<th>Nombre Dieta</th>
											<th>Informacion de la Dieta</th>

										</tr>
													 <?php
													 $tablaOtrasDietas=$dietas->MostrarDietasOtrasDietas();
													 foreach ($tablaOtrasDietas as $fila) {
														 ?>
														 <form action="accion.php" method="post">
																 <tr>
														 <?php

														 echo "<td>".$fila['Nombre']."</td><td>".$fila['Descripcion']."</td>";
														if (!empty($_SESSION) ){
														 echo   '<input type="hidden" name="accion" value="añadirDieta">
																		<input type="hidden" name="idUsuario" value="'. $data["idUsuarios"]. '">

																		<input type="hidden" name="idDietas" value="'. $fila["idDietas"].'">';
																		 ?>
																	 <td>	<input style="float:right;" type="submit"  value="+" class="aceptar btn btn-info"></td>

																		<?php
																	}
												 ?></tr>
												 </form>
												 <?php
													 }
														?>
													</table>
            </div>
    </div>
</div>
</div>
<footer>
	<br>
	<p style="margin-left:20px;"><b>Hola somos el grupo de proyecto 1<br>
	y esta es nuesta página web donde podrás<br>
	encocntrar todo tipos de cosas para tu salud</b></p>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<div class="footer" align="center">

			<a href="https://www.facebook.com/DietPlus-123728558199063/"><i class="fa fa-facebook-square fa-3x social"></i></a>
			<a href="https://twitter.com/dietplusplus"><i class="fa fa-twitter-square fa-3x social"></i></a>
			<a href="https://plus.google.com/u/0/103787216972006878969"><i class="fa fa-google-plus-square fa-3x social"></i></a>


		</div>
</footer>

  </body>
</html>
