
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

    <title>Medquizs</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->

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
                  if (module_exists('hybridauth') && !$logged_in) {
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
      <?php print render($page['sidebar']);?>

      <div class="col-md-6 col-md-offset-2">
        <div style="clear: both; margin-top: 25px;"></div>

        <form action="?" method="post" role="form">
          <div class="form-group">
            <label for="title">Título de la Encuesta:</label>
            <input name="title" style="width: 400px;" type="text" class="form-control pregunta" id="title" placeholder="Introduce el título">
            <br>
            <label for="quiz">Pregunta (140 Caracteres) </label>
            <textarea name="quiz" style="margin: 0px 318px 0px 0px; height: 97px; width: 400px;" type="text" class="form-control" id="quiz"
                   placeholder="Introduce La Pregunta"></textarea>
          </div>
          <div class="form-group">

            <label for="res_a">Respuesta A:</label>
            <input name="res_a" style="width: 400px;" type="text" class="form-control pregunta" id="res_a" placeholder="Introduce la respuesta A">
            <br>
            <label for="res_b">Respuesta B:</label>
            <input name="res_b" style="width: 400px;" type="text" class="form-control pregunta" id="res_b" placeholder="Introduce la respuesta B">
            <br>
            <label for="res_c">Respuesta C:</label>
            <input name="res_c" style="width: 400px;" type="text" class="form-control pregunta" id="res_c" placeholder="Introduce la respuesta C">
            <br>
            <label for="res_d">Respuesta D:</label>
            <input name="res_d" style="width: 400px;" type="text" class="form-control pregunta" id="res_d" placeholder="Introduce la respuesta D">
            <br>
            <label for="correct">Respuesta Correcta:</label>
            <select name="correct" style="width: 400px;" class="form-control" id="correct">
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
            </select>
          </div>
          <button name="submit" type="submit" class="btn btn-default">Enviar</button>
        </form>
        <?php 
        if($user->name=="admin")
        {
        ?>
        <br>
        <br>
        <form method="post" action="/medquizs/extras/csv_quiz.php" enctype="multipart/form-data">
          <b>Sube Un CSV con las encuestas</b> 
         <input type="file" name="csv" /> 
         <br>
         <button name="submit" type="submit" class="btn btn-default">Enviar</button>
      </form>
        <?php 
        }
        ?>


        </div>
        <a class="twitter-timeline" href="https://twitter.com/medquizzes" data-widget-id="734171797877338112">Tweets por el @medquizzes.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>





    <?php 

    if(isset($_POST['quiz']) ){
      $title=$_POST['title'];
      if(strlen($title)==0)
      {
        $title=substr($_POST['quiz'], 0,15);
      }
      $sql="INSERT INTO quiz SET content='$_POST[quiz]', validado=0,publicado=0,correcta='$_POST[correct]',creator_id=$user->uid, fecha=NOW(), title='$title'";
      db_query($sql);
      $select="SELECT id FROM quiz WHERE content='$_POST[quiz]'";
      $result=db_query($select);
      foreach ($result as $key) {
        $id=$key->id;
      }
      $update="UPDATE quiz SET name='Q".$id."' WHERE id=$id";
      db_query($update);
      $insertA="INSERT INTO quiz_hashtag SET id_quiz=$id,value='#Q".$id."A ".$_POST['res_a']."'";
      $insertB="INSERT INTO quiz_hashtag SET id_quiz=$id,value='#Q".$id."B ".$_POST['res_b']."'";
      $insertC="INSERT INTO quiz_hashtag SET id_quiz=$id,value='#Q".$id."C ".$_POST['res_c']."'";
      $insertD="INSERT INTO quiz_hashtag SET id_quiz=$id,value='#Q".$id."D ".$_POST['res_d']."'";
      db_query($insertA);
      db_query($insertB);
      db_query($insertC);
      db_query($insertD);
    }


    ?>


  </body>
</html>

