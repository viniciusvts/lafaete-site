<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height">
            <h1>Unidade em <?php the_title(); ?></h1>
          </div>
          <img src="<?php bloginfo('template_url'); ?>/inc/img/trabalhe-conosco.jpg">
        </div>
      </div>
      <div class="container floater-destaque">
    </div>

    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <div class="cabecalho">
                    <h2 class="text-center">Onde estamos</h2>
                    <span></span>
                </div>
            </div>   
            <div class="col-md-12 imagemGaleria unidade">             
                <h3 class="telefone"><strong>Telefone:</strong> <?php the_field('telefone'); ?></h3>  
                <p><strong>Endereço:</strong> <?php the_field('endereco'); ?></p>   
                <?php the_field('mapa'); ?>                              
                    <?php
                        $categories = get_the_category();
                        $thumbnail_id = get_post_thumbnail_id( $post->ID );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    ?>
            </div>
        </div>
    </div>
   
    <?php
        include_once('newsletter.php');
        include_once('footer.php');
    ?>
  </body>
</html>