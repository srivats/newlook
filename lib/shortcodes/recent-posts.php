<li>
	<div class="meta pull-left meta-rounder-corner span1">
		<div class="date"><strong><?php the_time('d') ?></strong></div>
		<div class="month"><?php the_time('M')?></div>
	</div>
	<div class="content">
		<a href="<?php get_permalink()?>"><?php echo get_the_title() ?></a>
		<p><?php echo the_excerpt()?></p>
	</div>
</li>
