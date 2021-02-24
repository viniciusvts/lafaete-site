<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod page-produtos">
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

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