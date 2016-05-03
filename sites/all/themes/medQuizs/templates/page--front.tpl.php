
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
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
              <nav id="menuNavegacion" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 right no_login">
                  <?php
                      global $user;
                      $user = user_load($user->uid);
                      print theme('user_picture', array('account' =>$user));
                  ?>                  
                  <?php print render($page['header']); ?>
                  <a id="login_button">Entrar en tu aula</a>          
                  <div class="clear"></div>
              </nav>
            <?php }else{ ?>
              <nav id="menuNavegacion" class="col-xs-4 col-sm-3 col-md-3 col-lg-3 right login">
                <?php
                    global $user;
                    $user = user_load($user->uid);
                    print theme('user_picture', array('account' =>$user));
                ?>
            <div class="imgUser">
              <a id="login_button" class="right clear login">
                <?php 
                  if ($user->uid) { 
                    $user_fields = user_load($user->uid);
                    $firstname = $user_fields->field_nombre['und']['0']['value'];
                    $lastname = $user_fields->field_apellidos['und']['0']['value'];                    
                    print $firstname. ' ' . $lastname ; 
                  } }
                ?>
              </a>
        </div>
      </div>  
    </nav>


    <div class="container-fluid">
      <?php print render($page['sidebar']); ?>
      <div id="contenido">
       <?php print render($page['content']); ?>
          <div class="col-md-3">
          <div style="clear: both; margin-top: 10px;"></div>
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/Juanekele" data-widget-id="695657439375552512">Tweets por el @Juanekele.</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery.min.js"><\/script>')</script>
  </body>

 
