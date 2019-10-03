<div class="container-fluid nossos-premios">
    <div class="container my-container">
        <div class="cabecalho-light">
            <h2>Nossos Prêmios</h2>  
            <span></span> 
        </div>
        <div id="slider_container">
            <?php
                $material = new WP_Query( array(
                    'post_type' => 'premios',
                    'posts_per_page' => 6
                )); 

                if( $material->have_posts() ):                         
            ?>
            <div id="slider_images">  
                <?php
                    while( $material->have_posts() ) : $material->the_post();
                        $image = get_field('imagem');
                        if( !empty($image) ):
                ?>
                    <img src="<?php echo $image['url']; ?>" class="rounded" alt="<?php echo $image['alt']; ?>" />
                <?php                                     
                        endif;
                    endwhile;
                ?>
            </div>            
                <?php    
            endif;
            ?>

        </div>
        <div class="row">
            <p id="slider_controls">
                <span class="selected"></span>
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
            </p>
        </div>
        <a href="<?php bloginfo('url'); ?>/a-lafaete"><button class="btn botao-laranja" type="button">Veja todos</button></a>
    </div>
</div>
