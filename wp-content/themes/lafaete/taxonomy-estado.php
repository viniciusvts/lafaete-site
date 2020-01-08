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
        <div class="carousel-caption carousel-caption-flat-height d-md-block">
          <h1>
            <p>Locação de Equipamentos </p>
            <?php echo $queried_object->name; ?>
          </h1>
        </div>
        <img class="d-block w-100" src="<?php bloginfo('template_url'); ?>/inc/img/tratores ao por do sol.jpg" alt="First slide">
      </div>
    </div>
  </div>

  <!-- Produtos -->
  <div class="container produtos-container menu-imoveis">
    <?php
      //Buscar todos os posts que estão no termo atual da taxonomia 
      // $postsPerPage = get_option( 'posts_per_page' );
      // $paged = isset( $_GET['sheet'] )? $_GET['sheet'] : 1; 
      $args = array(
        'post_type' => array( 'produto', 'servicos'),
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
        if( $post->post_type == "produto"){
          $postTaxonomies = get_the_terms($post->ID, 'produtos' );
          foreach($postTaxonomies as $postTax){
            if($postTax->parent == 0) {
              $terms[] = $postTax->name;
              $termsSlug[] = $postTax->slug;
            }
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
          //para compor o link preciso das taxonomias produto e cidade
          $hrefLink = get_the_permalink();
          if( $post->post_type == "produto"){
            $catTax = get_the_terms( $post->ID, 'produtos' );
            $hrefLink = get_the_permalink() ."?tipo-produto=" . $catTax[0]->name ."&local=" . $queried_object->name ;
          }
          include 'inc/card-produto.php';
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
