<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php 
      include_once('menu.php'); 
      include_once("inc/slider.php");
      include_once("inc/floater-destaque.php");
    ?>


    <div class="container servicos">
      <div class="cabecalho">
        <h2>Serviços</h2>
        <span></span> 
        <!--<p>Lorem ipsum dolor sit amet, sed platonem erroribus ut. Vix homero partem ut, quem doming philosophia eam no. Vis perpetua partiendo an, vim te natum intellegam. Viderer commune gloriatur mel ea, no decore corrumpit mel. Ex fastidii disputationi mel.</p>-->
      </div>
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

    <?php include_once("nossos-premios.php"); ?>

    <?php include_once("depoimentos.php"); ?>

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