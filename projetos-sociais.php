<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height">
            <h1>Projetos Sociais</h1>
          </div>
          <img class="d-block w-100" src="inc/img/solidariedade.jpg" alt="First slide">
        </div>
      </div>
    </div>

    <section id="galeria" class="projetos-sociais">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
            <li class="fade">
              <span class="numero">1 / 3</span>
              <div class="over">
                <div class="rodape">
                <h4>Lona na Lua</h4>
                <p>Lona na Lua: doação de containers linha termoacústica para o quadro “Um por todos, todos por um”, exibido pelo programa do Luciano Huck. Os containers foram utilizados como escritórios, banheiros, camarins, vestiários e cantina.</p>
                <p>O Lona na Lua é uma associação cultural e social sem fins lucrativos, que tem como objetivo proporcionar cultura e arte inclusiva para a população das periferias dos municípios de Rio Bonito e Silva Jardim, no Rio de Janeiro, através de atividades nas áreas do Teatro, Dança, Música e Circo.</p>
                </div>
              </div>
              <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" alt="imagem 1" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">2 / 3</span>
              <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" alt="imagem 2" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">3 / 3</span>
              <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" alt="imagem 3" class="imagem-responsiva">
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

    <div class="container produtos-container">
      <div class="row">
        <?php for($c=0; $c<3; $c++){ ?>
        <div class="default-service-column col-md-4">
          <div class="inner-box">
              <div class="inner-most">
                <figure class="image-box">
                  <a href="#">
                    <img width="100%" height="270" src="inc/img/12386748_866223920161791_1426502538_n.jpg" class="img-responsive wp-post-image" alt="featured-image-1">
                  </a>
                  </figure>
                <div class="lower-part">
                    <div class="left-curve"></div>
                    <div class="right-curve"></div>                    
                    <div class="content">
                      <h3>Projeto <?php echo $c + 1; ?></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>                      
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