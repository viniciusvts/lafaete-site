<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php 
    include_once('menu.php');
    include_once('flat-header.php');
    ?>
    
    <div class="blog-floater">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
              <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z" />
            </svg>
            <?php wp_custom_breadcrumbs() ?>
          </div>
          <div class="col-md-4 formulario">
            <?php $search = isset($_GET['searchkey']) ? $_GET['searchkey'] : ''; ?>
            <form ROLE="search" action="<?php bloginfo('wpurl'); ?>/produtos" method="get">
              <div>
                <label class="screen-reader-text" for="s">Pesquisar por:</label>
                <input type="text" value="<?php echo ($search); ?>" name="searchkey" id="searchkey">
                <input type="submit" id="searchsubmit" value="Pesquisar">
              </div>
            </form>
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
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
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