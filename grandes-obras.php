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
          <div class="carousel-caption carousel-caption-flat-height">
            <h1>Grandes Obras</h1>
          </div>
          <img class="d-block w-100" src="inc/img/slider-construcao.jpg" alt="First slide">
        </div>
      </div>
    </div>

    <div class="container-fluid my-container projetos-recentes" id="grandesobras">
        <div class="container">

        <!--
        <ul class="nav justify-content-center">
            <li class="nav-item active">
            <a class="nav-link" href="#todos">Todos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#maquinasLeves">Categoria</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#maquinasPesadas">Categoria</a>
            </li>
        </ul>-->

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
    </div>
    
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>