<!-- SLIDER -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
      $sliderIndicator = 0;
      $materialIndicator = new WP_Query( array(
        'post_type' => 'slider',
        'posts_per_page' => 3,
      ));

      if( $materialIndicator->have_posts() ):
        while( $materialIndicator->have_posts() ) : $materialIndicator->the_post();   
    ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $sliderIndicator; ?>" class="<?php if($sliderIndicator == 0) : echo 'active'; endif; ?>"></li>
    <?php
        $sliderIndicator++;                   
        endwhile;
      endif;
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
      $slider = 0;
      $material = new WP_Query( array(
        'post_type' => 'slider',
        'posts_per_page' => 3,
        'order' => 'DESC'
      )); 

      if( $material->have_posts() ):
        while( $material->have_posts() ) : $material->the_post();                  
    ?>
    <div class="carousel-item <?php if($slider == 0) : echo 'active'; endif; ?>">
      <div class="carousel-caption d-md-block crousel-home <?php if(is_home() ){echo "home";} ?>">
        <a class="whitelink" href="<?php
                  if(get_field('link') != '') {
                    the_field('link');
                  }else{
                    echo '#';
                  }
                ?>">
          <?php
            if($slider > 0) { ?>
            <h2 class="h2-home-slider"><?php the_title(); ?></h2> 
            <?php
            } else { ?>
            <h1><?php the_title(); ?></h1> 
            <?php
            }
          ?> 
          <p><?php the_field('subtitulo'); ?></p>
          <button class="slide-btn btn btn-laranja">Conheça nossas opções</button>
        </a>
      </div>
      <?php
        $image = get_field('imagem');
        if( !empty($image) ):
      ?>
        <a href="<?php
                  if(get_field('link') != '') {
                    the_field('link');
                  }else{
                    echo '#';
                  }
                ?>">
          <img src="<?php echo $image['url']; ?>" class="d-block w-100 img-fluid" alt="<?php echo $image['alt']; ?>" />
        </a>
      <?php endif; ?>  
    </div>
    <?php
        $slider++;                   
        endwhile;
      endif;
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- SLIDER -->