<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height d-none d-md-block">
            <h2>Venda de</h2>
            <h1> <?php echo get_queried_object()->name; ?> </h1>
          </div>
          <img class="d-block w-100" src="<?php bloginfo('template_url'); ?>/inc/img/slider-construcao.jpg" alt="First slide">
        </div>
      </div>
    </div>

    <div id="produtos">
      <div class="container produto-floater">
        <div class="row">
          <div class="col-md-8 texto">
            <div class="bread">
              <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
              </svg>
              <p> Home » Vendas » <?php echo get_queried_object()->name;?> </p>
            </div>
            <p><?php echo get_queried_object()->description; ?></p>
            <a href="#faca-um-orcamento"><button class="btn">Faça um orçamento agora</button></a>
          </div>
          <div class="col-md-4 pagamento">
            <h4>Condições de Pagamento</h4>
            
            <img src="<?php bloginfo('template_url'); ?>/inc/img/pagseguro.png">
          </div>
        </div>
      </div>
    </div>

    <div class="container produtos-container menu-imoveis">
      <?php
        $term_id = get_queried_object()->term_id;
        $taxonomy_name = 'produtos';
        $term_children = get_term_children( $term_id, $taxonomy_name );
        if($term_children):
      ?>
      <ul class="nav justify-content-center">
        <li class="nav-item active">
          <a class="nav-link" href="#todos">Todos</a>
        </li>

        <?php
          foreach ( $term_children as $child ):
            $term = get_term_by( 'id', $child, $taxonomy_name );
            if($term->count > 0):
            ?>             
              <li class="nav-item">
                <a class="nav-link" href="#<?php echo $term->slug ?>"><?php echo $term->name; ?></a>
              </li>
          <?php
            endif;
          endforeach;
        ?> 
      </ul>
      <?php
        endif;
      ?>
      <div class="row">

		<?php
		$postsPerPage = get_option( 'posts_per_page' );
		$paged = $_GET['sheet'];
		$args = array(
            'post_type' => 'venda',
            'order' => 'ASC' ,
			'posts_per_page' => $postsPerPage,
			'paged' => $paged,
            'tax_query' => array(
              array(
                'taxonomy' => 'vendas',
                'field' => 'id',
                'terms' => get_queried_object()->term_id,
                'include_children' => false
              )
            )
          );
          $produtos = new WP_Query( $args );

          if( $produtos->have_posts() ):      
                    
          while( $produtos->have_posts()) : $produtos->the_post(); 

           $categorias = get_the_terms( $post->ID, 'vendas' );
   
        ?>

        <div class="default-service-column col-md-4 imagemGaleria <?php  foreach($categorias as $categoria): if(get_queried_object()->term_id !== $categoria->term_id): echo $categoria->slug; endif; endforeach; ?>">
          <div class="inner-box">
            <div class="inner-most">
              <figure class="image-box">
                <?php the_post_thumbnail('medium'); ?>
              </figure>
              <div class="lower-part">
                <div class="left-curve">                      
                </div>
                <div class="right-curve">                      
                </div>                    
                <div class="content">
                  <h3><?php the_title(); ?></h3>
                  <p> <?php foreach($categorias as $categoria): if(get_queried_object()->term_id !== $categoria->term_id): echo $categoria->name; endif; endforeach; ?> </p>
                  <div class="more-link">
                    <a href="<?php the_permalink(); ?>" class="read-more">Clique aqui</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
          <?php endwhile; endif; wp_reset_postdata();?>
	  </div>  
	  <div class="row">
			<div class="paginate">
				<div class="line-L col-6">
					<?php
					//links da paginação
					$prev = get_prev_page_link( $produtos->max_num_pages);
					$next = get_next_page_link( $produtos->max_num_pages);
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
    </div>  
   
    <?php
      include_once('inc/form-orcamento.php');
      include_once('newsletter.php');
      include_once('footer.php');
      include_once('inc/floater.php');
    ?>
  </body>
</html>