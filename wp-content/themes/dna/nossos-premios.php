<div class="container-fluid nossos-premios">
    <div class="container my-container">
        <div class="cabecalho-light">
            <h2>Nossos Prêmios</h2>  
            <span></span> 
        </div>
        <div class="row">
            <?php
                $material = new WP_Query( array(
                    'post_type' => 'premios',
                    'posts_per_page' => 6
                )); 

                if( $material->have_posts() ):
                    while( $material->have_posts() ) : $material->the_post();                         
            ?>
            <div class="col-md-2 col-6">  
                <?php
                    $image = get_field('imagem');
                    if( !empty($image) ):
                ?>
                    <img src="<?php echo $image['url']; ?>" class="d-block w-100 img-fluid rounded" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
            </div>            
                <?php                            
                endwhile;
            endif;
            ?>

        </div>
        <a href="<?php bloginfo('url'); ?>/a-lafaete"><button class="btn botao-laranja" type="button">Veja todos</button></a>
    </div>
</div>