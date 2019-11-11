<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?> 

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-caption d-none d-md-block">
            <h2>Venda de</h2>
            <h1><?php the_title(); ?></h1>
          </div>
          <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
        </div>
      </div>

      <div class="blog-floater">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
                    </svg>
                    <?php wp_custom_breadcrumbs(); ?>
                </div>
                <div class="col-md-4 formulario">
					<?php $search = $_GET['searchkey'];?>
					<form ROLE="search" action="<?php bloginfo( 'wpurl' ) ?>/vendas" method="get">
						<div>
							<label class="screen-reader-text" for="s">Pesquisar por:</label>
							<input type="text" value="<?php echo($search); ?>" name="searchkey" id="searchkey">
							<input type="submit" id="searchsubmit" value="Pesquisar">
						</div>
					</form>
                </div>
                <div class="col-md-4">
                    <div class="blog-categorias">
                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">                        
                            <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"/>
                            <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"/>
                            <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"/>                    
                        </svg>
                        <a href="#">
                            <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                        </a> 
                    </div> 

                    <div class="submenu-categorias esconder">
                        <ul>
                          <?php
                            $categorias = get_categories( array(
                              'orderby' => 'name',
                              'parent'  => 0
                            ));
                            foreach($categorias as $categoria) : 
                          ?>
                          <li>
                            <a href="<?php bloginfo('url') ?>/vendas/<?php echo $categoria->slug; ?>">
                              <?php echo $categoria->name; ?>
                            </a>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>    
      </div>
            
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Categorias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <ul>
                    <li><a href="">Catetoria 1</a></li>
                    <li><a href="">Catetoria 1</a></li>
                    <li><a href="">Catetoria 1</a></li>
                    <li><a href="">Catetoria 1</a></li>
                    <li><a href="">Catetoria 1</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="produtos">
      <div class="container produto-floater">
        <div class="row">
          <div class="col-md-8 texto">
            <div class="container">
              <p><?php the_field('descricao'); ?></p>
              <p>Valor de Venda: <?php the_field('preco'); ?></p>
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

    <div class="container-fluid especificacoes-produtos">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="cabecalho">
              <h2>Especificações Técnicas</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <div class="row">
          <?php if(! get_field('marca') == null) : ?>
          <div class="col col-especificacoes">         
            <div class="circulo"><p class="text-center"><?php the_field('marca'); ?></p></div>
            <h5 class="text-center">Marca</h5>
          </div>
          <?php endif; ?>

          <?php if(! get_field('modelo') == null) : ?>
          <div class="col col-especificacoes">         
            <div class="circulo"><p class="text-center"><?php the_field('modelo'); ?></p></div>
            <h5 class="text-center">Modelo</h5>
          </div>
          <?php endif; ?>

          <?php if(! get_field('ano') == null) : ?>
          <div class="col col-especificacoes">         
            <div class="circulo"><p class="text-center"><?php the_field('ano'); ?></p></div>
            <h5 class="text-center">Ano</h5>
          </div>
          <?php endif; ?>

          <?php if(! get_field('serie') == null) : ?>
          <div class="col col-especificacoes">         
            <div class="circulo"><p class="text-center"><?php the_field('serie'); ?></p></div>
            <h5 class="text-center">Série</h5>
          </div>
          <?php endif; ?>

          <?php if(! get_field('unidade') == null) : ?>
          <div class="col col-especificacoes">         
            <div class="circulo"><p class="text-center"><?php the_field('unidade'); ?></p></div>
            <h5 class="text-center">Unidade</h5>
          </div>
          <?php endif; ?>

          <?php if(! get_field('horimetro') == null) : ?>
          <div class="col col-especificacoes">         
            <div class="circulo"><p class="text-center"><?php the_field('horimetro'); ?></p></div>
            <h5 class="text-center">Horímetro</h5>
          </div>
          <?php endif; ?>
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
    <?php endif; ?>

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
    include_once('inc/floater.php');
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>