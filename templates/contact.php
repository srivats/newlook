<div id="contact_form">
	<form class="form-horizontal">
		<legend><?php echo _e('Contact Us') ?></legend>
		<label><?php echo _e('Name') ?></label>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" value="name" />
		</div>
		
		<div class="controls">
			<label><?php echo _e('Email') ?></label>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input id="email" type="text">
			</div>
		</div>
		<div class="controls">
			<label><?php echo _e('Website') ?></label>
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-globe"></i></span>
			<input type="text" value="website" />
		</div>
		<div class="controls">
			<label><?php echo _e('Comments') ?></label>
			<textarea name="comment"></textarea>
		</div>

		<button type="submit" class="btn"><?php echo _e('Submit')?></button>
	</form>
</div>
