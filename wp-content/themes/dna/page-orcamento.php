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
          <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid')); ?> 
        </div>
      </div>
      <div class="container floater-destaque">
    </div>
    </div>

    <div class="fale-conosco">
        <div class="container-fluid">
          <?php echo do_shortcode('[contact-form-7 id="182" title="Orçamento"]'); ?>
        </div>
    </div>
       
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>