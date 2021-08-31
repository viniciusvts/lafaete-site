<?php
/**
 * Adiciona os scripts e folha de estilos ao site
 *
 * @package DNA
 * @subpackage loadSources
 * @author Vinicius de Santana
 */
function add_css_and_js() {
  //remove jquery padrão do wp
  wp_deregister_script( 'jquery' );
  // renmove os dashicons
  if (!current_user_can( 'update_core' )){
    wp_deregister_style('dashicons');
  }
  //scripts: wp_enqueue_script( $nome, $origem, $dependencia, $versao, $rodape );
  $jsInternalPath = get_template_directory() . "/"."js/";
  $jsUriPath = get_template_directory_uri() . "/"."js/";

  $archive = 'jquery.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, false);
  
  $archive = 'popper.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);

  $archive = 'bootstrap.min.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('popper.min.js'), $fileVersion, true);

  $archive = 'lity.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('jquery.min.js'), $fileVersion, true);
  
  $archive = 'main.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('bootstrap.min.js'), $fileVersion, true);

  $archive = 'slider.js';
  $urlPath = $jsUriPath . $archive;
  $internalPath = $jsInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_script( $archive, $urlPath, array ('main.js'), $fileVersion, true);
  
  /*if(is_page('simulacao')) {//caso a página seja simulador
    $archive = 'simulator.js';
    $urlPath = $jsUriPath . $archive;
    $internalPath = $jsInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
  } */

  //###############################################################################################
  //styles: wp_enqueue_style( $nome, $origem, $dependencia, $versao, $media );
  $media = 'all';
  $cssInternalPath = get_template_directory() . "/"."css/";
  $cssUriPath = get_template_directory_uri() . "/"."css/";

  $archive = 'bootstrap.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );

  $archive = 'style.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array('bootstrap.css'), $fileVersion, $media );

  // $archive = 'fontAwe';
  // $urlPath = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
  // // no have => $internalPath = $cssInternalPath . $archive;
  // $fileVersion = 1;// no have => filemtime($internalPath);
  // wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
  
  $archive = 'firaSans';
  $urlPath = "https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;600;800&display=swap";
  // no have => $internalPath = $cssInternalPath . $archive;
  $fileVersion = 1;// no have => filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );

  $archive = 'lity.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array('style.css'), $fileVersion, $media );

  $archive = 'update.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array('style.css'), $fileVersion, $media );

  $archive = 'custom.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array('style.css'), $fileVersion, $media );
  
}
//do it
add_action( 'wp_enqueue_scripts', 'add_css_and_js' );

//examples
/*
if(is_page('contato')) {
  wp_enqueue_script('form-contato', get_template_directory_uri() . '/js/formulario.js', array(), '1.2', true);
}
*/