<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php include_once('menu.php'); ?>

    <?php include_once('flat-header.php'); ?>

    <div class="fale-conosco">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <?php echo do_shortcode('[contact-form-7 id="177" html_id="AberturaDeChamado" title="Abertura de chamado"]'); ?>
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