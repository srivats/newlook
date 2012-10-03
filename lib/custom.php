<?php

// Custom functions

/**************************** Theme fuctions********************************/
/**
 * get recent posts
 * Returns maximum 3 posts
 */
function get_recent_posts()	{
	$args=array(
			'orderby'=>'date',
			'order'=>'DESC',
			'showposts'=>3,			
		);
	$return_string='<ul>';
	query_posts($args);	
	if(have_posts())
	{
		
		while(have_posts())
		{
			the_post();
			
			$return_string.='<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';			
		}
	}
	$return_string.='</ul>';
	wp_reset_query();
	return $return_string;
	
}

function register_shortcodes() {
   add_shortcode('recent-posts', 'get_recent_posts');
}
add_action( 'init', 'register_shortcodes');

