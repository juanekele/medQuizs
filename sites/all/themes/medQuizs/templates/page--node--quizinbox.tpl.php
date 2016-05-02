
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>MediQuizs</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="./bootstrap/js/jquery.tablesorter.js"></script>
    <script src="./bootstrap/js/jquery.tablesorter.min.js"></script>
    <script src="./bootstrap/js/mediQuizs.js"></script>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
          
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="sites/all/themes/medQuizs/assets/images/logoBlanco.png" alt="Mountain View" style="width:56px;height:56px;">
          <a class="navbar-brand" href="#">MediQuizs</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Quizs</a></li>
            <li><a href="#">Estadísticas</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <ul class="nav nav-pills pull-right">
                        <li class="dropdown " id="menuLogin">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                            <div class="dropdown-menu" style="padding:17px;">
                                <form id="formLogin" class="form"> 
                                    <label>Login</label> 
                                    <input name="_csrf" id="token" type="hidden" value="8i7LVkui-AT76QrkKDkht_fmgpkfLIkEDZ0I">
                      <input name="username" id="username" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Enter your username" required="">
                      <input name="password" id="password" type="password" placeholder="Password" title="Enter your password" required=""><br>
                      <button type="button" id="btnLogin" class="btn">Login</button>
                  </form>
                            </div>
                        </li>
                        <li class="dropdown hide" id="menuUser">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="See your Bootply collection and profile">
                                <i class="icon-user icon-xxlarge"> </i> <span id="lblUsername"></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/user">Dashboard</a></li>
                                <li><a href="/new">Create New Bootply</a></li>
                                
                                <li><a href="/logout">Logout</a></li>
                                <li class="divider"> </li>
                                <li><a href="/bootstrap-community">Community</a></li>
                                <li><a href="/about">About</a></li>
                            </ul>
                        </li>
                    </ul>
          </form>
        </div>
      </div>  
    </nav>


      <div class="container-fluid">
      <?php print render($page['sidebar']); ?>
      <div class="col-md-8 col-md-offset-2">
        <div style="clear: both; margin-top: 50px;"></div>
        <h3>Encuestas propuestas por los usuarios</h3>
        <div style="clear: both; margin-top: 50px;"></div>
        <div class="table-responsive">
          <table id="example" class="sortable table table-striped table-bordered" cellspacing="0" width="100%">
            <tr>
              <th><a>Título</a></th>
              <th><a>Usuario</a></th>
              <th><a>Fecha</a></th>
              <th><a>Estado</a></th>
              <th><a>Acción</a></th>
              <th><a>Ver</a></th>
            </tr>
            <tr>
              <td>Quiz35</td>
              <td>@juanekele</td>
              <td>07-03-2016</td>
              <td>Pendiente </td>
              <td><button>Publicar</button></td>
              <td>Ver</td>
            </tr>
            <tr>
              <td>Quiz36</td>
              <td>@juanekele</td>
              <td>07-03-2016</td>
              <td>Aceptada</td>
              <td><button>Publicar</button></td>
              <td>Ver</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>