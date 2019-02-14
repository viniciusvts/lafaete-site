<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>    
    <?php //include_once('inc/slider-home.php'); ?>
    <?php //include_once('floater.php'); ?>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height">
            <h1>Grandes Obras</h1>
          </div>
          <img class="d-block w-100" src="inc/img/slider-construcao.jpg" alt="First slide">
        </div>
      </div>
    </div>

    <section id="galeria" class="projetos-sociais">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
            <li class="fade">
              <span class="numero">1 / 3</span>
              <img src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="imagem 1" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">2 / 3</span>
              <img src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="imagem 2" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">3 / 3</span>
              <img src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="imagem 3" class="imagem-responsiva">
            </li>
        </ul>
        <div id="botoes">
            <a href="" id="seguinte">&#10095;</a>
            <a href="" id="anterior">&#10094;</a>
        </div>
      </div>
      <div id="dots">
        <span class="dot ativo"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </section>

    <!--
    <div class="container-fluid my-container projetos-recentes" id="grandesobras">
        <div class="container">
        <div class="row">
            <?php for($c=0; $c<6; $c++){ ?>
            <div class="col-md-4 imagemGaleria maquinasLeves"> 
            <div class="over esconder">
                <svg enable-background="new 0 0 491.86 491.86" version="1.1" viewBox="0 0 491.86 491.86" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                <path d="m465.17 211.61h-184.92v-184.92c0-8.424-11.439-26.69-34.316-26.69s-34.316 18.267-34.316 26.69v184.92h-184.92c-8.423-1e-3 -26.69 11.438-26.69 34.314s18.267 34.316 26.69 34.316h184.92v184.92c0 8.422 11.438 26.69 34.316 26.69s34.316-18.268 34.316-26.69v-184.92h184.92c8.422 0 26.69-11.438 26.69-34.316s-18.27-34.315-26.693-34.315z" fill="#fff"/>
                </svg>
                <div class="rodape">
                <h4>RAMAL FERROVIÁRIO S11D</h4>
                <p>Local: Canaã dos Carajás/ Parauapebas – PA</p>
                <p>Tempo de obra: 3 anos</p>
                <p>Quantidade de equipamentos: 180</p>
                <p>Serviço prestado: Locação de equipamentos para terraplanagem</p>
                </div>
            </div>
            <img class="d-block w-100 over-img" src="inc/img/programa-gestao-residuos-construcao-civil.jpg" alt="Second slide">  
            </div>
            <?php } ?>
        </div>
        </div>
    </div>-->

    <div class="container produtos-container">
      <div class="row">
        <?php for($c=0; $c<3; $c++){ ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <a href="#">
                    <img width="100%" height="270" src="inc/img/programa-gestao-residuos-construcao-civil.jpg" class="img-responsive wp-post-image" alt="featured-image-1">
                  </a>
                  </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h3>RAMAL FERROVIÁRIO S11D</h3>
                      <p>Local: Canaã dos Carajás/ Parauapebas – PA</p>
                      <p>Tempo de obra: 3 anos</p>
                      <p>Quantidade de equipamentos: 180</p>
                      <p>Serviço prestado: Locação de equipamentos para terraplanagem</p>                   
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