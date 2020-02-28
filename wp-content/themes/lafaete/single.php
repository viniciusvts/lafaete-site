<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>    
    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
            <?php
                if(have_posts()) : the_post();                
                    the_post_thumbnail('full', array('class' => 'img-fluid w-100 destaque-blog'));
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
        <div class="cabecalho">
            <h2><b>Posts</b> Relacionados</h2>
        </div>
        <div class="row">
            <?php
                foreach( $related as $post ) :
                    setup_postdata($post); 
            ?>
            <div class="col-md-4">
                <a href="">
                    <div class="card">
                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100'));  ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?> </h5>
                            <h6><?php the_category(); ?></h6>
                            <p class="card-text"><?php the_excerpt(); ?> </p>
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
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>