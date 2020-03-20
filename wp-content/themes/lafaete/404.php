<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php 
      include_once('menu.php'); 
    ?>
    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-flat-height">
        <div class="carousel-item active">
          <div class="carousel-caption carousel-caption-flat-height">
            <h1>Página não encontrada!</h1>
          </div>
          <img src="<?php echo( get_theme_mod( 'dnaTheme_setting_404Header') ); ?>" class="img-fluid w-100">
        </div>
      </div>
    </div>
    <?php include_once('inc/search-floater.php'); ?>
    <!-- SLIDER -->
    <div class="container">
      <div class="row">
        <div class="col-12" style="text-align: center;">
          <div>
            <hr>
            <p><strong>Talvez não seja possível exibir a página solicitada devido à um dos seguintes motivos:</strong></p>
            <p><strong>Link de favoritos desatualizado</strong>;</p>
            <p>Um mecanismo de busca que possua uma referência <strong>desatualizada de nosso site</strong>;</p>
            <p>Uma <strong>URL digitada incorretamente</strong>;</p>
            <hr>
            <p style="margin-top: 20px;"><a href="<?php bloginfo('url'); ?>" title="Página Inicial">Voltar para Página Inicial</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid"> 
      <div class="row">
        <div class="col-md-6 faca-um-orcamento">
          <h2>Faça um Orçamento</h2>
          <a href="<?php bloginfo('url');?>/orcamento"><button class="btn botao-laranja">Solicitar</button></a>
        </div>
        <div class="col-md-6 trabalhe-conosco"> 
          <h2>Trabalhe Conosco</h2>
          <a href="<?php bloginfo('url');?>/trabalhe-conosco"><button class="btn botao-laranja">Cadastrar Currículo</button></a>
        </div>
      </div>
    </div>
    
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>