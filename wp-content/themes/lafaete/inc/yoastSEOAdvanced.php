<?php
  //define variavel para o SEO title do yoast
  function mySeoTitle() {
    $tipoProduto = isset( $_GET['tipo-produto'] ) ? $_GET['tipo-produto'] : null;
    $local = isset( $_GET['local'] ) ? $_GET['local'] : null;
    $seoTitle = "Locação de ";
    if( $tipoProduto ){
      $seoTitle .= $tipoProduto;
      if( isset($local) ){
        $seoTitle .= " em ";
        $seoTitle .= $local;
        $seoTitle .= ", ";
      }
    }
      $seoTitle .= get_the_title();
      $seoTitle .= " - Lafaete Locação";
      return $seoTitle;
  }
  // define the action for register yoast_variable replacments
  function register_custom_yoast_variables() {
    wpseo_register_var_replacement( '%%produtoSeoTitle%%', 'mySeoTitle', 'advanced', 'Variável para setar o Seo title correto' );
  }
  // Add action
  add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables');
  //fim define variavel para o SEO title