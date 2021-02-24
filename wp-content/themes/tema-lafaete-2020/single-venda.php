<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod page-produtos">
    <?php include_once('menu.php'); ?> 

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide flatheaderdiv" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-caption d-none d-md-block">
            <h2>Venda de</h2>
            <h1>              
              <?php the_title(); ?>
            </h1>
          </div>
          <?php the_post_thumbnail('large', array('class' => 'img-fluid w-100')); ?>
        </div>
      </div>

      <div class="blog-floater">
        <div class="container">
          <div class="row">
            <div class="col-md-5 d-flex align-items-center">
              <?php wp_custom_breadcrumbs(); ?>
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
                  <?php include('inc/submenu.php'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            
    </div>

    <?php $imagens = get_field('galeria'); $indicador = 1; if(! get_field('galeria') == null) :  ?>
    <section id="galeria">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
            <?php foreach($imagens as $imagem) : ?>
            <li class="fade">
              <span class="numero"><?php echo $indicador; ?> / <?php echo sizeof($imagens); ?></span>
              <img src="<?php echo $imagem['url']; ?>" alt="<?php echo $imagem['alt']; ?>" class="img-fluid w-100 rounded">
            </li>
            <?php $indicador++; endforeach; ?>
        </ul>
        <div id="botoes">
            <a href="" id="seguinte">&#10095;</a>
            <a href="" id="anterior">&#10094;</a>
        </div>
      </div>
      <div id="dots">
        <?php $bullet = 1; foreach($imagens as $imagem) : ?>
          <span class="dot <?php if($bullet == 1) : echo 'active'; endif; ?>"></span>
        <?php $bullet++; endforeach; ?>
      </div>
    </section>
    <?php endif;
    include_once('inc/produtos-orcamento-agora.php');
    ?>

    <div class="container">
      <div class="row">
        <?php foreach($imagens as $imagem) : ?>
          <div class="col-md-3 imagem">
            <img src="<?php echo $imagem['url']; ?>" alt="<?php echo $imagem['alt']; ?>" class="img-fluid w-100 rounded">
          </div>
        <?php endforeach; ?>
      </div>
    </div> 
    <?php
      $related = get_posts( 
        array( 
          'post_type' => 'vendas',
          'category__in' => wp_get_post_categories( $post->ID ), 
          'numberposts'  => 3, 
          'post__not_in' => array( $post->ID ) 
        ) 
      );

      if( $related ): 
    ?>

    <div class="container">
      <div class="cabecalho">
        <h2>Veja outros produtos a venda</h2>
        <span></span> 
      </div>
      <div class="row">
        <?php
          foreach( $related as $post ) :
          setup_postdata($post);
        ?> 
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium' , array('class' => 'img-fluid w-100')); ?>   
                  </a>
                  </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h1><?php the_title(); ?></h1>
                      <div class="more-link"><a href="<?php the_permalink(); ?>" class="read-more">Clique aqui</a></div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php endforeach; wp_reset_postdata(); ?>
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