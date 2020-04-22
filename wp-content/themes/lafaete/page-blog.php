<?php /* Template Name: Blog */ ?>

<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <?php include_once('inc/search-floater.php'); ?>

    <div class="container blog">
        <div class="row">
          <?php
          $postsPerPage = get_option( 'posts_per_page' );
          $paged = isset( $_GET['sheet'] )? $_GET['sheet'] : 1;
          $args = array(
            'posts_per_page' => $postsPerPage,
            'paged' => $paged,
          );
          $card = new WP_Query($args);
          while($card->have_posts()) : $card->the_post(); ?>
          <div class="col-md-4">
              <a href="<?php the_permalink(); ?>">
                  <div class="card card-posts">
                      <?php the_post_thumbnail('large', array('class' => 'card-img-top img-fluid')); ?>
                      <div class="card-body">
                          <h3 class="card-title card-text title-card-blog"><?php echo wp_trim_words( get_the_title(), 14, '...' ); ?></h3>
                          <h6><?php the_category(); ?></h6>
                          <p class="card-text"><?php echo wp_trim_words( get_the_content(), 19, ' [...] ' ); ?></p>
                      </div>
                  </div>
              </a>
          </div>
          <?php endwhile;?>
        </div>
    </div>
    <!-- paginação -->
    <div class="row container paginate-container">
			<div class="paginate">
				<div class="line-L col-6">
					<?php
					//links da paginação
					$prev = get_prev_page_link( $card->max_num_pages);
					$next = get_next_page_link( $card->max_num_pages);
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