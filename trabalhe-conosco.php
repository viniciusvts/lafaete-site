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
            <h1>Trabalhe Conosco</h1>
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
                    <h5>Envie o seu currículo para participar dos processos de seleção de profissionais da Lafaete Locação de Equipamentos.</h5>
                    <form>
                        <div class="fale-conosco-left">
                            <div class="row">
                                <div class="col-md-8">
                                    <input placeholder="Nome*" type="text">
                                </div>

                                <div class="col-md-4 div-select">
                                    <select>
                                        <option value="">Atendimento</option>
                                        <option value="saab">Vendas</option>
                                        <option value="saab">Comercial</option>                                    
                                        <option value="audi">Administrativo</option>
                                        <option value="mercedes">Engenharia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input placeholder="Telefone" type="email">
                                </div>
                                <div class="col-md-3">
                                    <input placeholder="Email*" type="text">
                                </div>
                                <div class="col-md-3">
                                    <input placeholder="Linkedin*" type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
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