
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
          <form class="navbar-form navbar-right">
            <ul class="nav nav-pills pull-right">
                        <li class="dropdown " id="menuLogin">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                            <div class="dropdown-menu" style="padding:17px;">
                                <form action="/node?destination=node" method="post" id="user-login" accept-charset="UTF-8"><div><div class="form-item form-type-textfield form-item-name">
                                  <label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
                                  <input type="text" id="edit-name" name="name" value="" size="60" maxlength="60" class="form-text required" />
                                  <div class="description">Enter your MedQuizs username.</div>
                                  </div>
                                  <div class="form-item form-type-password form-item-pass">
                                    <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
                                    <input type="password" id="edit-pass" name="pass" size="60" maxlength="128" class="form-text required" />
                                    <div class="description">Enter the password that accompanies your username.</div>
                                  </div>
                                <input type="hidden" name="form_build_id" value="form-riLiPVFRbayilDFQzzKdWlBT1mLMYFfE8CdXbTE5kmE" />
                                <input type="hidden" name="form_id" value="user_login" />
                                <div class="form-actions form-wrapper" id="edit-actions"><input type="submit" id="edit-submit" name="op" value="Log in" class="form-submit" /></div></div></form>
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
</html>
