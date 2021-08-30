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

<body class="tax-prod">
  <?php include_once('menu.php'); ?>

  <!-- SLIDER -->
  <div id="carouselExampleIndicators" class="carousel slide flatheaderdiv" data-ride="carousel">
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
          <div class="col-md-5 d-flex align-items-center">
            <p> Home <span>»</span> Produtos <span>»</span> <?php the_title(); ?> </p>
          </div>

          <div class="col-md-7">
            <div class="row">
              <div class="col-md-8 formulario d-flex align-items-center">
                <?php $search = isset( $_GET['searchkey'] )? $_GET['searchkey'] : ""; ?>
                <form ROLE="search" action="<?php bloginfo( 'wpurl' ); ?>/produtos" method="get">
                  <div>
                    <label class="screen-reader-text" for="s">Pesquisar por:</label>
                    <input type="text" value="<?php echo($search); ?>" name="searchkey" id="searchkey">
                    <input type="submit" id="searchsubmit" value="Pesquisar">
                  </div>
                </form>  
              </div>
              <div class="col-md-4 d-flex align-items-center">
                <div class="blog-categorias">
                  <a id="nolink" href="#" class="togglecats">
                    <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                  </a> 
                  <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> 
                    <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"></path> <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"></path> 
                    <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"></path> 
                  </svg>
                </div> 
                <?php include('inc/submenu.php'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once('inc/produtos-orcamento-agora.php');
  if (get_field('galeria')) :
  ?>
    <div class="container">
      <div class="cabecalho">
        <h2>Galeria</h2>
        <span></span>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php
        $video = get_field('embed_youtube');
        if($video){
        ?>
          <div class="col-md-4 imagem">
          <?php
            echo($video);
          ?>
          </div>
        <?php
        }
        $images = get_field('galeria');
        // $size = 'large'; // (thumbnail, medium, large, full or custom size)
        if ($images) :
          foreach ($images as $image) :
        ?>
          <div class="col-md-4 imagem">
            <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
          </div>
        <?php
          endforeach;
        endif;
        ?>
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
            <ul class="tabs row">
              <?php
              $first = true;
              foreach ($modelos as $modelo) {
              ?>
                <li class="tab col">
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
            <div id="<?php echo ($modelo['nome']); ?>" 
            class="col-sm-12 row modeloProdutos <?php
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
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/pin.png"
                        alt="tem pintura">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/pin-off.png"
                        alt="não tem pintura">
                      <?php
                      }
                      if ($modelo['revestimento_interno']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revint.png"
                        alt="tem revestimento interno">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revint-off.png"
                        alt="não tem revestimento interno">
                      <?php
                      }
                      if ($modelo['revestimento_de_piso']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revpis.png"
                        alt="tem revestimento piso">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/revpis-off.png"
                        alt="não tem revestimento piso">
                      <?php
                      }
                      if ($modelo['pontos_para_lampada']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/lamp.png"
                        alt="tem pontos lâmpada">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/lamp-off.png"
                        alt="não tem pontos lâmpada">
                      <?php
                      }
                      if ($modelo['pontos_de_tomada']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptom.png"
                        alt="tem pontos tomada">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptom-off.png"
                        alt="não tem pontos tomada">
                      <?php
                      }
                      if ($modelo['pontos_de_logica']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/plog.png"
                        alt="tem pontos lógica">
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/plog-off.png"
                        alt="não tem pontos lógica">
                      <?php
                      }
                      if ($modelo['pontos_de_telefonia']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptel.png"
                        alt="tem pontos de telefonia"
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/ptel-off.png"
                        alt="não tem pontos de telefonia"
                      <?php
                      }
                      if ($modelo['sanitarios']) {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/san.png"
                        alt="tem sanitário"
                      <?php
                      } else {
                      ?>
                        <img class="item-modelo" src="<?php bloginfo('template_url') ?>/inc/img/icos/san-off.png"
                        alt="não tem sanitário"
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