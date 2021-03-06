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
  $testimonials_slider= '<div class="span4"><div id="testimonials-slider" class="pull-left testimonials-carousel carousel slide span3"> <h3>Testimonials</h3> <div class="carousel-inner clearfix">';
  
  if (have_posts())
  {
    while(have_posts())
    {
	    the_post();
	    //$div.=include(get_template_directory().'/lib/shortcodes/testimonials.php');
      $client_name = get_post_meta(get_the_ID(), 'Client Name', true);
  $website_link = get_post_meta(get_the_ID(),'Website',true);
      $testimonials_slider.= '<div class="item">';
      $testimonials_slider.= '<div>'.get_the_content().'</div>';
      $testimonials_slider.='<div class="client-link"><div class="client-name">'.$client_name.'</div>';
      $testimonials_slider.='<div class="website-link"><a href="http://'.$website_link.'" rel="nofollow">'.$website_link.'</a></div></div>';
      $testimonials_slider.='</div>';
      
	  }
  }
  $testimonials_slider.= '</div></div></div><div class="clearer"></div>';
  return $testimonials_slider;
}

add_action('init', 'slider_register');  