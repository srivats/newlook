<div id="contact_form_container">
	<form class="form-horizontal" id="contact_form">
	<fieldset>
		<legend><?php echo _e('Contact Us') ?></legend>
		<div class="control-group">
			<label class="control-label" for="name"><?php echo _e('Name') ?></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>	
					<input type="text" name="name" id="name" placeholder="Name">
				</div>
				<span class="help-inline"><?php _e('Required') ?></span>
			</div>	
		</div>

		<div class="control-group">
			<label class="control-label" for="email"><?php echo _e('Email') ?></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>	
					<input type="text" name="email" id="email" placeholder="Email">
				</div>
				<span class="help-inline"><?php _e('Required') ?></span>
			</div>	
		</div>

		<div class="control-group">
			<label class="control-label" for="website"><?php echo _e('Website') ?></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-globe"></i></span>	
					<input type="text" name="website" id="website" placeholder="Website">
				</div>
				<span class="help-inline"><?php _e('Optional') ?></span>
			</div>	
		</div>

		<div class="control-group">
			<label class="control-label" for="message"><?php echo _e('Message') ?></label>
			<div class="controls">
					<textarea name="message" id="message" placeholder="Leave a message..."></textarea>
					<span class="help-inline"><?php _e('Required') ?></span>
				</div>				
			</div>	
		</div>
		<div class="form-actions">
			<button type="submit" id="submit" name="sumbit" class="btn btn-primary btn-large"><?php _e('Submit')?></button>
		</div>
	</fieldset>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#contact_form').validate({
		rules: {
			name:'required',
			email:{
				required: true,
				email: true,
			},
			message: 'required',
			
		},		
		highlight: function(label) {
   			$(label).closest('.control-group').addClass('error');
   			$(label).closest('.add-on').addClass('error');   			
   			
  		},
  		success: function(label) {
    		label.text('OK!').addClass('valid')
    		.closest('.control-group').addClass('success');
  		}
	});
});
</script>
