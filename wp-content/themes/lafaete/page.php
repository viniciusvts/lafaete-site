<!doctype html>
<html lang="pt-br">
  <?php include_once('head.php'); ?>

  <body>
    <?php 
    include_once('menu.php');
    include_once('flat-header.php');
    ?>
    <h2 class="text-center mt-5 mb-5"><?php
            the_content();
    ?></h2>
    <?php
    include_once('newsletter.php');
    include_once('footer.php');
    ?>
  </body>
</html>