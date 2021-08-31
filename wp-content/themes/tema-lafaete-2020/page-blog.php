<?php /* Template Name: Blog */ ?>

<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod">
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
        <?php
        $args = array(
            'screen_reader_text' => ' ',
            'mid_size' => 5,
            'prev_next' => true,
            'prev_text' => __('Anterior'),
            'next_text' => __('Próxima'),
            // personalizar paginação para a lafaete
            'format' => '?sheet=%#%',
            'current' => max(1, $paged),
            'total' => $card->max_num_pages
        );
        
        echo paginate_links($args);
        ?>
			</div>
		</div>
    <!-- /paginação -->
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>