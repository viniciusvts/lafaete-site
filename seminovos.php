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

      <div class="blog-floater">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
                    </svg>
                    <p> Home » Seminovos</p>
                </div>
                <div class="col-md-4 formulario">
                    <input type="text" value="" name="s" id="s" placeholder="Digite aqui">
                    <input class="btn" type="submit" id="searchsubmit" value="Buscar">    
                </div>
                <div class="col-md-4">
                    <div class="blog-categorias">
                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">                        
                            <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"/>
                            <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"/>
                            <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"/>                    
                        </svg>
                        <a href="#">
                            <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                        </a> 
                    </div> 

                    <div class="submenu-categorias esconder">
                    <ul>
                      <li><a href="">Catetoria 1</a></li>
                      <li><a href="">Catetoria 1</a></li>
                      <li><a href="">Catetoria 1</a></li>
                      <li><a href="">Catetoria 1</a></li>
                      <li><a href="">Catetoria 1</a></li>
                    </ul>
                  </div>
                </div>
            </div>  
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
                  <a href="single-seminovos.php">
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
                        <div class="more-link"><a href="single-seminovos.php" class="read-more">Clique aqui</a></div>
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