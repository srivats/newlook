<li>
	<div class="meta pull-left">
		<span class="date"><?php the_time('d') ?></span><br>
		<span class="month"><?php the_time('M')?></span>
	</div>
	<div>
		<a href="<?php get_permalink()?>"><?php echo get_the_title() ?></a>
		<p><?php echo the_excerpt()?></p>
	</div>
</li>
