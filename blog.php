<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>    
    <?php //include_once('inc/slider-home.php'); ?>
    <?php //include_once('floater.php'); ?>

    <!-- SLIDER -->
    <?php include_once("inc/slider-blog.php"); ?>
    <!-- SLIDER -->

    <div class="container blog">
        <div class="row">
            <?php for($c=0; $c<6; $c++){ ?>
            <div class="col-md-4">
                <a href="single-blog.php">
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