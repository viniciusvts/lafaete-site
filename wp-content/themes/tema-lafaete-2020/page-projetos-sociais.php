<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod page-produtos">
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <div class="container produtos-container">
      <div class="row">
        <?php
          $projeto = new WP_Query(array(
            'post_type' => 'projetos-sociais'
          ));
          $index = 1;
          while($projeto->have_posts()) : $projeto->the_post();
        ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <?php the_post_thumbnail('medium', array('class', 'img-fluid w-100')); ?>
                </figure>
                <div class="lower-part">
                    <div class="content">
                      <h3><?php the_title(); ?></h3>
                      <p><?php the_field('descricao');?></p>                      
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>  
    </div>  
    
    <?php
      include_once('newsletter.php');
      include_once('footer.php');
    ?>
  </body>
</html>