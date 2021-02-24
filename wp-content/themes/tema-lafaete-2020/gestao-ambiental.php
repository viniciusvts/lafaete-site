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
            <h1>Gestão Ambiental</h1>
          </div>
          <img class="d-block w-100" src="inc/img/gestao-ambiental.jpg" alt="First slide">
        </div>
      </div>
      <div class="container floater-destaque">
    </div>

    <div class="fale-conosco">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="fale-conosco-left">
                        <div class="bread">
                            <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
                            </svg>
                            <p>Home » Serviços » Gestão Empresarial </p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <p>A Lafaete possui uma ampla linha de produtos e serviços que visa realizar a gestão ambiental da sua empresa, incluindo tratamento de resíduos – desde a sua geração até a destinação final.
                                Além disso, por meio de consultorias ambientais, a Lafaete ainda elabora diagnósticos precisos, apontando soluções para diversos tipos de empreendimentos e contribuindo para redução dos impactos da construção no meio ambiente.
                                Faz parte do nosso portfólio complementar de serviços o fornecimento de outorgas, treinamentos e reciclagens, relatórios de monitoramento, além de palestras relacionadas ao ambiente da construção.
                              </p>
                            </div>
                            <div class="col-md-7">                            
                                <h4>Consultoria Ambiental</h4>
                                <p>
                                    – Acompanhamento de Condicionantes do Licenciamento;<br>
                                    – Elaboração de Documentos Ambientais;<br>
                                    – Laudos e Estudos Técnicos Ambientais;<br>
                                    – Outorgas;<br>
                                    – Licenciamento Ambiental;<br>
                                    – Projetos Especiais.
                                </p>

                                <h4>Gestão de resíduos sólidos</h4>

                                <p>
                                – Elaboração do Plano de Resíduos Sólidos;<br>
                                – Implantação do Gerenciamento dos Resíduos Sólidos;<br>
                                – Inventário de Resíduos;<br>
                                – Transporte e Destinação Final dos Resíduos Especiais, Perigosos e do Serviço de Saúde;<br>
                                – Locação de Equipamentos: caçambas estacionárias, compactadoras, além de caminhões<br>
                                poliguindastes, basculantes e roll on.
                                </p>
                                
                                <h4>Gestão de água e energia</h4>

                                <p>
                                – Elaboração de Projetos de Economia de Energia;<br>
                                – Projetos de Reuso e Economia de Água;<br>
                                – Treinamentos de Economia de Água e Energia;<br>
                                – Projetos de Estações de Tratamento de Efluentes Industriais, de Oficinas e de pequenos geradores (residências, clinicas e obras);<br>
                                – Elaboração do Precend da Copasa.</p>

                                <h4>Logística e transporte de resíduos</h4>

                                <p>A Lafaete Gestão Ambiental também oferece locação de equipamentos e possui frota própria, que auxiliam na gestão e transporte de resíduos de saúde, perigosos e não perigosos, como guindastes, caminhão munck, caminhão basculantes, mini carregadeira bobcat e caçambas de 1m³.</p>
                            </div>
                            <div class="col-md-5">
                              <img src="https://via.placeholder.com/800" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php include_once("inc/faca-um-orcamento.php"); ?>
                </div>
            </div>
        </div>
    </div>
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>