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
            <h1>Abertura de Chamado</h1>
          </div>
          <img class="d-block w-100" src="inc/img/slider-construcao.jpg" alt="First slide">
        </div>
      </div>
      <div class="container floater-destaque">
    </div>
    </div>

    <div class="fale-conosco">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="fale-conosco-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Nome do Solicitante*" type="text">
                                </div>

                                <div class="col-md-3 div-select">
                                    <input placeholder="Telefone*" type="text">
                                </div>

                                <div class="col-md-3 div-select">
                                    <input placeholder="Email*" type="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Localização de Equipamento*" type="text">
                                </div>
                                <div class="col-md-6">
                                    <input placeholder="Tag/Placa do Veículo*" type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input placeholder="Nível de Combustível" type="text">
                                </div>
                                <div class="col">
                                    <input placeholder="Horímetro do Equipamento" type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <textarea rows="4" cols="50" placeholder="Mensagem"></textarea> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="float-right btn botao-laranja">Enviar</button>
                                </div>
                            </div>                        
                        </div>
                    </form>
                </div>
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