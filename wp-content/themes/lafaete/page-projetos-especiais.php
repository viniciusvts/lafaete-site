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

    <div class="container projetos-especiais-container">
      <div class="row">
        <?php
          $postsPerPage = get_option( 'posts_per_page' );
          $paged = isset( $_GET['sheet'] )? $_GET['sheet'] : 1;
          $args = array(
            'post_type' => 'projetos-especiais',
            'posts_per_page' => $postsPerPage,
            'paged' => $paged,
          );
          $projetosEspeciais = new WP_Query( $args );
          while($projetosEspeciais->have_posts()){
            $projetosEspeciais->the_post();
          ?>
        <div class="default-service-column col-md-4">
          <a href="<?php the_permalink(); ?>">
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
                        <?php the_content(); ?>
                      </div>
                  </div>
                </div>
            </div>
          </a>
        </div>
        <?php
          }
        ?>
      </div>  
    </div>
    <div class="row container paginate-container">
			<div class="paginate">
				<div class="line-L col-6">
					<?php
					//links da paginação
					$prev = get_prev_page_link( $projetosEspeciais->max_num_pages);
					$next = get_next_page_link( $projetosEspeciais->max_num_pages);
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
    <!-- /paginação -->
    
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>