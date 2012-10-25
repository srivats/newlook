<footer id="content-info" class="container" role="contentinfo">
  <?php dynamic_sidebar('sidebar-footer'); ?>
  <div class="footer-content">  
    <div class="span3">
      <h3>Services</h3>
      <ul class="pull-left">
      	<li><a href="#">Website Design</a></li>
      	<li><a href="#">eCommerce Design</a></li>
      	<li><a href="#">Magento Design</a></li>
      	<li><a href="#">Brand Identity</a></li>  	
      </ul>
    </div>
    <div class="span3">
      <h3>Helpful Links</h3>
      <ul class="pull-left">    
    	<li><a href="#">About us</a></li>
    	<li><a href="#">Portfolio</a></li>
    	<li><a href="#">Testimonials</a></li>
    	<li><a href="#">Blog</a></li>
    	<li><a href="#">Contact Us</a></li>
      </ul>	
    </div>
    <div class="span3">
      <h3>Recent Tweets</h3>
      <div id="tweets" class="pull-left"></div>
    </div>
    <div class="span3">
      <h3>Get Social</h3>
      <ul class="pull-left">    
      <li><a href="#">Follow us on Facebook</a></li>
      <li><a href="#">Follow us on Twitter</a></li>
      <li><a href="#">Call us from Skype</a></li>
      </ul> 
    </div>
    <div class="clearer"></div>
<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</div>
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
