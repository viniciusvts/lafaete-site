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

  $archive = 'animate.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array('style.css'), $fileVersion, $media );
  
  $archive = 'fontOsvald';
  $urlPath = "https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700";
  // no have => $internalPath = $cssInternalPath . $archive;
  $fileVersion = 1;// no have => filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array("bootstrap.css", "style.css"), $fileVersion, $media );

  $archive = 'fontMontserrat';
  $urlPath = "https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700,900";
  // no have => $internalPath = $cssInternalPath . $archive;
  $fileVersion = 1;// no have => filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array("bootstrap.css", "style.css"), $fileVersion, $media );
}
//do it
add_action( 'wp_enqueue_scripts', 'add_css_and_js' );

//examples
/*
if(is_page('contato')) {
  wp_enqueue_script('form-contato', get_template_directory_uri() . '/js/formulario.js', array(), '1.2', true);
}
*/