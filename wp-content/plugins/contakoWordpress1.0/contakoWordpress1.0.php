<?php
/*
Plugin Name: Contako
Plugin URI: https://www.contako.com.br
Description: Plugin para instalar o Contako em sua página Wordpress
Version: 1.0
Author: Equipe Contako
*/
add_action('admin_menu', 'criaMenuContako');
add_action('get_footer', 'executaContako');

register_activation_hook( __FILE__, 'instalouContako' );
register_uninstall_hook ( __FILE__, 'desinstalouContako' );

/* Função principal do login */
function executaContako(){
	
	if (strlen(get_option('contako_cadastro')) > 0)
	{
		wp_register_script('contako', 'https://app.contako.com.br/WidgetJS' . ((get_option('contako_tipo') == 'F') ? 'Fixo' : 'Integrado') . '.sikoni/?cadastro=' . get_option('contako_cadastro'), '', '', true);
		wp_enqueue_script('contako');
	}	
}
/************************************************/

/* Funções para instalar e desinstalar o Plugin */
function instalouContako() {
  
  if ( version_compare( PHP_VERSION, '5.2.1', '<' )
    or version_compare( get_bloginfo( 'version' ), '3.3', '<' ) ) {
      deactivate_plugins( basename( __FILE__ ) );
  }

  add_option( 'contako_cadastro', '' );
  add_option( 'contako_tipo', 'F' );
}

function desinstalouContako(){	
	delete_option( 'contako_cadastro' );
	delete_option( 'contako_tipo' );
}
/************************************************/

/* Funções para gerenciar as opções */

function registraOpcoesContako() {
	register_setting( 'settings_contako', 'contako_tipo' );
	register_setting( 'settings_contako', 'contako_cadastro' );
}

function criaMenuContako()
{
	add_menu_page('Contako', 'Contako', 'manage_options', 'opcoes_contako', 'criaTelaOpcoesContako', 'https://app.contako.com.br/Imagens/icones/20x20B.png');
	add_action( 'admin_init', 'registraOpcoesContako' );
}

function criaTelaOpcoesContako()
{
		
?>
    <div class="wrap">
	
<?php 
	if ($_REQUEST['settings-updated']) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"><p><strong>Configurações salvas.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dispensar este aviso.</span></button></div>';
    }
?>	
	
        <h1><img src="https://app.contako.com.br/Imagens/icones/128x128.png" style="max-height:36px;vertical-align:middle;"/> Configurações Contako </h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'settings_contako' ); ?>
			<?php do_settings_sections( 'settings_contako' ); ?>

            <p>
				<label for="txt_contako_cadastro">Código do Cadastro:</label><br />
                <input id="txt_contako_cadastro" type="text" name="contako_cadastro" size="45" value="<?php echo esc_attr(get_option('contako_cadastro')); ?>" />
            </p>
			<p>
				<label>Tipo de Instalação:</label><br/>
				<input type="radio" name="contako_tipo" value="I" <?php echo esc_attr((get_option('contako_tipo') == "I")?"checked":""); ?> > Integrada <br/>
				<input type="radio" name="contako_tipo" value="F" <?php echo esc_attr((get_option('contako_tipo') == "F")?"checked":""); ?> > Fixa
			</p>
			
			
			
            <p>
				<?php submit_button(); ?>
			</p>
        </form>
		
    </div>
<?php
}

/************************************************/
?>