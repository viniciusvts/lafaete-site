<!-- SLIDER -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner carousel-flat-height">
    <div class="carousel-item active">
        <div class="carousel-caption carousel-caption-flat-height">
        <h1><?php the_title(); ?></h1>
        </div>
        <?php the_post_thumbnail('large',array('class' => 'img-fluid w-100'));?>
    </div>
    </div>
</div>