<?php
include "./lib/usuario.php";

$user=new usuario();
include "./lib/seguridad.php";
$seguridad = new seguridad();
include "./lib/usuarios_ejerciciosvideos.php";
$user_ejercicios = new usuarios_ejerciciosvideos();
include "./lib/usuarios_dietas.php";
$user_dietas= new usuarios_dietas();
//-- si no hay usuario que entra, redirige a Index, o si se entra de golpe.... --\\
if ($seguridad->getUsuario() == null ) {
	header('Location: inicio.php');
}
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cabecera.css">
    <link rel="stylesheet" href="myPerfil.css">

		<?php
		if (!empty($_GET)) {
			 ?>
			<script type="text/javascript" >
				alert("<?=$_GET['UsuarioCorrect'] ?>");
			</script>
			<?php
		}
		 ?>
		 <script type="text/javascript" src="./js/elminarEjercicios.js"></script>
		 <script type="text/javascript" src="./js/eliminarDieta.js"></script>
  </head>

  <body>
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
    <!- Contenido de la PAGINA ->
<div class="container">
	<div class="container">
	    <section id="content">
	      <div class="container">
	        <br>
	      <ul class="nav nav-tabs">
	        <li class="active"><a data-toggle="tab" href="#personal">Informacion Personal</a></li>
	        <li><a data-toggle="tab" href="#ejercicios">Mis Ejercicios</a></li>
	        <li><a data-toggle="tab" href="#dietas">Mis Dietas</a></li>
	      </ul>
	      <div class="tab-content">
	        <!- Aqui Empieza Mi Informacion Personal con el IMC ->
	        <div id="personal" class="tab-pane fade in active">
	        <form action="accion.php" method="post">
	              <div id="formulario">
	                <div >
	                  <fieldset>
	                      <legend>Rellena tu salud</legend>
	                      <div>
	                        <div class="form2">
	                          <label for="Nombre">Imagen de Perfil:</label><br>
	                          <img src="./IMAGENES/<?php echo $data['Foto']; ?>" alt="" class="imgPerfil"><br><br>
	                          <button type="button" name="button">Cambiar Imagen</button>
	                        </div>
	                          <label for="Nombre">Nombre:</label><br>
	                          <input type="text" class="inputs" name="nombre" value="<?php echo $data['Nombre']; ?>"/>
	                      </div>
	                      <div>
	                          <label for="Apellidos">Apellidos:</label><br>
	                          <input type="text" class="inputs" name="apellidos" value="<?php echo $data['Apellidos']; ?>"/>
	                      </div>
	                      <div>
	                          <label for="Apellidos">Correo:</label><br>
	                          <input type="text" class="inputs" name="Correo" value="<?php echo $data['Correo']; ?>"/>
	                      </div>
	                      <div>
	                          <label for="Altura">Altura:</label><br>
	                          <input type="Number" class="inputsNumber" name="altura" value="<?php echo $data['Altura']; ?>"/>
	                      </div>
	                      <div>
	                          <label for="Peso">Peso:</label><br>
	                          <input type="Number" class="inputsNumber" name="peso" value="<?php echo $data['Peso']; ?>"/>
	                      </div>
	                      <div>
	                          <label for="Sexo">Sexo:</label><br>
														<?php if ($data['Sexo']==null) {
														 ?>
														Hombre<input type="radio" name="sexo" value="Hombre" /> Mujer<input type="radio" name="sexo" value="Mujer"/>
														<?php }elseif ($data['Sexo']=="Hombre") {
														?>
														Hombre<input type="radio" name="sexo" value="Hombre" checked/> Mujer<input type="radio" name="sexo" value="Mujer"/>
														<?php
														}elseif ($data['Sexo']=="Mujer"){
														 ?>
														Hombre<input type="radio" name="sexo" value="Hombre" /> Mujer<input type="radio" name="sexo" value="Mujer"checked/>
													<?php
														}
														 ?>
	                      </div>
	                      <br>
	                      <div>
	                          <label for="actividadDiaria" >Actividad Diaria:</label><br>
														<?php if ($data['ActividadDiaria']==null) {
														 ?>
														Si<input type="radio" name="actividadDiaria" value="Si" /> No<input type="radio" name="actividadDiaria" value="No"/>
														<?php }elseif ($data['ActividadDiaria']=="Si") {
														?>
														Si<input type="radio" name="actividadDiaria" value="Si" checked/> No<input type="radio" name="actividadDiaria" value="No"/>
														<?php
													}elseif ($data['ActividadDiaria']=="No"){
														 ?>
														Si<input type="radio" name="actividadDiaria" value="Si" /> No<input type="radio" name="actividadDiaria" value="No"checked/>
													<?php
														}
														 ?>
														 <textarea name="actividadDiariaDesc" rows="8" cols="80" placeholder="Cual?"><?php echo $data['DescripcionActividadDiaria']; ?></textarea>

	                      </div>
	                      <div>
	                          <label for="ProblemasdeSalud" class="actiDyProblemSal">Problemas de Salud:</label><br>
														<?php if ($data['ProblemasSalud']==null) {
														 ?>
														Si<input type="radio" name="problemasdeSalud" value="Si" /> No<input type="radio" name="problemasdeSalud" value="No"/>
														<?php }elseif ($data['ProblemasSalud']=="Si") {
														?>
														Si<input type="radio" name="problemasdeSalud" value="Si" checked/> No<input type="radio" name="problemasdeSalud" value="No"/>
														<?php
													}elseif ($data['ProblemasSalud']=="No"){
														 ?>
														Si<input type="radio" name="problemasdeSalud" value="Si" /> No<input type="radio" name="problemasdeSalud" value="No"checked/>
													<?php
														}
														 ?>
														 <textarea name="problemasdeSaludDesc" rows="8" cols="80" placeholder="Cual?"><?php echo $data['ProblemasSaludDescripcion']; ?></textarea>
	                      </div>
												<div class="salud">
													<input type="hidden" name="id" value="<?php echo $data['idUsuarios']; ?>">
													<input type="hidden" name="accion" value="ActualizarPerfil">
													<input type="submit"  class="btn btn-info "name="submit" value="Actualizar perfil"/>
												</div>

	                      </fieldset>
	                    </div>
	                </form>
	            </div>
	            <!- IMC ->
	              <div id="formulario2">
									<form action="accion.php" method="post">
	                <div >
	                  <fieldset>
	                      <legend>Indice de Masa Corporal</legend>
	                      <div>
	                          <label for="Altura">Altura:</label><br>
														<input name="altura" type="text" id="altura" size="8" maxlength="4" value="<?php echo $data['Altura']; ?>" readonly>
	                      </div>
	                      <div>
	                          <label for="Peso">Peso:</label><br>
														<input name="peso" type="text" id="peso" size="8" maxlength="3" value="<?php echo $data['Peso']; ?>" readonly>
	                      </div>
	                      <div>
														<input type="hidden" name="accion" value="imc">
														<input type="submit"  class="salud btn  btn-info "name="submit" value="Comprueba tu indice"/><br><br>
														<?php
														if (isset($_GET['IMC'])) {
															echo '<label for="Peso">Tu indice es :</label><br>';
															echo $_GET['IMC'];
															echo "/ Nº Indice: ".$_GET['indice'];
														}elseif (isset($_GET['ERRORIMC'])) {
															?>
														 <script type="text/javascript">
															 alert("<?=$_GET['ERRORIMC'] ?>");
														 </script>
														 <?php
														}
														 ?>
	                  </fieldset>
	                </div>
	            </div>
	          </form>
	          </div>
	          <!- Aqui Empieza Mis Ejercicios ->
	        <div id="ejercicios" class="tab-pane fade">
	          <br>
						<div class="container-fluid">
							<ul class="nav nav-pills nav-stacked col-md-2">
								<li class="active"><a href="#pecho" data-toggle="pill">Pecho</a></li>
								<li><a href="#hombro" data-toggle="pill">Hombro</a></li>
								<li><a href="#brazo" data-toggle="pill">Brazo</a></li>
								<li><a href="#espalda" data-toggle="pill">Espalda</a></li>
								<li><a href="#piernas" data-toggle="pill">Piernas</a></li>
								<li><a href="#abdomen" data-toggle="pill">Abdomen</a></li>
							</ul>
							<div class="tab-content col-md-10">
								<div class="tab-pane active" id="pecho">
									<?php
										$tabla=$user_ejercicios->MostrarPecho($data['idUsuarios']);
										foreach ($tabla as $fila) {
										 ?>
										<div id="iframe">

											<iframe  class="video" src="<?php echo $fila['Url']; ?>"  frameborder="0" scrolling="auto" allowfullscreen ></iframe>
											<input type="hidden" class="id_ej" value="<?php echo $fila['EjerciciosVideos_idEjerciciosVideos']; ?>">
											<button class="eliminar btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
										</div>
										<?php
										}
									 ?>
									</div>
									<div class="tab-pane" id="hombro">
										<?php
											$tabla=$user_ejercicios->MostrarHombro($data['idUsuarios']);
											foreach ($tabla as $fila) {
											 ?>
											 <div id="iframe">
	 											<iframe  class="video" src="<?php echo $fila['Url']; ?>"  frameborder="0" scrolling="auto" allowfullscreen ></iframe>
	 											<input type="hidden" class="id_ej" value="<?php echo $fila['EjerciciosVideos_idEjerciciosVideos']; ?>">
	 											<button class="eliminar btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
	 										</div>
	 										<?php
	 										}
	 									 ?>
	                </div>
	                <div class="tab-pane" id="brazo">
										<?php
											$tabla=$user_ejercicios->MostrarBrazo($data['idUsuarios']);
											foreach ($tabla as $fila) {
											 ?>
											 <div id="iframe">
											 	<iframe  class="video" src="<?php echo $fila['Url']; ?>"  frameborder="0" scrolling="auto" allowfullscreen ></iframe>
											 	<input type="hidden" class="id_ej" value="<?php echo $fila['EjerciciosVideos_idEjerciciosVideos']; ?>">
											 	<button class="eliminar btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
											 </div>
											 <?php
											 }
											 ?>
	                </div>
	                <div class="tab-pane" id="espalda">
										<?php
											$tabla=$user_ejercicios->MostrarEspalda($data['idUsuarios']);
											foreach ($tabla as $fila) {
											 ?>
											 <div id="iframe">
											 	<iframe  class="video" src="<?php echo $fila['Url']; ?>"  frameborder="0" scrolling="auto" allowfullscreen ></iframe>
											 	<input type="hidden" class="id_ej" value="<?php echo $fila['EjerciciosVideos_idEjerciciosVideos']; ?>">
											 	<button class="eliminar btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
											 </div>
											 <?php
											 }
											 ?>
	                </div>
	                <div class="tab-pane" id="piernas">
										<?php
											$tabla=$user_ejercicios->MostrarPiernas($data['idUsuarios']);
											foreach ($tabla as $fila) {
											 ?>
											 <div id="iframe">
											 	<iframe  class="video" src="<?php echo $fila['Url']; ?>"  frameborder="0" scrolling="auto" allowfullscreen ></iframe>
											 	<input type="hidden" class="id_ej" value="<?php echo $fila['EjerciciosVideos_idEjerciciosVideos']; ?>">
											 	<button class="eliminar btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
											 </div>
											 <?php
											 }
											 ?>
	                </div>
	                <div class="tab-pane" id="abdomen">
										<?php
										$tabla=$user_ejercicios->MostrarAbdomen($data['idUsuarios']);
										foreach ($tabla as $fila) {
											 ?>
											 <div id="iframe">
									 			<iframe  class="video" src="<?php echo $fila['Url']; ?>"  frameborder="0" scrolling="auto" allowfullscreen ></iframe>
									 			<input type="hidden" class="id_ej" value="<?php echo $fila['EjerciciosVideos_idEjerciciosVideos']; ?>">
									 			<button class="eliminar btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
									 		</div>
									 		<?php
									 		}
									 	 ?>
	                </div>
	              </div>
	            </div>
	        </div>
	        <!- Aqui Empieza Mys dietas->
	        <div id="dietas" class="tab-pane fade">
	          <br>
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
													<?php
													$tabla=$user_dietas->MostrarVegetariana($data['idUsuarios']);
													foreach ($tabla as $fila) {
													 ?>
													 	 <div id="diet">
															 <input type="hidden" class="id_die" value="<?php echo $fila['Dietas_idDietas']; ?>">
																 <?php
																 echo "<b>Nombre de la dieta: </b>".$fila['Nombre']."<br>".$fila['Descripcion'];
																 ?>
																 <button style="float:right;" class="eliminarD btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
																 <hr>
															 </div>
																 <?php
																}
															 ?>
	                      </div>
	                      <div class="tab-pane" id="hipocaloricas">
													<?php
													$tabla=$user_dietas->MostrarHipocaloricas($data['idUsuarios']);
													foreach ($tabla as $fila) {
													 ?>
														 <div id="diet">
															 <input type="hidden" class="id_die" value="<?php echo $fila['Dietas_idDietas']; ?>">

																 <?php
																 echo "<b>Nombre de la dieta: </b>".$fila['Nombre']."<br>".$fila['Descripcion'];


																 ?>
																 <button style="float:right;" class="eliminarD btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
																 <hr>
															 </div>
																 <?php
																}
															 ?>
	                      </div>
	                      <div class="tab-pane" id="hipercaloricas">
													<?php
													$tabla=$user_dietas->MostrarHipercaloricas($data['idUsuarios']);
													foreach ($tabla as $fila) {
													 ?>
														 <div id="diet">
															 <input type="hidden" class="id_die" value="<?php echo $fila['Dietas_idDietas']; ?>">
																 <?php
																 echo "<b>Nombre de la dieta: </b>".$fila['Nombre']."<br>".$fila['Descripcion'];
																 ?>
																 <button style="float:right;" class="eliminarD btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
																 <hr>
															 </div>
																 <?php
																}
															 ?>
													</div>
	                      <div class="tab-pane" id="proteicas">
													<?php
													$tabla=$user_dietas->MostrarProteicas($data['idUsuarios']);
													foreach ($tabla as $fila) {
													 ?>
														 <div id="diet">
															 <input type="hidden" class="id_die" value="<?php echo $fila['Dietas_idDietas']; ?>">

																 <?php
																 echo "<b>Nombre de la dieta: </b>".$fila['Nombre']."<br>".$fila['Descripcion'];


																 ?>
																 <button style="float:right;" class="eliminarD btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
																 <hr>
															 </div>
																 <?php
																}
															 ?>
	                      </div>
	                      <div class="tab-pane" id="Otrasdietas">
													<?php
													$tabla=$user_dietas->MostrarOtrasDietas($data['idUsuarios']);
													foreach ($tabla as $fila) {
													 ?>
														 <div id="diet">
															 <input type="hidden" class="id_die" value="<?php echo $fila['Dietas_idDietas']; ?>">

																 <?php
																 echo "<b>Nombre de la dieta: </b>".$fila['Nombre']."<br>".$fila['Descripcion'];


																 ?>
																 <button style="float:right;" class="eliminarD btn btn-danger" data-id="<?php echo $fila['Usuarios_idUsuarios']; ?>">X</button>
																 <hr>
															 </div>
																 <?php
																}
															 ?>
	                      </div>
	              </div>
	            </div>
	        </div>
	      </div>
	    </div>
	    </section>
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
</html>
