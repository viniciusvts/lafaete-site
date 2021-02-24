<?php
/**
 * Parte do tema desenvolvido pela agencia de marketing DNA de vendas
 * 
 * Author URI: https://www.dnadevendas.com.br
 * @package DNA de Vendas
 * @subpackage Lafaete Locação de container e módulos habitacionais
 * @since 1.0.0
 */
// Exit if accessed directly.
if( !defined('ABSPATH') ) exit; 
?>
<div id="produtos">
  <div class="container produto-floater">
    <div class="row">
      <div class="col-xl-8 texto">
        <div class="text-center text-md-left">
          <?php
          $queriedObject = get_queried_object(); 
          switch ($queriedObject->post_type) {
            case 'venda':
              ?>
              <p><?php the_field('descricao'); ?></p>
              <h3><?php the_title(); ?></h3>
              <div class="row">
                <div class="col-6 col-md-4 left-b">
                  <?php if(get_field('modelo')): ?>
                    <p class="bold-text">Modelo: <span><?php the_field('modelo'); ?></span></p>
                    <?php 
                    endif;
                    if(get_field('ano')):
                    ?>
                    <p class="bold-text">Ano: <span><?php the_field('ano'); ?></span></p>
                  <?php endif ?>
                </div>
                <div class="col-6 col-md-4 mid-b">
                  <?php if(get_field('serie')): ?>
                    <p class="bold-text">Série: <span><?php the_field('serie'); ?></span></p>
                    <?php
                    endif;
                    if(get_field('unidade')):
                    ?>
                    <p class="bold-text">Unidade: <span><?php the_field('unidade'); ?></span></p>
                  <?php endif ?>
                </div>
                <div class="col col-md-4">
                  <?php if(get_field('horimetro')): ?>
                    <p class="bold-text">Horímetro: <span><?php the_field('horimetro'); ?></span></p>
                    <?php
                    endif;
                    if(get_field('preco')):
                    ?>
                    <p class="bold-text">Valor de venda: <span><?php the_field('preco'); ?></span></p>
                  <?php endif; ?>
                </div>
              </div>
              <?php
              break;
              case 'produto':
              case 'projetos-especiais':
              echo "<h3>Informações Gerais:</h3>";
              the_post();
              the_content();
              break;
            case 'page':
              the_content();
              break;
            default:
              //echo "<p>";
              echo $queriedObject->description;
              //echo "</p>";
              break;
          }
          ?>

          <br>
          <button class="btn">
            <a href="#faca-um-orcamento">Faça um orçamento agora</a>
          </button>
        </div>

        <?php $imgs = get_template_directory_uri()."/inc/img/update/"; ?>

        
      </div>
  
    </div>
    
  </div>


  <div class="condicoes">
    <div class="container">
          <div class="row">
            <div class="col-lg-3 d-flex align-items-center"><h5>Condições de pagamento:</h5></div>
            <div class="col-lg-9 d-flex align-items-center">
              <div>
            <?php
        // #11175 - Exibir bandeira BNDS em certas páginas
        // em outras só exibir a do pagseguro
        $showBNDS = false;
        // página da taxonomia
        if($queriedObject->slug == 'modulos-habitacionais' || $queriedObject->slug == 'estruturas-metalicas'){
          $showBNDS = true;
        }
        // página de produto
        $taxs = get_the_terms($queriedObject->ID, 'produtos');
        foreach ($taxs as $tax) {
          if($tax->slug == 'modulos-habitacionais' || $tax->slug == 'estruturas-metalicas'){
            $showBNDS = true;
          }
        }
        ?>

      <?php if($showBNDS): ?> <img src="<?php echo $imgs; ?>logo-bndes.png" alt=""> <?php endif; ?>

              <img src="<?php echo $imgs; ?>payment-1.png" alt="">

              <img src="<?php echo $imgs; ?>payment-2.png" alt="">
            </div>
          </div>
          </div>
      </div>
      </div>
</div>