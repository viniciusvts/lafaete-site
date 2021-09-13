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
//define variavel para o SEO title do produto no rank math
function SeoTitleProdutos() {
  $tipoProduto = isset( $_GET['tipo-produto'] ) ? $_GET['tipo-produto'] : null;
  $local = isset( $_GET['local'] ) ? $_GET['local'] : null;
  $queriedObject = get_queried_object();
  $seoTitle = "";
  if($queriedObject->term_id == 52 || $queriedObject->term_id == 83){
    //nothing
  }else{
    $seoTitle = "Locação de ";
  }
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
function SeoTitleProdutosExample(){
  global $post;
  return 'Locação de '. $post->post_title .' em Minas Gerais - Lafaete';
}
/**
 * Action: 'rank_math/vars/register_extra_replacements' - Allows adding extra variables.
 */
add_action( 'rank_math/vars/register_extra_replacements', function(){
  rank_math_register_var_replacement(
    'produtoSeoTitle',
    [
      'name'        => esc_html__( 'Custom variable name.', 'product seo title' ),
      'description' => esc_html__( 'Custom variable description.', 'Variável para setar o Seo title do produto correto' ),
      'variable'    => 'produtoSeoTitle',
      'example'     => SeoTitleProdutosExample(),
    ],
    'SeoTitleProdutos'
  );
});

//define variavel para o SEO title do rank math
function SeoTitleVendas() {
  $seoTitle = "Venda de ";
  $seoTitle .= get_the_title();
  $seoTitle .= " seminovo - Lafaete Locação";
  return $seoTitle;
}
/**
 * Action: 'rank_math/vars/register_extra_replacements' - Allows adding extra variables.
 */
add_action( 'rank_math/vars/register_extra_replacements', function(){
  rank_math_register_var_replacement(
    'vendaSeoTitle',
    [
      'name'        => esc_html__( 'Custom variable name.', 'venda seo title' ),
      'description' => esc_html__( 'Custom variable description.', 'Variável para setar o Seo title do produto em venda correto' ),
      'variable'    => 'vendaSeoTitle',
      'example'     => 'Venda de Caminhão seminovo - Lafaete Locação',
    ],
    'SeoTitleVendas'
  );
});

// // define the action for register yoast_variable replacments
// function register_custom_yoast_variables() {
//   wpseo_register_var_replacement( '%%produtoSeoTitle%%', 'mySeoTitle', 'advanced', 'Variável para setar o Seo title correto' );
// }
// // Add action
// add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables');
// //fim define variavel para o SEO title

/**
 * remove a tag canonica gerada pelo rank math
 * o objetivo é fazer o google ler os parametros e indexar as páginas geolocalizadas
 * só é removida das páginas single do post type produtos
 * @param string $canonical The canonical URL.
 */
add_filter( 'rank_math/frontend/canonical', function( $canonical ) {
  //target a page using its page id
  /**
   * se é a página single do post type produto retorna vazio
   * se não é a página single do post type produto retorna normalmente
   */
  if(is_singular('produto')){
    return false;
  }
  return $canonical;
});