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
            <h1>Busca</h1>
          </div>
          <img src="<?php echo( get_theme_mod( 'dnaTheme_searchHeader') ); ?>" class="img-fluid w-100">
        </div>
      </div>
      <div class="container floater-destaque">
    </div>
    </div>
    <?php include_once('inc/search-floater.php'); ?>
    <!-- SLIDER -->

    <div class="container blog">
        <div class="row">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $s=get_search_query();
                $args = array('s' => $s, 'post_type' => 'post','posts_per_page' => -1, 'paged' => $paged );
                query_posts($args);
                if ( have_posts() ) { while (have_posts()) : the_post();
            ?>
            <div class="col-md-4">
                <a href="<?php the_permalink(); ?>">
                    <div class="card">
                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top img-fluid')); ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo wp_trim_words( get_the_title(), 14, '...' ); ?></h5>
                            <h6><?php the_category(); ?></h6>
                            <p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 19, ' [...] ' ); ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endwhile;
                echo get_next_posts_link('Próximo', $the_query->max_num_pages);
                echo get_previous_posts_link('Voltar', $the_query->max_num_pages);
                wp_reset_postdata();
            }else{?>

            <div class="col-sm-12 col-md-12 card" style="min-height: 500px">
                <p>Nenhum post encontrado</p>    
            </div>        
            <?php }?>
            
        </div>
    </div>        
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>