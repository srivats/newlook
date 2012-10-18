<?php

// Custom post types

/**
 * Slider post type
 */

function slider_register() {

  $args = array(
    'label' => __('Slider'),
    'public' => true,
    'show_ui'=> true,
    'rewrite' => true,    
    'supports' => array('title', 'editor', 'thumbnail'),
    'capability_type' => 'post',
    );
  register_post_type('image-slider' , $args);
}

/**
 * Testimonials post type
 */
function testimonial_register() {
  $args = array(
        'label' => 'Client Testimonials',
        'public' => 'true',
        'show_ui'=> true,
        'supports' => array('title','editor','custom-fields'),
        'capability_type' => 'post'
  );
  register_post_type('testimonials', $args);
}

add_action('init','testimonial_register');

/**
 * Add custom fields for testimonial post type in wp-admin
 * @param int $post_id
 * 
 * @return bool
 */
function set_testimonial_custom_fields($post_id) {
  if($_GET['post_type']=='testimonials') {
    add_post_meta($post_id, 'Client Name', '', true);
    add_post_meta($post_id, 'Website', '', true);
  }

  return true;
}

add_action('wp_insert_post', 'set_testimonial_custom_fields');

/**
 * Generate testimonials slider for testimonial custom post
 * 
 * @return  mixed  html code
*/

function display_testimonials() {
  
  $testimonials_query = 'post_type=testimonials';
  query_posts($testimonials_query);
  echo '<div id="testimonials-slider" class="pull-left testimonials-carousel carousel slide"><div class="carousel-inner clearfix">';
  
  if (have_posts())
  {
    while(have_posts())
    {
	    the_post();
	    include(get_template_directory().'/lib/shortcodes/testimonials.php');
	  }
  }
  echo '</div></div>';
  return $testimonials_slider;
}

add_action('init', 'slider_register');  