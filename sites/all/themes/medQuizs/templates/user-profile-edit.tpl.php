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
            <li><a href="../../" >Inicio</a></li>
            <li><a href="#" >Quizs</a></li>
            <li><a href="#" >Estadísticas</a></li>
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

<div id="user-edit-<?php print $user->uid; ?>" class="user-edit-form">
	<div class="user-edit-container" id="user-edit-container">
		<?php print render($form['form_id']); ?>
		<?php print render($form['form_build_id']); ?>
		<?php print render($form['form_token']); ?>
		<input type="input" id="ViewMode" class="currentedittab" name="ViewMode" value="" style="display: none;">
		
		<div class="usereditborder" id="usereditborder">
			<div class="showalledit toggleelement"><h3>Account Information</h3></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['account']['name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_first_name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_middle_name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_last_name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['account']['mail']); ?></div>
			<div class="showalledit toggleelement"><hr></div>
			<div class="showalledit toggleelement"><h3>Change Password</h3></div>
			<div id="currpass" class="showalledit accountinfo changepassword toggleelement"><?php print render($form['account']['current_pass']); ?></div>
			<div class="showalledit changepassword toggleelement"><?php print render($form['account']['pass']); ?></div>
			<div class="showalledit toggleelement"><hr></div>
			<div class="showalledit toggleelement"><h3>Profile Information</h3></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_address']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_city']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_state']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_zip_code']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_phone_number']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_date_of_birth']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_gender']); ?></div>
			<div class="showalledit toggleelement"><hr></div>
			<div class="showalledit toggleelement"><h3>Additional Profile Information</h3></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['timezone']['timezone']); ?><hr></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['signature_settings']['signature']); ?><hr></div>
			<div class="showalledit changeadditionalprofile toggleelement" style="min-height:135px;">
				<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['picture']['picture_current']); ?></div>
				<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['picture']['picture_upload']); ?></div>
				<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['picture']['picture_delete']); ?></div>
			</div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['account']['status']); ?></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['account']['roles']); ?></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['account']['notify']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_terms_of_use']); ?></div>
		</div>
		
		<?php print render($form['actions']); ?>
	</div><!--end user-edit container-->
</div><!--end user-edit-->