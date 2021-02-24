
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
            <div class="arrow-left" style="display: none"></div>
            <div class="bp-carousel-inner">
                <?php
                $size = 0;
                   while( $material->have_posts() ){
                        $material->the_post();
                        $size++;
                        $materialSize++;
                        $image = get_field('imagem');
                        if( !empty($image) ){
                ?>
                <div class="bp-item col-12 col-md-4 col-lg-24">
                    <img src="<?php echo $image['sizes']['medium']; ?>" class="rounded" alt="<?php echo $image['alt']; ?>" />
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="arrow-right" style="display: none"></div>
            <ul class="bp-indicators"><!-- será preenchido do lado do cliente --></ul>
        </div>
        <div class="mt-np">
            <a href="<?php bloginfo('url'); ?>/a-lafaete"><button class="btn botao-laranja" type="button">VER TODOS</button></a>
        </div>
    </div>
</div>
<?php 
}
?>