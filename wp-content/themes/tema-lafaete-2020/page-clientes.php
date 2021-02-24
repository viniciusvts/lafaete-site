<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod">
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <div class="container-fluid nossos-premios">
        <div class="container my-container">
            <div class="row">
                <?php 
                    $clientes = new WP_Query(array('post_type' => 'clientes', 'posts_per_page' => '-1'));
                    while( $clientes->have_posts()) :  $clientes->the_post(); ?>
                <div class="col-md-3 col-6">        
                    <?php the_post_thumbnail('medium', array('class' => 'd-block img-fluid rounded')); ?> 
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