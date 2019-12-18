<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <div class="blog-floater">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
              <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
              </svg>
              <?php wp_custom_breadcrumbs() ?>
          </div>
          <div class="col-md-4 formulario">
            <?php $search = isset( $_GET['searchkey'] ) ? $_GET['searchkey'] : ''; ?>
			  <form ROLE="search" action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="get">
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
                  <a id="nolink" href="#">
                    <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                  </a> 
              </div> 

              <?php include('inc/submenu.php'); ?>
          </div>
        </div>  
      </div>    
    </div>  

    </div>
    <div class="container">
      <div class="row">
        <?php
		$postsPerPage = get_option( 'posts_per_page' );
		$paged = isset( $_GET['sheet'] ) ? $_GET['sheet'] : 1;
		$search = isset( $_GET['searchkey'] ) ? $_GET['searchkey'] : '';
		if( isset( $search ) ){
			$args = array(
			'post_type' => 'venda',
			'post_per_page' => $postsPerPage,
			'paged' => $paged,
			's' => $search,
			);
		}else{
			$args = array(
				'post_type' => 'venda',
				'post_per_page' => $postsPerPage,
				'paged' => $paged,
			);
		}
		$seminovos = new WP_Query($args);
		while($seminovos->have_posts()) : $seminovos->the_post(); 
        ?>
        <div class="default-service-column col-md-4">
          <a href="<?php echo($hrefLink); ?>" class="card-text">
            <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <?php the_post_thumbnail('medium'); ?>                  
                </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                        <h3><?php the_title(); ?></h3>
                        <div class="mx-auto">
                          <?php if(get_field('modelo') != '' || get_field('serie') != ''): ?>
                            <div class="row">
                                <?php if(get_field('modelo') != ''): ?>
                                    <div class="col">
                                      <p class="text-center">Modelo: <?php the_field('modelo'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                                <?php if(get_field('serie') != ''): ?>
                                    <div class="col">
                                          <p class="text-center">Série: <?php the_field('serie'); ?></p>
                                    </div>
                                  <?php endif; ?>
                              </div>   
                              <?php endif; ?>
                              <?php if(get_field('ano') != '' || get_field('horimetro') != ''): ?>
                                <div class="row">
                                  <?php if(get_field('ano') != ''): ?>
                                    <div class="col">
                                      <p class="text-center">Ano: <?php the_field('ano'); ?></p>
                                    </div>
                                  <?php endif; ?>
                                  <?php if(get_field('horimetro') != ''): ?>
                                    <div class="col">
                                      <p class="text-center">Horímetro: <?php the_field('horimetro'); ?></p>
                                    </div>
                                  <?php endif; ?>
                                </div>
                              <?php endif; ?>
                              <?php if(get_field('unidade') != ''): ?>
                                <p class="text-center">Unidade: <?php the_field('unidade'); ?></p>
                              <?php endif; ?>
                              <h3>Preço: <?php the_field('preco'); ?></h3>
                              <div class="more-link"><a href="<?php the_permalink(); ?>" class="read-more">Clique aqui</a></div>
                        </div>
                    </div>
              </div>
            </div>
          </a>
        </div>
        <?php endwhile; ?>
      </div>  
    </div>  
	<div class="row">
		<div class="paginate">
			<div class="line-L col-6">
				<?php
					//links da paginação
					$prev = get_prev_page_link( $seminovos->max_num_pages);
					$next = get_next_page_link( $seminovos->max_num_pages);
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
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>