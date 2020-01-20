<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php 
    include_once('menu.php');
    $queriedObject = get_queried_object();
    $imagem = get_field( 'imagem', $queriedObject );
    ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height d-none d-md-block">
            <h2>Locação de</h2>
            <h1> <?php echo $queriedObject->name; ?> </h1>
          </div>
          <img class="d-block w-100" src="<?php echo( $imagem['sizes']['large'] ); ?>" alt="First slide">
        </div>
      </div>
    </div>
	<div class="blog-floater">
        <div class="container">
            <div class="row"> 
                <div class="col-md-4">
                <p> Home » Vendas » <?php echo $queriedObject->name;?> </p>
                </div>
                <div class="col-md-4 formulario">
					<?php $search = isset( $_GET['searchkey'] )? $_GET['searchkey'] : ""; ?>
					<form ROLE="search" action="<?php bloginfo( 'wpurl' ); ?>/produtos" method="get">
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

    <div class="container produtos-container menu-imoveis">
      <?php
        $term_id = $queriedObject->term_id;
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
        $postsPerPage = get_option( 'posts_per_page' );
        $paged = isset( $_GET['sheet'] )? $_GET['sheet'] : 1;
        $args = array(
                'post_type' => 'produto',
                'order' => 'ASC' ,
          'posts_per_page' => $postsPerPage,
          'paged' => $paged,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'produtos',
                    'field' => 'id',
                    'terms' => $queriedObject->term_id,
                    'include_children' => false
                  )
                )
        );
        $produtos = new WP_Query( $args );
        $posts = $produtos->posts;
        if( $produtos->have_posts() ){
          $array = [];
          $arrayslug = [];
          while($produtos->have_posts()) {
            $produtos->the_post();
            $examplePost = get_post();
            // $ids = $examplePost->ID;
            // $p[$i] = $ids;
            // var_dump($examplePost);
            $estados = wp_get_object_terms($examplePost->ID, 'estado');
            foreach($estados as $estado) {
              array_push($array, $estado->name);
              array_push($arrayslug, $estado->slug);
            }
          } ?>
          <hr>
        <ul id="estados" class="nav justify-content-center">
            <li class="nav-item active">
              <a class="nav-link" href="#todos">Todos os Estados</a>
            </li>
          <?php
          $estados_unique = array_unique($array);
          $slugs = array_unique($arrayslug);
          $count = count($arrayslug);
          for($i = 0; $i < $count; $i++) {
            if($slugs[$i] != null && $estados_unique[$i] != null) {
              echo "
              <li class='nav-item'>
                <a class='nav-link' href='#".$slugs[$i]."'>".$estados_unique[$i]."</a>
              </li>";
            }
          }
        }
      ?>
      </ul>
      <div class="row">
<?php
          $posts = $produtos->posts;
          if( $produtos->have_posts() ):
            foreach($posts as $post) {
              $estados = wp_get_object_terms($post->ID, 'estado');
              $categorias = isset( $catTax ) ? $catTax : get_the_terms( $post->ID, 'produtos' );
              if( $categorias ){
                $lastIndexOfCat = count($categorias) - 1;
              }
              $hrefLink = isset( $hrefLink ) ? $hrefLink : get_the_permalink();
              ?>
              <!-- inc/card-produto -->
<div class="default-service-column col-md-4 imagemGaleria 
    <?php
        foreach($estados as $estado) {
          echo $estado->slug.' ';
        }
        foreach($categorias as $categoria){
          if(get_queried_object()->term_id !== $categoria->term_id){
              echo $categoria->slug;
              echo " ";
          }
      }
  ?>">
    <a href="<?php echo($hrefLink); ?>" class="card-text">
        <div class="inner-box">
            <div class="inner-most">
                <figure class="image-box">
                    <?php the_post_thumbnail('large'); ?>
                </figure>
                <div class="lower-part">
                    <div class="left-curve">                      
                    </div>
                    <div class="right-curve">                      
                    </div>                    
                    <div class="content">
                        <h3><?php the_title(); ?></h3>
                        <!-- <p><?php 
                                foreach($categorias as $key => $categoria){
                                    if(get_queried_object()->term_id !== $categoria->term_id){
                                        echo $categoria->name;
                                        if($key != $lastIndexOfCat){
                                            echo ", ";
                                        }else{
                                            echo ".";
                                        }
                                    }
                                }
                            ?></p>
                        <div class="more-link">
                            <a href="<?php echo($hrefLink); ?>" class="read-more">Clique aqui</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </a>
</div> 
              <?php
            while( $produtos->have_posts()) : $produtos->the_post(); 
              
            endwhile;
          }
          endif;
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
    <div id="produtos">
      <div class="container produto-floater">
        <div class="row">
          <div class="col-xl-8 texto">
            <div class='scroll-rtl'>
              <p><?php echo $queriedObject->description; ?></p>
              <button class="btn">
                <a href="#faca-um-orcamento">Faça um orçamento agora</a>
              </button>
              
            </div>
          </div>
          <div class="col-xl-4 pagamento">
            <h4>Condições de Pagamento</h4>
            <img src="<?php bloginfo('template_url');?>/inc/img/pagseguro.png">
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