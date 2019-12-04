
<!--Carousel Nossos premios -->
<?php
    $material = new WP_Query( array(
        'post_type' => 'premios',
        'posts_per_page' => 10
    )); 
    $materialSize = 0;
    if( $material->have_posts() ){                      
?>
<div class="container-fluid nossos-premios">
    <div class="container my-container">
        <div class="cabecalho-light">
            <h2>Nossos Prêmios</h2>  
            <span></span> 
        </div>
        <div class="bp-one bp-carousel" id="massaCarousel">
            <div class="arrow-left"></div>
            <div class="bp-carousel-inner">
                <?php
                   while( $material->have_posts() ){
                        $material->the_post();
                        $materialSize++;
                        $image = get_field('imagem');
                        if( !empty($image) ){
                ?>
                <div class="bp-item col-md-4 col-12">
                    <img src="<?php echo $image['url']; ?>" class="rounded" alt="<?php echo $image['alt']; ?>" />
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="arrow-right"></div>
        </div>
        <div class="mt-np">
            <a href="<?php bloginfo('url'); ?>/a-lafaete"><button class="btn botao-laranja" type="button">Veja todos</button></a>
        </div>
    </div>
</div>
<?php 
}
?>