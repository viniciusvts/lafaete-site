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
                    <h5>Envie o seu currículo para participar dos processos de seleção de profissionais da Lafaete Locação de Equipamentos.</h5>
                    <?php echo do_shortcode('[contact-form-7 id="183" title="Trabalhe conosco"]'); ?>
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