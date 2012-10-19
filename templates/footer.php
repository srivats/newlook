<footer id="content-info" class="container" role="contentinfo">
  <?php dynamic_sidebar('sidebar-footer'); ?>
  <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  <ul class="pull-left">
  	<li><a href="#">Website Design</a></li>
  	<li><a href="#">eCommerce Design</a></li>
  	<li><a href="#">Magento Design</a></li>
  	<li><a href="#">Brand Identity</a></li>  	
  </ul>
  <ul class="pull-left">
	<li><a href="#">About us</a></li>
	<li><a href="#">Portfolio</a></li>
	<li><a href="#">Testimonials</a></li>
	<li><a href="#">Blog</a></li>
	<li><a href="#">Contact Us</a></li>
  </ul>	

<div id="tweets"></div>
</footer>

<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

<?php wp_footer(); ?>
