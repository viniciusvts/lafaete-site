<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod">
    <?php 
    include_once('menu.php');
    $queriedObject = get_queried_object();
    $imagem = get_field( 'imagem', $queriedObject );
    ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide flatheaderdiv" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height d-none d-md-block">
            <?php
            // Para cliente que quer que especificamente essas duas categorias não tenham "Locação de'
            //estruturas metalicas 52 || sombreadores 83
            if($queriedObject->term_id == 52 || $queriedObject->term_id == 83){
              //nothing
            }else{
            ?>
            <h2>Locação de</h2>
            <?php
            }
            ?>
            <h1> <?php echo $queriedObject->name; ?> </h1>
          </div>
          <img class="d-block w-100" src="<?php echo( $imagem['sizes']['large'] ); ?>" alt="First slide">
        </div>
      </div>
    </div>
	<div class="blog-floater">
        <div class="container">
            <div class="row"> 
                <div class="col-md-5 d-flex align-items-center">
                <p> Home <span>»</span> Vendas <span>»</span> <?php echo $queriedObject->name;?> </p>
                </div>

                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-8 formulario d-flex align-items-center">
                    <?php $search = isset( $_GET['searchkey'] )? $_GET['searchkey'] : ""; ?>
					<form ROLE="search" action="<?php bloginfo( 'wpurl' ); ?>/produtos" method="get">
						<div>
							<label class="screen-reader-text" for="s">Pesquisar por:</label>
							<input type="text" value="<?php echo($search); ?>" name="searchkey" id="searchkey">
							<input type="submit" id="searchsubmit" value="Pesquisar">
						</div>
					</form>  
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                    <div class="blog-categorias">
                  <a id="nolink" href="#" class="togglecats">
                        <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                      </a> 
                  <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"></path> <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"></path> <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"></path> </svg>
                      
                  </div> 
                  <?php include('inc/submenu.php'); ?>
                    </div>
                  </div>
                </div>
               
            
            </div>  
        </div>    
      </div>      
    </div>
    <?php
    include_once('inc/produtos-orcamento-agora.php');
    ?>
    <div class="section-modelos">
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
      ?>
      <div class="row">

        <?php         
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
          if( $produtos->have_posts() ):
            while( $produtos->have_posts()) : $produtos->the_post(); 
              include 'inc/card-produto.php';
            endwhile;
          endif;
          wp_reset_postdata();
        ?>
	  </div>
    </div>  
    </div>
    
   
    <?php
      include_once('inc/form-orcamento.php');
      include_once('newsletter.php');
      include_once('footer.php');
    ?>
  </body>
</html>