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
              <span class="numero">1 / 5</span>
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
              <span class="numero">2 / 5</span>
              <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" alt="imagem 2" class="imagem-responsiva">
            </li>
            <li class="fade">
              <span class="numero">3 / 5</span>
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
    
    <div class="container">
      <div class="row">
        <div class="col-md-4 imagem">
          <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" class="imagem-responsiva">
        </div>
        <div class="col-md-4 imagem">
          <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" class="imagem-responsiva">
        </div>
        <div class="col-md-4 imagem">
          <img src="inc/img/12386748_866223920161791_1426502538_n.jpg" class="imagem-responsiva">
        </div>             
      </div>
    </div>    
    
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>