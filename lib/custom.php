<?php

// Custom functions

/* =============================================================================
   Theme functions
=============================================================================
*/
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
/**
 * Display slider
 */

function get_image_slider() {
  $image_slider = '<div id="image-slider" class="image-carousel carousel slide">
                  <div class="carousel-inner">';
  $slider_query = 'post_type=image-slider';

  query_posts($slider_query);
  if (have_posts())
  {
    while (have_posts()) {
       the_post();
       $img= get_the_post_thumbnail( $post->ID, 'large' );       
       $image_slider.= '<div class="item">'.$img .'</div>';
    }
  }
  wp_reset_query();
  
  $image_slider.='</div>';
  $image_slider.='</div>';
  return $image_slider;
}

function insert_image_slider($att,$content=null) {
  $slider=get_image_slider();
  return $slider;
}

function image_slider() {
  print get_image_slider();
}



/* =============================================================================
   Register shortcodes
=============================================================================
*/

function register_shortcodes() {
   add_shortcode('recent-posts', 'get_recent_posts');
}
add_action( 'init', 'register_shortcodes');
add_shortcode('slider','insert_image_slider');

