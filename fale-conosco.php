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
            <h1>Fale Conosco</h1>
          </div>
          <img class="d-block w-100" src="inc/img/slider-construcao.jpg" alt="First slide">
        </div>
      </div>
      <div class="container floater-destaque">
    </div>
    </div>

    <div class="fale-conosco">
        <form>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="fale-conosco-left">
                            <div class="row">
                                <div class="col-md-8">
                                    <input placeholder="Nome*" type="text">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Telefone*" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input placeholder="Empresa*" type="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <input placeholder="Email*" type="text">
                                </div>
                                <div class="col-md-4 div-select">
                                    <select>
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea rows="5" cols="50" placeholder="Mensagem"></textarea> 
                                </div>
                            </div>
                            <button class="btn botao-laranja">Enviar</button>
                    
                        </div>                        
                    
                    </div>
                    <div class="col-4">
                        <div class="fale-conosco-right">
                            <p>Caso queira informações sobre valores de venda ou locação de equipamentos, solicite um orçamento ou entre em contato pelos telefones</p>
                            <h4>Central de Atendimento Lafaete(CAL)</h4>
                            <h3 class="telefone">4007-2448</h3>
                            <span>(Atendimento Nacional)</span>

                            <h4>Caçambas</h4>
                            <h3 class="telefone">(31) 3373-1360</h3>
                            <span>(Belo Horizonte)</span>

                            <h3 class="telefone">(31) 98469-2807</h3>
                            <span>
                                Atendimento exclusivo para caçambas - WhatsApp apenas para Belo Horizonte
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>

    <?php include_once("nossos-premios.php"); ?>
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>