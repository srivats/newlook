<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      <?php $tags = get_the_tags(); if ($tags) { ?><p><?php the_tags(); ?></p><?php } ?>
      <?php // social buttons ?>
      <div class="row promotion-container">
      <div class="span8">
        <div class="row">
          <div class="span4">
            <div id="enjoyed-post">
              <span class="label label-info">Enjoyed this Post?</span><br />Subscribe to our <a href='<?php echo bloginfo("rss2_url"); ?>'>RSS Feed</a>,<a href='http://twitter.com/pixlpitch'> Follow us on Twitter</a> or simply recommend us to friends and colleagues!</p>
              <ul class="social-buttons cf unstyled">
                <li class="pull-left"><a class="socialite facebook-like" href="https://www.facebook.com/sharer.php?u=https://www.socialitejs.com&t=Socialite.js" rel="nofollow" target="_blank" data-href="<?php the_permalink() ?>" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false"><span class="vhidden">Share on Facebook</span></a></li>
                <li class="pull-left"><a class="socialite twitter-share" href="http://twitter.com/share" rel="nofollow" target="_blank" data-text="<?php the_title() ?>" data-url="<?php the_permalink() ?>" data-count="vertical" data-via="twitter-username-here"><span class="vhidden">Share on Twitter</span></a></li>
                <li class="pull-left"><a class="socialite googleplus-one" href="https://plus.google.com/share?url=http://socialitejs.com" rel="nofollow" target="_blank" data-size="tall" data-href="<?php the_permalink() ?>"><span class="vhidden">Share on Google+</span></a></li>           
              </ul>
            </div>        
          </div>
          <div class="span4 pull-left">
            <div id="related-posts">
              <h4><?php echo _e('Related Posts') ?></h4>
              <div class="content">
                <?php echo get_related_posts() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>       

    </footer> 
    
    <?php comments_template('/templates/comments.php'); ?>
  </article>
 
<?php endwhile; ?>
