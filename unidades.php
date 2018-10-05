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
            <h1>Unidades</h1>
          </div>
          <img class="d-block w-100" src="inc/img/unidades.jpeg" alt="First slide">
        </div>
      </div>
      <div class="container floater-destaque">
    </div>


    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <div class="cabecalho">
                    <h2 class="text-center">Escolha a Unidade</h2>
                    <span></span>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Jaboatão de Guararapes</option>
                        <option>Jaboatão de Guararapes</option>
                        <option>Jaboatão de Guararapes</option>
                        <option>Jaboatão de Guararapes</option>
                        <option>Jaboatão de Guararapes</option>
                        </select>
                    </div>
                </form>
                <h2 class="laranja">Belo Horizonte - MG</h2> 
                <h3 class="telefone"><strong>Telefone:</strong> (31) 2519-2900</h3>  
                <p><strong>Endereço:</strong> Rua Paraoquena, 181 - Nova Granada Belo Horizonte - MG</p>           
            </div>
            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.4438058985666!2d-43.97084518508513!3d-19.947829686593735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa697a4b4f26511%3A0xf3b83d2dfc10d6ed!2sR.+Paraoquena%2C+181+-+Nova+Granada%2C+Belo+Horizonte+-+MG%2C+30431-420!5e0!3m2!1spt-BR!2sbr!4v1490167883226" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <?php include_once("nossos-premios.php"); ?>
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>