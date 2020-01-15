<?php
/********* DO NOT COPY THE PARTS ABOVE THIS LINE *********/
/* Remove Yoast SEO Add custom title or meta template variables
 * Credit: Moshe Harush
 * https://stackoverflow.com/questions/36281915/yoast-seo-how-to-create-custom-variables
 * Last Tested: Nov 29 2018 using Yoast SEO 9.2.1 on WordPress 4.9.8
 *******
 * NOTE: The snippet preview in the backend will show the custom variable '%%myname%%'.
 * However, the source code of your site will show the output of the variable 'My name is Moses'.
 * Modified by Vinicius de Santana
 */
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