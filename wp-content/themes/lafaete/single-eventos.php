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
            <h1><?php the_title(); ?></h1>
          </div>
          <?php the_post_thumbnail('large', array('class' => 'img-fluid w-100')); ?>
        </div>
      </div>     
    </div>

    <?php if(have_posts()) : the_post(); ?>
    <div id="produtos">
      <div class="container produto-floater">
        <div class="row">
          <div class="col-md-8 texto">
            <div class="container">
              <!--<div class="bread">
                <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
                </svg>
                <p> Home » Produtos » Máquina » Retroescavadeira </p>
              </div>-->
              <p><?php the_field('descricao'); ?></p>
              <a href="#faca-um-orcamento"><button class="btn">Faça um orçamento agora</button></a> 
            </div>
          </div>
          <div class="col-md-4 pagamento">
            <h4>Condições de Pagamento</h4>
            <img src="<?php bloginfo('template_url'); ?>/inc/img/pagseguro.png">
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
    <?php 
      $images = get_field('aplicacoes');
      if(! $images == false) : 
    ?>

    <div class="cabecalho">
      <h2>Aplicações</h2>
      <span></span> 
    </div>

    <section id="galeria">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
          <?php
            $imagesModal = get_field('aplicacoes');
            $numSlide = 1;
            if(! $imagesModal == false) : foreach($imagesModal as $imageModal) :            
          ?>
          <li class="fade">
            <span class="numero"><?php echo $numSlide; ?> / <?php echo sizeof($imagesModal); ?></span>
            <img src="<?php echo $imageModal['sizes']['large']; ?>" alt="<?php echo $imageModal['alt']; ?>" class="img-fluid w-100"/>
          </li>
          <?php $numSlide++; endforeach; endif;?>
        </ul>
        <div id="botoes">
            <a href="" id="seguinte">&#10095;</a>
            <a href="" id="anterior">&#10094;</a>
        </div>
      </div>
      <div id="dots">
        <span class="dot ativo"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </section>
    
    <div class="container">
      <div class="row">
        <?php
          foreach($images as $image) :            
        ?>
        <div class="col-md-4 imagem">
          <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid w-100"/>
        </div>
        <?php endforeach;?>
      </div>
    </div>

    <?php endif;?>

    <?php
      $related = get_posts( 
        array( 
          'category__in' => wp_get_post_categories( $post->ID ), 
          'numberposts'  => -1, 
          'post__not_in' => array( $post->ID ),
          'post_type' => 'eventos'
        ) 
      );
      if( $related ) :
    ?>
    
    <div class="container">
      <div class="cabecalho">
        <h2>Veja outros eventos</h2>
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
                    <?php the_post_thumbnail('medium' ,  array('class' => 'img-fluid w-100')); ?>
                  </a>
                </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h3><?php the_title(); ?></h3>
                      <div class="more-link"><a href="<?php the_permalink(); ?>" class="read-more">Clique aqui</a></div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php
          endforeach;
          wp_reset_postdata();
        ?>
      </div>  
    </div>  

    <?php endif; ?>  

    <?php
    include_once('inc/floater.php');
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>