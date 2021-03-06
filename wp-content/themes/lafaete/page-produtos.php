<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>
    
    <?php include_once('flat-header.php'); ?>
	<div class="blog-floater">
        <div class="container">
            <div class="row"> 
                <div class="col-md-3">
                  <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                  <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
                  </svg>
                  <?php wp_custom_breadcrumbs() ?>
                </div>
                <div class="col-md-6 formulario">
					<?php $search = isset( $_GET['searchkey'] ) ? $_GET['searchkey'] : '';?>
					<form ROLE="search" action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="get">
						<div>
							<label class="screen-reader-text" for="s">Pesquisar por:</label>
							<input type="text" value="<?php echo($search); ?>" name="searchkey" id="searchkey">
							<input type="submit" id="searchsubmit" value="Pesquisar">
						</div>
					</form>    
                </div>
                <div class="col-md-3 d-sm-flex">
                  <div class="blog-categorias">
                      <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">                        
                        <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"/>
                        <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"/>
                        <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"/>                    
                      </svg>
                      <a href="#" id="nolink">
                        <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                      </a> 
                  </div> 
					<?php include('inc/submenu.php'); ?>
                </div>
            </div>  
        </div>    
      </div>      
    </div>
    <?php
        $postsPerPage = get_option( 'posts_per_page' );
        $paged = isset( $_GET['sheet'] ) ? $_GET['sheet'] : 1;
        $search = isset( $_GET['searchkey'] ) ? $_GET['searchkey'] : null;
        $args = array(
          'post_type' => 'produto',
          'posts_per_page' => $postsPerPage,
          'paged' => $paged,
        );
        if( isset( $search ) ){
          $args['s'] = $search;
        }
        $produtos = new WP_Query($args);
        $posts = $produtos->posts;
        if( $produtos->have_posts() ){
          $array = [];
          $arrayslug = [];
          $link = get_bloginfo('url');
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
          }
    ?>
    <div class="container produtos-container">
        <ul id="estados" style="margin:auto" class="nav justify-content-center">
          <?php
          $estados_unique = array_unique($array);
          $slugs = array_unique($arrayslug);
          $count = count($arrayslug);
          foreach($estados_unique as $key => $estado) {
            if($slugs[$key] != null && $estados_unique[$key] != null) {
              echo "
              <li class='nav-item'>
                <a class='nav-link' href='".$link."/estado/".$slugs[$key]."'>".$estados_unique[$key]."</a>
              </li>";
            }
          }
        }
      ?>
      </ul>
      <div class="row">
      <?php
        if( isset( $search ) ){// se teve pesquisa na search box, exibir os produtos
          if( $produtos->have_posts() ){
            while( $produtos->have_posts()){
              $produtos->the_post();
              $hrefLink = get_the_permalink();
              include 'inc/card-produto.php';
            }
          }
          wp_reset_postdata();
        //fim se isset($search)
        }else{ // se n??o teve pesquisa na search box, exibe as categorias
          if($produtos->have_posts()){// verifico se existe post se n??o existe post nem preciso fazer a query
            $produtos->the_post();    
            $terms = get_terms( array(
              'taxonomy' => 'produtos',
              'parent' => 0,
              'hide_empty' => true,
            ));
            foreach ( $terms as $term ){
              $image = get_field('imagem', $term);          
        ?>
        <div class="default-service-column col-md-4 imagemGaleria">
          <a href="<?php bloginfo('url')?>/produtos/<?php echo $term->slug; ?>" class="read-more">
            <div class="inner-box">
                <div class="inner-most">
                  <figure class="image-box">
                    <img width="100%" height="270" src="<?php echo $image['sizes']['medium']; ?>" class="img-responsive wp-post-image" alt="<?php echo $image['alt']; ?>">
                  </figure>
                  <div class="lower-part">
                      <div class="left-curve"></div>
                      <div class="right-curve"></div>                    
                      <div class="content">
                        <h3><?php echo $term->name; ?></h3>
                        <p><?php 
                          $maxLength = 500;
                          echo substr($term->description, 0, $maxLength);
                          if( strlen($term->description) >= $maxLength) echo("[...]");
                        ?></p>
                      </div>
                  </div>
                </div>
            </div>
          </a>
        </div>
        <?php
            }
          } //fim if($produtos->have_posts()){
        }//fim else isset( $search )
        ?>    
      </div>  
      <?php 
      if( isset( $search ) ){
      ?>
      <div class="row container paginate-container">
        <div class="paginate">
          <div class="line-L col-6">
            <?php
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
                echo "Pr??xima";
                echo "</a>";
              }
            ?>
          </div>
        </div>
      </div>
      <?php 
      }
      ?>
    </div>  
   
    <?php
    include_once('inc/form-orcamento.php');
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>