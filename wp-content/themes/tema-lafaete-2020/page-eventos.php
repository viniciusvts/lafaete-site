<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod page-produtos">
    <?php 
    include_once('menu.php');
    include_once('flat-header.php');
    ?>
    
    <div class="blog-floater">
      <div class="container">
        <div class="row">
          <div class="col-md-5 d-flex align-items-center">
            <?php wp_custom_breadcrumbs() ?>
          </div>

          <div class="col-md-7">
            <div class="row">
              <div class="col-md-8 formulario d-flex align-items-center">
                <?php $search = isset( $_GET['searchkey'] )? $_GET['searchkey'] : ""; ?>
                <form ROLE="search" action="<?php bloginfo( 'wpurl' ); ?>/produtos" method="get">
                  <div>
                    <label class="screen-reader-text" for="s">Pesquisar por:</label>
                    <input type="text" value="<?php echo($search); ?>" name="searchkey" id="searchkey">
                    <input type="submit" id="searchsubmit" value="Pesquisar">
                  </div>
                </form>  
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php
    include_once('inc/produtos-orcamento-agora.php');
    ?>  
    <div class="container produtos-container">
      <div class="row">
        <?php
          $evento = new WP_Query(array(
            "post_type" => "eventos"
          ));
          while($evento->have_posts()) : $evento->the_post();
          ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100')); ?>              
                </figure>
                <div class="lower-part">
                    <div class="content">
                      <h3><?php the_title(); ?></h3>
                      <p><?php the_field('descricao'); ?></p>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>  
   
    <?php
    include_once('inc/form-orcamento.php'); 
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>