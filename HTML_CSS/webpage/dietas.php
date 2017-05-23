<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>INICIO</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="cabecera.css">
    <link rel="stylesheet" href="dietas.css">
  </head>

  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-2">
              	<img src="IMAGENES/logo.png" class="centradoVertical">
          </div>
          <div class="col-7">
              <img src="IMAGENES/logo2.png" id="logo2img" width="500px" class="centradoVertical">
          </div>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Iniciar Sesión</button>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Inicia Sesion</h4>
                </div>
                <div class="modal-body">
                  <p>
                    <div class="row centered-form">
       <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Inicia sesión <small>Es la hora de ponerte sano ;)</small></h3>
           </div>
           <div class="panel-body">
             <form role="form">

               <div class="form-group">
                 <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
               </div>

               <div class="row">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                     <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                   </div>
                 </div>
               </div>

               <input type="submit" value="Iniciar Sesion" class="btn btn-info btn-block">

             </form>
           </div>
         </div>
       </div>
     </div>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Registrate</button>
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Registrate</h3>
                </div>
                <div class="modal-body">
                  <p>
                    <div class="row centered-form">
       <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Bienvenido Por Favor Registrese <small>It's free!</small></h3>
           </div>
           <div class="panel-body">
             <form role="form">
               <div class="row">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                     <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                   </div>
                 </div>
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                     <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                   </div>
                 </div>
               </div>

               <div class="form-group">
                 <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
               </div>

               <div class="row">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                     <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                   </div>
                 </div>
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                     <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                   </div>
                 </div>
               </div>

               <input type="submit" value="Registrate" class="btn btn-info btn-block">

             </form>
           </div>
         </div>
       </div>
     </div>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!--  <div class="col-2">
            <form class="" action="iniciarSesion.php" method="post">
              <input type="submit" name="" value="Inicia sesion">
            </form>
            <form class="" action="iniciarSesion.php" method="post">
              <input type="submit" name="" value="Registrarse">
            </form>
          </div>-->
        </div>
      </div>


    <!-- <div class="field" id="searchform">
          <input type="text" id="searchterm" placeholder="Busca tu dieta" />
          <button type="button" id="search">Buscar</button>
          <a href="buscar.php"></a>
    </div>-->
      <nav>

         <a href="inicio.php">INICIO</a>
         <a href="noticias.php">NOTICIAS</a>
         <a href="dietas.php">DIETAS</a>
         <a href="ejercicios.php">EJERCICIOS</a>

      </nav>

    </header>

    <div id="content">Dietas</div>

    <footer>
          <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="footer">
                <br />
                  <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social"></i></a>
          	      <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social"></i></a>
          	      <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social"></i></a>
          	      <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
          </div>
    </footer>

  </body>
</html>
