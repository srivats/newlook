<form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
  <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
  <div class="input-append">
  <input type="text" id="appendedInputButton" value="" name="s" id="s" class="search-query span2" placeholder="<?php _e('Search', 'roots'); ?> <?php bloginfo('name'); ?>">
  <button type="submit" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>" class="btn"><?php echo _e('Search') ?></button>
  </div>
</form>