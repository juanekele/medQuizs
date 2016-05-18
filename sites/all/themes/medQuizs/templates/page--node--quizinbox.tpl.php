
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
            <li><a href="#" onclick="showInicio();">Inicio</a></li>
            <li><a href="#" onclick="showQuizs();">Quizs</a></li>
            <li><a href="#" onclick="showStats();">Estadísticas</a></li>
          </ul>
         <?php if(!$logged_in){ ?>
          <ul class="nav nav-pills pull-right">
            <li class="dropdown " id="menuLogin">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                <div class="dropdown-menu" style="padding:17px; margin-left:-200px; width=100%;">
                  <?php
                      global $user;
                      $user = user_load($user->uid);
                      print theme('user_picture', array('account' =>$user));
                  ?>                  
                  <?php print render($page['header']); ?>        
                  <div class="clear"></div>
                </div>
              </li>
          </ul>
            <?php }else{ ?>
            <ul class="nav nav-pills pull-right">
              <div class="imgUser">
                <?php
                    global $user;
                    $user = user_load($user->uid);
                    print theme('user_picture', array('account' =>$user));
                ?>
              </diV>
            </ul>
              <ul class="nav nav-pills pull-right">
                <li class="dropdown " id="menuLogin">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">
                    <?php 
                      if ($user->uid) { 
                        $user_fields = user_load($user->uid);
                        //echo print_r($user_fields->name);
                        echo $user_fields->name;                 
                        //print $user_fields. ' ' . $lastname ; 
                      } 
                    }
                    ?>
                  </a>
              <div class="dropdown-menu" style="padding:17px; margin-left:-150px;">
                <ul >
                  <li><a href="./user/<?php echo $user->uid; ?>/edit">Mi Cuenta</a></li>
                  <li class="divider"> </li>
                  <li><a href="./user/logout">Logout</a></li>
                  <?php           
                  if (module_exists('hybridauth')) {
                      $element['#type'] = 'hybridauth_widget';
                      print drupal_render($element);
                  } 
                  ?>
                </ul>
              </div>
            </ul>
      </div>  
    </nav>


      <div class="container-fluid">
      <?php print render($page['sidebar']);




/* Create a TCP/IP socket. */
/*$socket = socket_create(AF_INET, SOCK_STREAM, 0);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "<br />";
} else {
    echo "OK.<br />";
}
echo "Attempting to connect to '$address' on port '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() failed.<br />Reason: ($result) " . socket_strerror(socket_last_error($socket)) . "<br />";
} else {
    echo "OK.<br />";
}

//socket_accept($socket);

//$result = socket_read ($socket, 1024) or die("Could not read server response\n");
//echo $result;
/*$in="1234";
$in2="1";
$in3="1";
$out = '';

echo "Sending HTTP HEAD request...";
socket_write($socket, $in, strlen($in));
socket_write($socket, $in2, strlen($in2));
socket_write($socket, $in3, strlen($in3));
*/




       ?>
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
            <?php 
            $query="SELECT * FROM quiz WHERE  validado=0 OR publicado=0";
            $result=db_query($query);

            foreach ($result as $quiz) {

            $sqlName="SELECT name FROM users where uid=$quiz->creator_id";
            $resultName=db_query($sqlName);
            foreach ($resultName as $key) {
              $name=$key->name;
            }
            echo '<tr>
                    <td>'.$quiz->title.'</td>
                    <td>'.$name.'</td>
                    <td>'.$quiz->fecha.'</td>';
            if($quiz->validado==0)
            {
              $estado='Pendiente';
              $accion='<button onclick="validar('.$quiz->id.')">Validar</button>';
            }
            else
            {
              $estado='Aceptado';
              $accion='<button onclick="publicar('.$quiz->id.')">Publicar</button>';
            }
                  echo  '<td>'.$estado.'</td>
                    <td>'.$accion.'</td>
                    <td>Ver</td>
                  </tr>';
            }
            ?>
          </table>
        </div>

        <div style="clear: both; margin-top: 50px;"></div>
        Para recuperar las últimas respuestas a los quizs publicados haga click aqui:
        <button onclick="getTweets()">Guardar Tweets</button>


      </div>
    </div>


  </body>
</html>