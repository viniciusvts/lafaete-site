<?php /* Template Name: Serviços*/ ?>

<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod">
    <?php include_once('menu.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide flatheaderdiv" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height d-md-block">
            <h1><?php the_title(); ?></h1>
          </div>
            <?php the_post_thumbnail('large'); ?>
        </div>
      </div>
      <div class="container floater-destaque">
    </div>

    <div class="fale-conosco">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="fale-conosco-left">
              <div class="bread">
              </div>
              <div class="row">
                <?php                             
                  if(have_posts()): the_post();
                  $image = get_field('imagem');
                ?>
                  <div class="<?php if(!empty($image)): echo "col-md-6"; else: echo "col-md-12"; endif;?>">
                    <?php 
                      the_content(); 
                    ?>
                  </div>
                  <?php                      
                      if(!empty($image) ) :                                
                    ?>
                    <div class="col-md-6">                    
                        <img src="<?php echo $image['sizes']['large']; ?>" class="d-block w-100 img-fluid rounded" alt="<?php echo $image['alt']; ?>" />                    
                    </div>
                  <?php endif; ?>
                <?php
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
    <?php
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>