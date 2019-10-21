<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>
    
    <?php include_once('flat-header.php'); ?>

    <div id="produtos">
      <div class="container produto-floater">
        <div class="row">
          <div class="col-md-8 texto">
            <div class="bread">
              <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
              <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
              </svg>
              <p> Home » Produtos </p>
            </div>
            <p><?php if(have_posts()): the_post(); the_content(); endif; ?></p>
            <a href="#faca-um-orcamento"><button class="btn">Faça um orçamento agora</button></a>
          </div>
          <div class="col-md-4 pagamento">
            <h4>Condições de Pagamento</h4>
            <img src="<?php bloginfo('template_url');?>/inc/img/pagseguro.png">
          </div>
        </div>
      </div>
    </div>
    <div class="container produtos-container">
      <div class="row">
        <?php
          $produtos = new WP_Query(array('post_type' => 'produto'));
          if($produtos->have_posts()) : $produtos->the_post();        

          $terms = get_terms( array(
            'taxonomy' => 'produtos',
            'parent' => 0,
            'hide_empty' => false,
          ) );
          foreach ( $terms as $term ):
          $image = get_field('imagem', $term);          
        ?>

        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <img width="100%" height="270" src="<?php echo $image['url']; ?>" class="img-responsive wp-post-image" alt="<?php echo $image['alt']; ?>">
                </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h3><?php echo $term->name; ?></h3>
                      <p><?php echo $term->description;?></p>
                      <div class="more-link"><a href="<?php bloginfo('url')?>/produtos/<?php echo $term->slug; ?>" class="read-more">Clique aqui</a></div>
                    </div>
                </div>
              </div>
          </div>
        </div>

        <?php endforeach; endif; ?>        
      </div>  
    </div>  
   
    <?php
    include_once('inc/floater.php');
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>