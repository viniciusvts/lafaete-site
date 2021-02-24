<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod page-produtos">
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <div class="blog-floater">
      <div class="container">
        <div class="row">
          <div class="col-md-5 d-flex align-items-center">
            <p> Home <span>»</span> <?php the_title(); ?> </p>
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
              <div class="col-md-4 d-flex align-items-center">
                <div class="blog-categorias">
                  <a id="nolink" href="#" class="togglecats">
                    <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                  </a> 
                  <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> 
                    <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"></path> <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"></path> 
                    <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"></path> 
                  </svg>
                </div> 
                <?php 
                  $pageVendas = true;
                  include('inc/submenu.php'); 
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     
    
    <div class="container">
      <div class="row">
        <?php
          $postsPerPage = get_option( 'posts_per_page' );
          $paged = isset( $_GET['sheet'] ) ? $_GET['sheet'] : 1;
          $search = isset( $_GET['searchkey'] ) ? $_GET['searchkey'] : '';
          if( isset( $search ) ){
            $args = array(
            'post_type' => 'venda',
            'post_per_page' => $postsPerPage,
            'paged' => $paged,
            's' => $search,
            );
          }else{
            $args = array(
              'post_type' => 'venda',
              'post_per_page' => $postsPerPage,
              'paged' => $paged,
            );
          }
          $seminovos = new WP_Query($args);
          while($seminovos->have_posts()) : $seminovos->the_post(); 
            $hrefLink = get_the_permalink();
        ?>
        <div class="default-service-column col-md-4">
          <a href="<?php echo($hrefLink); ?>" class="card-text">
            <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <?php the_post_thumbnail('medium'); ?>                  
                </figure>
                <div class="lower-part">
                  
                  <div class="content">
                    <h3><?php the_title(); ?></h3>
                    <div class="mx-auto">
                      <div class="row">

                        <?php if(get_field('ano') != ''): ?>
                          <div class="col-6">
                            <p class="text-center"><b>Ano</b>: </br> <?php the_field('ano'); ?></p>
                            <hr>
                          </div>
                        <?php endif; ?>

                        <?php if(get_field('serie') != ''): ?>
                          <div class="col-6">
                            <p class="text-center"><b>Série</b>: </br> <?php the_field('serie'); ?></p>
                            <hr>
                          </div>
                        <?php endif; ?>

                        <?php if(get_field('modelo') != ''): ?>
                          <div class="col-6">
                            <p class="text-center"><b>Modelo</b>: </br> <?php the_field('modelo'); ?></p>
                            <hr>
                          </div>
                        <?php endif; ?>

                        <?php if(get_field('horimetro') != ''): ?>
                          <div class="col">
                            <p class="text-center"><b>Horímetro</b>: </br> <?php the_field('horimetro'); ?></p>
                            <hr>
                          </div>                             
                        <?php endif; ?>

                        <?php if(get_field('unidade') != ''): ?>
                          <div class="col">
                            <p class="text-center"><b>Unidade</b>: </br> <?php the_field('unidade'); ?></p>
                            <hr>
                          </div>
                        <?php endif;  ?>

                        <?php if(get_field('preco') ): ?>
                          <div class="col-12">
                            <h3>Preço: <?php the_field('preco'); ?></h3>
                          </div>
                        <?php endif ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php endwhile; ?>
      </div>  
    </div> 
    
    
    <div class="row container paginate-container">
      <div class="paginate">
        <div class="line-L col-6">
          <?php
            //links da paginação
            $prev = get_prev_page_link( $seminovos->max_num_pages);
            $next = get_next_page_link( $seminovos->max_num_pages);
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
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>