<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <section id="galeria" class="projetos-sociais">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
            <li class="fade">
              <span class="numero">1 / 3</span>
              <img src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="imagem 1" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">2 / 3</span>
              <img src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="imagem 2" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">3 / 3</span>
              <img src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="imagem 3" class="imagem-responsiva">
            </li>
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

    <div class="container produtos-container">
      <div class="row">
        <?php
          $obras = new WP_Query(array(
            'post_type' => 'obras'
          )); 
          while($obras->have_posts()) : $obras->the_post();
          ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100')); ?>                 
                </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h3><?php the_title(); ?></h3>
                      <p>Local: <?php the_field('local'); ?></p>
                      <p>Tempo de obra: <?php the_field('tempo_de_obra'); ?></p>
                      <p>Quantidade de equipamentos: <?php the_field('quantidade_de_equipamentos'); ?></p>
                      <p>Serviço prestado: <?php the_field('servico_prestado'); ?></p>                   
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>  
    </div>  
    
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>