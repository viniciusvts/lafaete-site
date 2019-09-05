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
          <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
        </div>
      </div>
    </div>

    <section id="galeria" class="projetos-sociais">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
          <?php
            $projetoModal = new WP_Query(array(
              'post_type' => 'projetos-sociais'
            ));
            $indexSlide = 1;
            while($projetoModal->have_posts()) : $projetoModal->the_post();
          ?>
          <li class="fade">
            <span class="numero"><?php echo $indexSlide; ?> / <?php // echo sizeof($projetoModal->have_posts()); ?></span>
            <div class="over">
              <div class="rodape">
              <h4><?php the_title(); ?></h4>
              <p>Lona na Lua: doação de containers linha termoacústica para o quadro “Um por todos, todos por um”, exibido pelo programa do Luciano Huck. Os containers foram utilizados como escritórios, banheiros, camarins, vestiários e cantina.</p>
              <p>O Lona na Lua é uma associação cultural e social sem fins lucrativos, que tem como objetivo proporcionar cultura e arte inclusiva para a população das periferias dos municípios de Rio Bonito e Silva Jardim, no Rio de Janeiro, através de atividades nas áreas do Teatro, Dança, Música e Circo.</p>
              </div>
            </div>
            <?php the_post_thumbnail('full', array('class', 'img-fluid w-100')); ?>
          </li>
          <?php $indexSlide++; endwhile; wp_reset_postdata(); ?>
        </ul>
        <div id="botoes">
            <a href="" id="seguinte">&#10095;</a>
            <a href="" id="anterior">&#10094;</a>
        </div>
      </div>
      <div id="dots">
        <?php
          $indexSlide = 1;
          while($projetoModal->have_posts()) : $projetoModal->the_post();
        ?>
        <span class="dot <?php if($indexSlide == 1) : echo 'active'; endif; ?>"></span>
        <?php $indexSlide++; endwhile; ?>
      </div>
    </section>

    <div class="container produtos-container">
      <div class="row">
        <?php
          $projeto = new WP_Query(array(
            'post_type' => 'projetos-sociais'
          ));
          $index = 1;
          while($projeto->have_posts()) : $projeto->the_post();
        ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <a href="#">
                  <?php the_post_thumbnail('medium', array('class', 'img-fluid w-100')); ?>
                  </a>
                </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h3>Projeto <?php echo $index + 1; ?></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>                      
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>  
    </div>  
    
    <?php
      include_once('newsletter.php');
      include_once('footer.php');
    ?>
  </body>
</html>