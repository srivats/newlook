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
     echo  '<ul class="related-posts unstyled">';
     
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

/* =============================================================================
   Pagination
=============================================================================
*/

function pagination($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  $pages_to_show = 7;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
    $start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }
  echo $before.'<nav class="pagination pagination-large pagination-centered"><ul class="unstyled">'."";
  if ($start_page >= 2 && $pages_to_show < $max_page) {
    $first_page_text = "First";
    echo '<li class="first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
  }
  echo '<li class="prev-link">';
  previous_posts_link('<<');
  echo '</li>';
  for($i = $start_page; $i  <= $end_page; $i++) {
    if($i == $paged) {
      echo '<li class="active"><span>'.$i.'</span></li>';
    } else {
      echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }
  echo '<li class="next-link">';
  next_posts_link('>>');
  echo '</li>';
  if ($end_page < $max_page) {
    $last_page_text = "Last";
    echo '<li class="last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
  }
  echo '</ul></nav>'.$after."";
}
function get_related_posts()
{
  global  $wpdb, $post, $table_prefix;
  $tags = wp_get_post_tags($post->ID);
  if ($tags)
  {
    $first_tag = $tags[0]->term_id;
    $args=array(
      'tag__in' => array($first_tag),
      'post__not_in' => array($post->ID),
      'showposts'=>5,
      'caller_get_posts'=>1
    );
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() )
    {
      echo '<ul class="unstyled">';
      while ($my_query->have_posts()):
        $my_query->the_post();
    
       // echo "<p><a href='".the_permalink()."' rel='bookmark' title='Permanent Link to". the_title_attribute()."'>".the_title()."</a></p>";
      echo  '<li>'. the_title().'</li>';
      endwhile;
      echo '</ul>';
    }
    else
    {
      echo "No related posts available";
    }
  }
}