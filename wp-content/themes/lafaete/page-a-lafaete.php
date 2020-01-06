<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <?php 
      if( have_rows('repetidor') ): 
    ?>
    <div class="container my-container">
      <div class="row">
        <div class="col-md-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">          
            <?php
              $b = 0;
              while ( have_rows('repetidor') ) : the_row();
            ?>
              <a class="nav-link <?php if($b == 0 ) : echo 'active'; endif; ?>" id="v-pills-home-<?php echo $b; ?>" data-toggle="pill" href="#v-pills-<?php echo $b; ?>" role="tab" aria-controls="v-pills-<?php echo $b; ?>" aria-selected="<?php if( $b == 0) : echo 'true'; else : echo 'false'; endif; ?>">
                <?php the_sub_field('titulo'); ?>
              </a>
            <?php
              $b++;
              endwhile;
            ?>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content" id="v-pills-tabContent">
            <?php
              $c = 0;
              while ( have_rows('repetidor') ) : the_row();
            ?>
            <div class="tab-pane fade<?php if($c == 0 ) : echo ' active show'; endif; ?>" id="v-pills-<?php echo $c; ?>" role="tabpanel" aria-labelledby="v-pills-home-<?php echo $c; ?>">
              <div class="container">
                <div class="row">
                  <div class="col-md-8">
                    <h2><?php the_sub_field('titulo'); ?></h2>
                    <?php the_sub_field('descricao'); ?>
                  </div>
                  <!-- <div class="col-md-4">
                    <img src="<?php echo the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_sub_field('titulo'); ?>" class="img-fluid w-100" />                  
                  </div> -->
                </div>
              </div>
            </div>
            <?php
              $c++;
              endwhile;
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <div class="container-fluid nossos-premios">
      <div class="container pt-5 pb-5">
        <div class="cabecalho-light">
          <h2>Nossas Conquistas</h2>  
          <span></span> 
        </div>
        <div class="row">
          <?php
            $premios = new WP_Query(array('post_type' => 'premios'));
            while($premios->have_posts()): $premios->the_post();          
          ?>
          <div class="col-12 col-md-3 col-sm-12 mr-auto ml-auto">          
            <?php $imagemPremio = get_field('imagem'); ?>            
            <img src="<?php echo $imagemPremio['url']; ?>" alt="<?php echo $imagemPremio['alt'] ?>" class="img-fluid w-100 rounded" /> 
            <h3><?php the_title(); ?></h3>
            <p><?php the_field('descricao'); ?></p>
          </div>
          <?php endwhile; ?>                    
        </div>
      </div>
    </div>
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>