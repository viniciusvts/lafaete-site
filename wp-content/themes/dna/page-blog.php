<?php /* Template Name: Blog */ ?>

<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
            $c = 0;
            $sliderIndicators = new WP_Query(array('posts_per_page' => 3));
            while($sliderIndicators->have_posts()): $sliderIndicators->the_post();
        ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $c; ?>" class="<?php  if($c == 0) : echo 'active'; endif; ?>"></li>
        <?php $c++; endwhile; wp_reset_postdata(); ?>
      </ol>
      <div class="carousel-inner ">

        <?php
          $d = 0;
          $imageSlider = new WP_Query(array('posts_per_page' => 3));
          while($imageSlider->have_posts()): $imageSlider->the_post();
        ?>
        <div class="carousel-item <?php  if($d == 0) : echo 'active'; endif; ?>">
          <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
        </div>
        <?php $d++; endwhile; wp_reset_postdata(); ?>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <?php include_once('inc/search-floater.php'); ?>
    <!-- SLIDER -->

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