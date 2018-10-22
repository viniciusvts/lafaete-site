<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>    
    <?php //include_once('inc/slider-home.php'); ?>
    <?php //include_once('floater.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height d-none d-md-block">
            <h1>Seminovos</h1>
          </div>
          <img class="d-block w-100" src="inc/img/slider-construcao.jpg" alt="First slide">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <?php for($c=0; $c<6; $c++){ ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <a href="taxonomy-categoria.php">
                    <img width="100%" height="270" src="inc/img/trator-new-holland-premio-do-ano.jpg" class="img-responsive wp-post-image" alt="featured-image-1">
                  </a>
                  </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                        <h3>CAMINHÃO POLIGUINDASTE SIMPLES</h3>
                        <div class="mx-auto">
                            <div class="row">
                                <div class="col">
                                    <p class="text-center">Modelo: VW 9.150</p>
                                </div>
                                <div class="col">
                                    <p class="text-center">Série: HJA**82</p>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col">
                                    <p class="text-center">Ano: VW 9.150</p>
                                </div>
                                <div class="col">
                                    <p class="text-center">Horímetro: </p>
                                </div>
                            </div>
                            <p class="text-center">Unidade: Minas Gerais</p>
                        </div>
                        <h3>Preço: R$290.000</h3>
                        <div class="more-link"><a href="taxonomy-categoria.php" class="read-more">Clique aqui</a></div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <?php } ?>
      </div>  
    </div>  
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>