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
      'echo'=>0
		);
	query_posts($args);	
	if(have_posts())
	{
    ob_start();
	   echo '<div class="span8 pull-left recent-post"><h3>Recent Posts</h3>';
     echo  '<ul class="related-posts">';
     
		while(have_posts())
		{
			the_post();
			$return=include(get_template_directory().'/lib/shortcodes/recent-posts.php');			
     // $return.='<li>';
     // $return.='<div class="meta pull-left">';
     // $return.='<span class="date">'. the_time('d') .'</span><br>';
     // $return.='<span class="month">'. the_time('M').'</span>';
     // $return.='<a href="'.get_permalink().'">'. get_the_title().'</a>';
     // $return.='<p>'.the_excerpt().'</p>';
     // $return.='</div></li>';
     // $return.='</div><div>';
		}
   
	}
	 echo  '</ul></div>';
   $return=ob_get_clean();
   
   wp_reset_query();
   return $return; 
}

/**
 * Display slider
 */

function get_image_slider() {
  $image_slider = '<div class="span12"><div id="image-slider" class="image-carousel carousel slide clearfix">
                  <div class="carousel-inner">';
  $slider_query = 'post_type=image-slider';

  query_posts($slider_query);
  if (have_posts())
  {
    while (have_posts()) {
       the_post();
       $img= get_the_post_thumbnail( the_ID(), 'large' );       
       $image_slider.= '<div class="item">'.$img .'</div>';
    }
  }
  wp_reset_query();
  
  $image_slider.='</div></div></div>';
  
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
   add_shortcode('slider','insert_image_slider');

add_shortcode('testimonials', 'display_testimonials');
}
add_action( 'init', 'register_shortcodes');


