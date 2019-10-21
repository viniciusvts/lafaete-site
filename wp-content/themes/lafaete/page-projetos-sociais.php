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
              <p><?php the_field('descricao');?></p>
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
                      <h3><?php the_title(); ?></h3>
                      <p><?php the_field('descricao');?></p>                      
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