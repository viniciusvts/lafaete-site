<?php /* Template Name: Serviços*/ ?>

<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height d-none d-md-block">
            <h1><?php the_title(); ?></h1>
          </div>
            <?php the_post_thumbnail('full'); ?>
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
                ?>
                  <div class="col-md-6">
                    <?php 
                      the_content(); 
                    ?>
                  </div>
                  <div class="col-md-6">
                    <?php
                      $image = get_field('imagem');
                      if(!empty($image) ) :                                
                    ?>
                      <img src="<?php echo $image['url']; ?>" class="d-block w-100 img-fluid rounded" alt="<?php echo $image['alt']; ?>" />
                    <?php endif; ?>
                  </div>
                <?php
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fale-conosco">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="fale-conosco-left">
            <div class="cabecalho">
              <h2>Faça um Orçamento</h2>
              <span></span>                     
            </div>                      
          </div>

          <div class="fale-conosco bg-orcamento">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <?php echo do_shortcode('[contact-form-7 id="182" title="Orçamento"]'); ?>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>