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
              <h2 id="single-title-box"><?php the_title(); ?></h2>
              <div class="row">
                <div class="col-6 col-md-4 left-b">
                  <?php if(get_field('modelo')): ?>
                    <p class="bold-text">Modelo</p>
                    <p><?php the_field('modelo'); ?></p>
                    <?php 
                    endif;
                    if(get_field('ano')):
                    ?>
                    <p class="bold-text">Ano</p>
                    <p><?php the_field('ano'); ?></p>
                  <?php endif ?>
                </div>
                <div class="col-6 col-md-4 mid-b">
                  <?php if(get_field('serie')): ?>
                    <p class="bold-text">Série</p>
                    <p><?php the_field('serie'); ?></p>
                    <?php
                    endif;
                    if(get_field('unidade')):
                    ?>
                    <p class="bold-text">Unidade</p>
                    <p><?php the_field('unidade'); ?></p>
                  <?php endif ?>
                </div>
                <div class="col col-md-4">
                  <?php if(get_field('horimetro')): ?>
                    <p class="bold-text">Horímetro</p>
                    <p><?php the_field('horimetro'); ?></p>
                    <?php
                    endif;
                    if(get_field('preco')):
                    ?>
                    <p class="bold-text">Valor de venda</p>
                    <p><?php the_field('preco'); ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <?php
              break;
              case 'produto':
              case 'projetos-especiais':
              echo "<h4>Informações Gerais:</h4>";
              the_post();
              the_content();
              break;
            case 'page':
              the_content();
              break;
            default:
              echo "<p>";
              echo $queriedObject->description;
              echo "</p>";
              break;
          }
          ?>
          <button class="btn">
            <a href="#faca-um-orcamento">Faça um orçamento agora</a>
          </button>
        </div>
      </div>
      <div class="col-xl-4 pagamento">
        <h4>Condições de Pagamento</h4>
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
        if($showBNDS) {
          echo "<img src='";
          bloginfo('template_url');
          echo "/inc/img/metodos-pagamento-horizontal.png'>";
        } else {
          echo "<img src='";
          bloginfo('template_url');
          echo "/inc/img/metodos-pagamento-horizontal-pagseguro.png'>";
        }
        ?>
      </div>
    </div>
  </div>
</div>