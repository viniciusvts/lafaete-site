<!doctype html>
<html lang="pt-br">
<?php
include_once('head.php');
$tipoProduto = isset($_GET['tipo-produto']) ? $_GET['tipo-produto'] : null;
$local = isset($_GET['local']) ? $_GET['local'] : null;

// Para cliente que quer que especificamente essas duas categorias não tenham "Locação de'
//estruturas metalicas 52 || sombredores 83
$queriedObject = get_queried_object();
$catgrs = wp_get_post_terms($queriedObject->ID, 'produtos');
$flagThePostIsMetalicaOuSombreador = false;
foreach ($catgrs as $catgr) {
  if($catgr->term_id == 52 || $catgr->term_id == 83){
    $flagThePostIsMetalicaOuSombreador = true;
  }
}
?>

<body>
  <?php include_once('menu.php'); ?>

  <!-- SLIDER -->
  <div id="carouselExampleIndicators" class="carousel slide carousel-flat-height" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="carousel-caption">
          <h1>
            <p><?php
                if($flagThePostIsMetalicaOuSombreador){
                  //notthing
                }else{
                  echo ("Locação de ");
                }
                if (isset($tipoProduto)) {
                  echo ($tipoProduto);
                  if (isset($local)) {
                    echo (" em ");
                    echo ($local);
                  }
                }
                ?></p>
            <?php the_title(); ?>
          </h1>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'd-block img-fluid')); ?>
      </div>
    </div>

    <div class="blog-floater">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-icon="home" data-prefix="fas" role="img" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
              <path d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z" />
            </svg>
            <?php wp_custom_breadcrumbs() ?>
          </div>
          <div class="col-md-4 formulario">
            <?php $search = isset($_GET['searchkey']) ? $_GET['searchkey'] : ''; ?>
            <form ROLE="search" action="<?php bloginfo('wpurl'); ?>/produtos" method="get">
              <div>
                <label class="screen-reader-text" for="s">Pesquisar por:</label>
                <input type="text" value="<?php echo ($search); ?>" name="searchkey" id="searchkey">
                <input type="submit" id="searchsubmit" value="Pesquisar">
              </div>
            </form>
          </div>
          <div class="col-md-4">
            <div class="blog-categorias">
              <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z" />
                <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z" />
                <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z" />
              </svg>
              <a id="nolink" href="#">
                <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p>
              </a>
            </div>

            <?php include('inc/submenu.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (get_field('galeria')) :
  ?>
    <div class="container">
      <div class="cabecalho">
        <h2>Galeria de Fotos</h2>
        <span></span>
      </div>
    </div>

    <section id="galeria">
      <span class="fecharBotao">&times;</span>
      <div class="conteudo">
        <ul id="imagens">
          <?php
          $images = get_field('galeria');
          $countImages = count($images);
          if ($images) {
            foreach ($images as $key => $image) {
          ?>
              <li class="fade">
                <span class="numero"><?php echo ($key . "/" . $countImages); ?></span>
                <img src="<?php echo ($image['url']); ?>" alt="<?php echo ($image['alt']); ?>" class="imagem-responsiva">
              </li>
          <?php
            }
          }
          ?>
        </ul>
        <div id="botoes">
          <a href="" id="seguinte">&#10095;</a>
          <a href="" id="anterior">&#10094;</a>
        </div>
      </div>
      <div id="dots">
        <?php
        if ($images) {
          $first = true;
          foreach ($images as $image) {
        ?>
          <span class="<?php if ($first) { echo ("ativo");  $first = false;} ?> dot"> </span>
        <?php
          }
        }
        ?>
      </div>
    </section>

    <div class="container">
      <div class="row">
        <?php
        $images = get_field('galeria');
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        if ($images) :
          foreach ($images as $image) :
        ?>
            <div class="col-md-4 imagem">
              <?php echo wp_get_attachment_image($image['ID'], $size); ?>
            </div>
        <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>
  <?php
  endif;
  $modelos = get_field('modelos');
  if ($modelos) {
    $sizeOfModelos = count($modelos);
  ?>
    <div class="container-modelos">
      <div class="container">
        <div class="row" style="margin-bottom: 0; padding-bottom: 40px;">
          <!--header-->
          <div class="col-sm-12 center-align">
            <div class="cabecalho">
              <h2>Modelos</h2>
            </div>
            <ul class="tabs">
              <?php
              $first = true;
              foreach ($modelos as $modelo) {
              ?>
                <li class="tab">
                  <a href="#" objetivo="<?php
                                        echo ($modelo['nome']);
                                        ?>" class="<?php
                                                    if ($first) {
                                                      echo ("active");
                                                      $first = false;
                                                    }
                                                    ?>">
                    <?php echo ($modelo['nome']); ?>
                    <div></div>
                  </a>
                </li>
              <?php
              }
              ?>
              <li class="indicator" style="right: 568px; left: 486px;"></li>
            </ul>
          </div>
          <!--/header-->
          <?php
          $first = true;
          foreach ($modelos as $modelo) {
          ?>
            <div id="<?php echo ($modelo['nome']); ?>" class="col-sm-12 row modeloProdutos <?php
                                                                                            if ($first) {
                                                                                              echo ("active");
                                                                                              $first = false;
                                                                                            }
                                                                                            ?>">
              <div class="col-sm-12 col-md-6 content-container">
                <p>
                  <strong>Dimensões:</strong>
                  <br>
                  <?php
                  if ($modelo['comprimento']) {
                    echo ("<br> Comprimento: " . $modelo['comprimento']);
                  }
                  if ($modelo['largura']) {
                    echo ("<br> Largura: " . $modelo['largura']);
                  }
                  if ($modelo['altura']) {
                    echo ("<br> Altura: " . $modelo['altura']);
                  }
                  if ($modelo['pe_direito']) {
                    echo ("<br> Pé direito: " . $modelo['pe_direito']);
                  }
                  ?>
                </p>
                <ul class="collapsible" data-collapsible="accordion">
                  <li class="active">
                    <div class="collapsible-header active">Especificações</div>
                    <div class="collapsible-body" style="display: block;">
                      <?php
                      if ($modelo['pintura']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/pin.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/pin-off.png">
                      <?php
                      }
                      if ($modelo['revestimento_interno']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revint.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revint-off.png">
                      <?php
                      }
                      if ($modelo['revestimento_de_piso']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revpis.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revpis-off.png">
                      <?php
                      }
                      if ($modelo['pontos_para_lampada']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/lamp.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/lamp-off.png">
                      <?php
                      }
                      if ($modelo['pontos_de_tomada']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptom.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptom-off.png">
                      <?php
                      }
                      if ($modelo['pontos_de_logica']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/plog.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/plog-off.png">
                      <?php
                      }
                      if ($modelo['pontos_de_telefonia']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptel.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptel-off.png">
                      <?php
                      }
                      if ($modelo['sanitarios']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/san.png">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/san-off.png">
                      <?php
                      }
                      ?>
                      <p>
                        <?php
                        if ($modelo['pintura']) {
                          echo ("<br> Pintura: " . $modelo['pintura']);
                        }
                        if ($modelo['revestimento_interno']) {
                          echo ("<br> Revestimento interno: " . $modelo['revestimento_interno']);
                        }
                        if ($modelo['janela']) {
                          echo ("<br> Janela: " . $modelo['janela']);
                        }
                        if ($modelo['revestimento_de_piso']) {
                          echo ("<br> Revestimento de Piso: " . $modelo['revestimento_de_piso']);
                        }
                        if ($modelo['pontos_para_lampada']) {
                          echo ("<br> Pontos para lâmpada: " . $modelo['pontos_para_lampada']);
                        }
                        if ($modelo['pontos_de_tomada']) {
                          echo ("<br> Pontos de tomada: " . $modelo['pontos_de_tomada']);
                        }
                        if ($modelo['pontos_de_logica']) {
                          echo ("<br> Pontos de lógica: " . $modelo['pontos_de_logica']);
                        }
                        if ($modelo['pontos_de_telefonia']) {
                          echo ("<br> Pontos de telefonia: " . $modelo['pontos_de_telefonia']);
                        }
                        if ($modelo['sanitarios']) {
                          echo ("<br> Sanitários: " . $modelo['sanitarios']);
                        }
                        ?>
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-sm-12 col-md-6 center-align">
                <img src="<?php echo ($modelo['planta']['sizes']['medium_large']); ?>" alt="<?php echo ($modelo['planta']['alt']); ?>" style="width: 100%;margin-top: 50px;">
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  <?php
  }
  $terms = get_the_terms($post->ID, 'produtos', 'string');
  $term_ids = wp_list_pluck($terms, 'term_id');
  $args = array(
    'post_type' => 'produto',
    'tax_query' => array(
      array(
        'taxonomy' => 'produtos',
        'field'    => 'id',
        'terms'    => $term_ids,
      ),
      'post__not_in' => array($post->ID),
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
    ),
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) :
  ?>
    <?php include_once('inc/produtos-orcamento-agora.php'); ?>

    <div class="container">
      <div class="cabecalho">
        <h2>Veja outros produtos</h2>
        <span></span>
      </div>
      <div class="row">
        <?php
        while ($query->have_posts()) {
          $query->the_post();
          $hrefLink = get_the_permalink();
          include 'inc/card-produto.php';
        }
        wp_reset_postdata();
        ?>
      </div>
    </div>

  <?php
  endif;
  include_once('inc/form-orcamento.php');
  include_once('newsletter.php');
  include_once('footer.php');
  ?>
</body>

</html>