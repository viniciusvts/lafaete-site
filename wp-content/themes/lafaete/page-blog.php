<?php /* Template Name: Blog */ ?>

<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <div class="container blog">
        <div class="row">
          <?php
          $card = new WP_Query(array('posts_per_page' => '6'));
          while($card->have_posts()) : $card->the_post(); ?>
          <div class="col-md-4">
              <a href="<?php the_permalink(); ?>">
                  <div class="card">
                      <?php the_post_thumbnail('medium', array('class' => 'card-img-top img-fluid')); ?>
                      <div class="card-body">
                          <h5 class="card-title"><?php echo wp_trim_words( get_the_title(), 14, '...' ); ?></h5>
                          <h6><?php the_category(); ?></h6>
                          <p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 19, ' [...] ' ); ?></p>
                      </div>
                  </div>
              </a>
          </div>
          <?php endwhile;?>
        </div>
    </div>        
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>