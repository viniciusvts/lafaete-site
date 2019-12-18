<!doctype html>
<html lang="pt-br">
  <?php
  include_once('head.php'); 
  global $wp_query;
  $queried_object = $wp_query->queried_object;
  ?>

<body>
  <?php
    include_once('menu.php');
  ?>
  <!-- SLIDER -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner carousel-flat-height">
      <div class="carousel-item active">
        <div class="carousel-caption carousel-caption-flat-height d-none d-md-block">
          <h1>
            Locação de Equipamentos em <?php echo $queried_object->name; ?>
          </h1>
        </div>
        <img class="d-block w-100" src="<?php bloginfo('template_url'); ?>/inc/img/slider-construcao.jpg" alt="First slide">
      </div>
    </div>
  </div>

  <!-- Produtos -->
  <div class="container produtos-container menu-imoveis">
    <?php
      //Buscar todos os posts que estão no termo atual da taxonomia cidade 
      // $postsPerPage = get_option( 'posts_per_page' );
      // $paged = isset( $_GET['sheet'] )? $_GET['sheet'] : 1; 
      $args = array(
        'post_type' => 'produto',
        'order' => 'ASC' ,
        'posts_per_page' => 100,//$postsPerPage,
        // 'paged' => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => $queried_object->taxonomy,
            'field' => 'id',
            'terms' => $queried_object->term_id,
          )
        )
      );
      $produtos = new WP_Query( $args );
      $posts = $produtos->posts;
      //pecorre produtos para criar um array com todos os itens da taxonomia produtos
      $terms = array();
      $termsSlug = array();
      foreach( $posts as $post){
        $postTaxonomies = get_the_terms($post->ID, 'produtos' );
        foreach($postTaxonomies as $postTax){
          if($postTax->parent == 0) {
            $terms[] = $postTax->name;
            $termsSlug[] = $postTax->slug;
          }
        }
      }
      //elimina duplicados
      $terms = array_unique($terms);
      $termsSlug = array_unique($termsSlug);
      if($terms){
    ?>
    <ul class="nav justify-content-center">
      <li class="nav-item active">
        <a class="nav-link" href="#todos">Todos</a>
      </li>
      <?php
        foreach ( $terms as $key => $term ){
      ?>             
      <li class="nav-item">
        <a class="nav-link" href="#<?php echo $termsSlug[$key] ?>"><?php echo $term; ?></a>
      </li>
      <?php
        }
      ?> 
    </ul>
    <?php
      }
    ?>
    <div class="row">
      <?php
      if( $produtos->have_posts() ){
        while( $produtos->have_posts()){
          $produtos->the_post(); 
          $categorias = get_the_terms( $post->ID, 'produtos' );
          $cidadeTax = get_the_terms($post->ID, $queried_object->taxonomy );
          $hrefLink = get_the_permalink() ."?tipo-produto=" . $categorias[0]->name ."&cidade=" . $cidadeTax[0]->name ;
      ?>
      <div class="default-service-column col-md-4 imagemGaleria <?php foreach($categorias as $categoria){ echo $categoria->slug . " "; } ?>">
        <a href="<?php echo $hrefLink; ?>" class="card-text">
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
                  <p><?php
                    foreach($categorias as $categoria){
                      if($queried_object->term_id !== $categoria->term_id){
                        echo $categoria->name.'-';
                      }
                    }
                  ?></p>
                  <div class="more-link">
                    <a href="<?php the_permalink(); ?>" class="read-more">Clique aqui</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div> 
      <?php
          }
        }
      wp_reset_postdata();
      ?>
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
    include_once('inc/floater.php');
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
  ?>
</body>
