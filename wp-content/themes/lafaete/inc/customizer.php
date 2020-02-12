<?php
/**
 * Adiciona  opções de personalização para o usuário no menu Aparencia >> personalização
 *
 * @package DNA
 * @subpackage Lafaete tema
 * @author Vinicius de Santana
 */
add_action('customize_register','dnaTheme_customize_register');
function dnaTheme_customize_register( $wp_customize ) {
  //Opção de personalizar a logo do menu
  $dnaTheme_logo_setting = array( 
    'default' => get_bloginfo('template_url') . "/inc/img/logodefault.png",
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_logo_control = array(
    'label' => 'Logo a ser exibido',
    'section' => 'dnaOptionsSection_menu',
    'settings' => 'dnaTheme_logo',
  );
  $dnaTheme_section = array(
    'title' => 'Tema DNA', 
    'priority'          => 70,
  );
  $wp_customize->add_setting('dnaTheme_logo', $dnaTheme_logo_setting);
  $wp_customize->add_section('dnaOptionsSection_menu', $dnaTheme_section);  
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dnaTheme_logo', $dnaTheme_logo_control) );
  //FIM opção de personalizar a logo
}