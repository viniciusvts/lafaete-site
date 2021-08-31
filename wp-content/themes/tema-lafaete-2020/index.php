<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body class="home">
    <?php 
      include_once('menu.php'); 
    ?>
    <?php $imgs = get_template_directory_uri()."/inc/img/update/"; ?>
    <!-- resolve página não possui h1 -->
    <h1 class="d-none">Lafaete locação de equipamentos</h1>
<section id="megabanner">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-8 col-sm-6">
      <div class="image" style="background-image:url(<?php echo $imgs; ?>novo-banner.jpg">
        <button href="https://www.youtube.com/watch?v=O41bs9mYamA" data-lity>
          <img src="<?php echo $imgs; ?>bt_video.png" alt="">
        </button>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 d-flex align-items-center">
      <div id="box50" class="d-flex align-items-center">
        <div class="w100">
        <img src="<?php echo $imgs; ?>50anos.png" alt="">
        <img src="<?php echo $imgs; ?>juntos.png" alt="">
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
    <?php
      //include_once("inc/slider.php");
      include_once("inc/floater-destaque.php");
    ?>


    <div class="container servicos remove--margin">
      <div class="cabecalho">
        <h2>Serviços</h2>
        <span></span> 
        <!--<p>Lorem ipsum dolor sit amet, sed platonem erroribus ut. Vix homero partem ut, quem doming philosophia eam no. Vis perpetua partiendo an, vim te natum intellegam. Viderer commune gloriatur mel ea, no decore corrumpit mel. Ex fastidii disputationi mel.</p>-->
      </div>
      
    </div>

    <div class="envelope-servicos">
    <div class="container servicos">
      <div class="row">
        <?php
          $servicos = new WP_Query(array('post_type' => 'servicos', 'orderby' => 'date'));
          while($servicos->have_posts()) : $servicos->the_post();    
        ?>
        <div class="col-md-4 mr-auto ml-auto">
          <div class="servicos-col">
            <?php the_field('icone'); ?>
            <h3 class="servicos-titulo"><?php the_title(); ?></h3>
            <p class="servicos-paragrafo"><?php the_field('resumo'); ?></p>
            <div class="botao"><a href="<?php the_permalink(); ?>"><button type="button" class="btn btn-light">Leia mais</button></a></div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    </div>
    <?php include_once("nossos-premios.php"); ?>

    <?php include_once("depoimentos.php"); ?>

    <div class="container-fluid" id="ctas"> 
      <div class="row">
        <div class="col-lg-6 faca-um-orcamento" style="background-image:url(<?php echo $imgs;?>img-orcamento.jpg)">
          <h2>Faça um Orçamento</h2>
          <a href="<?php bloginfo('url');?>/orcamento"><button class="btn botao-laranja">Solicitar</button></a>
        </div>
        <div class="col-lg-6 trabalhe-conosco" style="background-image:url(<?php echo $imgs;?>img-trabalhe.jpg)"> 
          <h2>Trabalhe Conosco</h2>
          <a href="https://lafaete.solides.jobs/" target="blank_"><button class="btn botao-laranja">Cadastrar Currículo</button></a>
        </div>
      </div>
    </div>
    
    <?php
    include_once('newsletter.php');
    get_template_part('inc/politica-integrada');
    include_once('footer.php');
    ?>
  </body>
</html>