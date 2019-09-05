<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>    
    <?php //include_once('inc/slider-home.php'); ?>
    <?php //include_once('floater.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height">
            <h1><?php the_title(); ?></h1>
          </div>
          <?php the_post_thumbnail(); ?>
        </div>
      </div>
      <div class="container floater-destaque">
    </div>
    </div>

    <div class="container-fluid nossos-premios">
        <div class="container my-container">
            <div class="row">
                <?php 
                    $clientes = new WP_Query(array('post_type' => 'clientes', 'posts_per_page' => '-1'));
                    while( $clientes->have_posts()) :  $clientes->the_post(); ?>
                <div class="col-md-3 col-6">        
                    <?php the_post_thumbnail('full', array('class' => 'd-block w-100 img-fluid rounded')); ?> 
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php include_once("depoimentos.php"); ?>

    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>