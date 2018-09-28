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
            <h1>Faça um Orçamento</h1>
          </div>
          <img class="d-block w-100" src="inc/slider-construcao.jpg" alt="First slide">
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
                                <div class="col-md-8">
                                    <input placeholder="Empresa*" type="text">
                                </div>

                                <div class="col-md-4 div-select">
                                    <input placeholder="CNPJ*" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input placeholder="Nome" type="text">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Telefone*" type="text">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Email*" type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <h4>Produtos Desejados</h4>
                                    <?php for($produtos = 0; $produtos < 9; $produtos++){ ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Caçambas</label>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-3">
                                    <h4>Serviços Desejados</h4>
                                    <?php for($produtos = 0; $produtos < 3; $produtos++){ ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Caçambas</label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input placeholder="Local da sua Obra*" type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <textarea rows="4" cols="50" placeholder="Informações Adicionais"></textarea> 
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