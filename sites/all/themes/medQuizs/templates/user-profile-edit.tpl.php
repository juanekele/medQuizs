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