<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="tax-prod page-produtos">
    <?php include_once('menu.php'); ?>
    
    <?php include_once('flat-header.php'); ?>


    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <div class="cabecalho">
                    <h2 class="text-center">Escolha a Unidade</h2>
                    <span></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="produtos-container menu-imoveis">
                    
                    <ul class="nav justify-content-center">
                        <?php
                            $unidades = new WP_Query(array('post_type' => 'unidades'));
                            $unidade = 0;
                            while($unidades->have_posts()) : $unidades->the_post();
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#unidade<?php echo $unidade; ?>"><?php the_title(); ?></a>
                        </li>

                        <?php 
                            $unidade++; 
                            endwhile;
                        ?>
                    </ul>
                </div>         
            </div>
            
            <?php $unidadeDescricao = 0; while($unidades->have_posts()) : $unidades->the_post(); ?>
            <div class="col-md-12 imagemGaleria unidade<?php echo $unidadeDescricao; ?> esconder">               
                <h2 class="titulo-mapa"><?php the_title(); ?></h2> 
                <h3 class="telefone"><strong>Telefone:</strong> <?php the_field('telefone'); ?></h3>  
                <p><strong>Endereço:</strong> <?php the_field('endereco'); ?></p>   
                <?php the_field('mapa'); ?>                              
               <!--
                <div class="container produtos-container">
                    <div class="cabecalho">
                        <h2 class="text-center"><?php the_title(); ?></h2>
                        <span></span>
                    </div>
                    <div class="row">
                        <?php
                            if ( have_posts() ) : while (have_posts()) : the_post(); 
                            $categories = get_the_category();
                            $thumbnail_id = get_post_thumbnail_id( $post->ID );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        ?>
                        <div class="default-service-column col-md-4">
                            <div class="inner-box">
                                <div class="inner-most">
                                    <figure class="image-box">
                                        <img width="100%" height="270" src="inc/img/categoria-01-2.png" class="img-responsive wp-post-image" alt="featured-image-1">                                    
                                    </figure>
                                    <div class="lower-part">
                                        <div class="left-curve"></div>
                                        <div class="right-curve"></div>                    
                                        <div class="content">
                                            <h3>Caçambas</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            <div class="more-link"><a href="taxonomy-categoria.php" class="read-more">Clique aqui</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; endif; ?>
                    </div>  
                </div> -->
            </div>
            <?php 
                $unidadeDescricao++;
                endwhile;
            ?>
        </div>
    </div>
   
    <?php
        include_once('newsletter.php');
        include_once('footer.php');
    ?>
  </body>
</html>