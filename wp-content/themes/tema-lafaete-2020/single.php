<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod">
    <?php include_once('menu.php'); ?>    
    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide mt-60" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active <?php 
                                            if ( get_post_type() == 'post' ) {
                                                echo("container p-0");
                                            }
                                        ?>">
            <?php
                if(have_posts()) : the_post();                
                    the_post_thumbnail('full', array('class' => 'img-fluid w-100 destaque-blog h-auto'));
                endif;
            ?>
        </div>        
    </div>

    
    <?php include_once('inc/search-floater.php'); ?>

    <!-- SLIDER -->

    <div class="container blog">
        <div class="texto mw-50vw ml-auto mr-auto">
            <h1><?php the_title(); ?></h1>
            <div class="post-content wow fadeInUp animated" style="visibility: visible;">
                <?php the_content(); ?>
            </div>
        </div>
    </div>      
    <?php
        $related = get_posts( 
            array( 
                'category__in' => wp_get_post_categories( $post->ID ), 
                'numberposts'  => 3, 
                'post__not_in' => array( $post->ID ) 
            ) 
        );
        if( $related ) :
    ?>
    <div class="container blog">
        <div class="cabecalho-light">
            <h2>Posts Relacionados</h2>
            <span></span>
        </div>
        <div class="row">
            <?php
                foreach( $related as $post ) :
                    setup_postdata($post); 
            ?>
            <div class="col-md-4">
                <a href="<?php the_permalink(); ?>">
                    <div class="card card-posts">
                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100'));  ?>
                        <div class="card-body">
                          <h3 class="card-title card-text title-card-blog"><?php echo wp_trim_words( get_the_title(), 14, '...' ); ?></h3>
                          <h6><?php the_category(); ?></h6>
                          <p class="card-text"><?php echo wp_trim_words( get_the_content(), 19, ' [...] ' ); ?></p>
                      </div>
                    </div>
                </a>
            </div>
            <?php
                endforeach;
                wp_reset_postdata();
            ?>
        </div>
    </div>  
    <?php endif; ?>   
   
    <?php
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>