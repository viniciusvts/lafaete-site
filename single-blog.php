<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>    
    <?php //include_once('inc/slider-home.php'); ?>
    <?php //include_once('floater.php'); ?>

    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="inc/img/estrutura-metalica.jpg" alt="First slide" style="filter: brightness(100%); -webkit-filter brightness(100%);">
        </div>
        <div class="carousel-item">
          <div class="carousel-caption d-none d-md-block">
          </div>
          <img class="d-block w-100" src="inc/img/estrutura-metalica.jpg" alt="First slide" style="filter: brightness(100%); -webkit-filter brightness(100%);">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="inc/img/estrutura-metalica.jpg" alt="First slide" style="filter: brightness(100%); -webkit-filter brightness(100%);">
        </div>

        <div class="blog-floater">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"/>
                        </svg>
                        <p> Home » Produtos </p>
                    </div>
                    <div class="col-4 formulario">
                        <input type="text" value="" name="s" id="s" placeholder="Digite seu email">
                        <input class="btn" type="submit" id="searchsubmit" value="Assinar">    
                    </div>
                    <div class="col-4">
                        <div class="blog-categorias">
                            <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">                        
                                <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"/>
                                <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"/>
                                <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"/>                    
                            </svg>
                        <p>Ver Categorias</p>  
                        </div> 
                    </div>
                </div>  
            </div>    
        </div>
        
    </div>
    <!-- SLIDER -->

    <div class="container blog">
        <div class="texto">
            <?php for($c=0; $c<7; $c++){ ?>
                <p>Lorem ipsum dolor sit amet, in prompta suavitate vel, in eum impedit euripidis torquatos, probo paulo quando vel id. Civibus facilisis nam no, graeci fuisset appetere ius ei. Ut quo nibh corpora. Cu graece voluptatibus eos, eu iudico ocurreret concludaturque duo, sint volumus temporibus cu nec. Ne mea eius vivendum, in ullum putent est. Has in vocibus periculis, eum in ferri semper delicatissimi. Lorem iisque verterem per ut.
                Sea cu affert persequeris, sit ut saepe liberavisse. Munere persius eripuit usu an. Possit nostrum principes no qui, modus vidisse aliquando ius in. Cibo ullamcorper ea sed, id virtute lobortis praesent quo.</p>
            <?php }?>
        </div>
    </div>      
    
    <div class="container blog">
        <div class="cabecalho">
            <h2><b>Posts</b> Relacionados</h2>
        </div>
        <div class="row">
            <?php for($c=0; $c<3; $c++){ ?>
            <div class="col-4">
                <a href="">
                    <div class="card">
                        <img class="card-img-top" src="inc/img/locacao-de-cacambas-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Lorem Ipsum Dolor Sit amet, iudicabit deseruisse id sit.</h5>
                            <h6>Categoria</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.[...]</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ;?>
        </div>
    </div>     

    <?php include_once("nossos-premios.php"); ?>
   
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>