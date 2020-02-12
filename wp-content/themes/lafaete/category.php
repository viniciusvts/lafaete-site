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
            <h1>Categoria: <?php $categories = get_the_category(); foreach($categories as $category) : echo $category->name; endforeach; ?></h1>
          </div>
          <img src="<?php bloginfo('template_url'); ?>/inc/img/header-blog.jpg" class="img-fluid w-100">
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
                if ( have_posts() ) { while (have_posts()) : the_post();
            ?>
            <div class="col-md-4">
              <a href="<?php the_permalink(); ?>">
                  <div class="card card-posts">
                      <?php the_post_thumbnail('medium', array('class' => 'card-img-top img-fluid')); ?>
                      <div class="card-body">
                          <h3 class="card-title card-text title-card-blog"><?php echo wp_trim_words( get_the_title(), 14, '...' ); ?></h3>
                          <h6><?php the_category(); ?></h6>
                          <p class="card-text"><?php echo wp_trim_words( get_the_content(), 19, ' [...] ' ); ?></p>
                      </div>
                  </div>
              </a>
          </div>
          <?php endwhile;?>
        </div>
    </div>
    <!-- paginação -->
    <div class="row container paginate-container">
			<div class="paginate">
				<div class="line-L col-6">
					<?php
					//links da paginação
					$prev = get_prev_page_link_wp();
          $next = get_next_page_link_wp();
						if($prev){
							echo "<a class='page-btn' href='".$prev."'>";
							echo "Anterior";
							echo "</a>";
						}
					?>
				</div>
				<div class="line-Right col-6">
					<?php
						if($next){
							echo "<a class='page-btn' href='".$next."'>";
							echo "Próxima";
							echo "</a>";
						}
					?>
				</div>
			</div>
		</div>
    <!-- /paginação -->
    <?php
            wp_reset_postdata();
          }else{
    ?>

    <div class="col-sm-12 col-md-12 card" style="min-height: 500px">
      <p>Nenhum post encontrado</p>    
    </div>        
    <?php }?>       
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>