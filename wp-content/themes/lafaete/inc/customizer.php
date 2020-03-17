<?php
/**
 * Adiciona  opções de personalização para o usuário no menu Aparencia >> personalização
 *
 * @package DNA
 * @subpackage Lafaete tema
 * @author Vinicius de Santana
 */
add_action('customize_register','dnaTheme_register_panelsAndSections');
function dnaTheme_register_panelsAndSections( $wp_customize ) {
  // start panel
  $dnaTheme_panel = array(
    'priority'       => 10,
     'capability'     => 'edit_theme_options',
     'theme_supports' => '',
     'title'          => 'Tema DNA',
     'description'    => 'Several settings pertaining my theme',
  );
  $wp_customize->add_panel( 'dnaTheme_panel', $dnaTheme_panel);
  // end panel
  // start sections
  $dnaTheme_section_headerAndFooter = array(
    'title' => 'Header and Footer', 
    'priority'          => 10,
    'panel'  => 'dnaTheme_panel',
  );
  $wp_customize->add_section('dnaTheme_section_headerAndFooter', $dnaTheme_section_headerAndFooter);

  $dnaTheme_section_searchPageOptions = array(
    'title' => 'Search page', 
    'priority'          => 70,
    'panel'  => 'dnaTheme_panel',
  );
  $wp_customize->add_section('dnaTheme_section_searchPageOptions', $dnaTheme_section_searchPageOptions);  
  // end sections
}
// start settings and controls
add_action('customize_register','dnaTheme_HeaderAndFooter');
function dnaTheme_HeaderAndFooter( $wp_customize ) {
  //Opção de personalizar a logo do menu
  $dnaTheme_setting_logo = array( 
    'default' => get_bloginfo('template_url') . "/inc/img/logodefault.png",
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control_logo = array(
    'label' => 'Logo a ser exibido',
    'section' => 'dnaTheme_section_headerAndFooter',
    'settings' => 'dnaTheme_setting_logo',
  );
  $wp_customize->add_setting('dnaTheme_setting_logo', $dnaTheme_setting_logo);
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dnaTheme_setting_logo', $dnaTheme_control_logo) );
  //FIM opção de personalizar a logo
}

add_action('customize_register','dnaTheme_customize_searchHeader');
function dnaTheme_customize_searchHeader( $wp_customize ) {
  //Opção de personalizar a logo do menu
  $dnaTheme_setting = array( 
    'default' => get_bloginfo('template_url') . "/inc/img/slider-construcao.jpg",
    'transport' => 'refresh', // or postMessage
  );
  $dnaTheme_control = array(
    'label' => 'Imagem a ser exibida',
    'section' => 'dnaTheme_section_searchPageOptions',
    'settings' => 'dnaTheme_setting_searchHeader',
  );
  $wp_customize->add_setting('dnaTheme_setting_searchHeader', $dnaTheme_setting);  
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dnaTheme_setting_searchHeader', $dnaTheme_control) );
  //FIM opção de personalizar a logo
}
