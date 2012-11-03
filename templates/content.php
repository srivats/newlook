<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_excerpt(); ?>
    </div>
    <footer><span><?php echo _e('Tags') ?></span>
      <?php the_tags('<ul class="entry-tags unstyled"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
  <hr />
<?php endwhile; ?>


<?php //pagination ?>
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>