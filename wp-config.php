<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

/* Não Alterar o código abaixo */
$dbhost = ''; /* Deixar em branco para utilizar o padrão (automático) */
$dbuser = ''; /* Deixar em branco para utilizar o padrão (automático) */
$dbpassword = ''; /* Deixar em branco para utilizar o padrão (automático) */

$server_addr = $_SERVER['SERVER_ADDR'];
switch ($server_addr) {
    case '::1':
    case '127.0.0.1':
        $dbhost_default = 'localhost';
        $dbname = 'lafaete_bd';
        $dbuser_default = 'root';
        $dbpassword_default = 'root';
        define('DEV_MODE', true);
        define('WP_DEBUG', true);
        define('WP_DEBUG_DISPLAY', true );
        define('WP_HOME','http://localhost/lafaete/');
        define('WP_SITEURL','http://localhost/lafaete/');
	break;

    case '172.31.29.159':
        $dbhost_default = 'pro-ciapipe.c6kc9wk9fak1.us-west-2.rds.amazonaws.com';
        $dbname = 'lafaete_bd';
        $dbuser_default = 'root';
        $dbpassword_default = 'fZBy8NhelGwQNS';
        define('DEV_MODE', false);
        define('WP_HOME','https://dnaformarketing.com.br/lafaete/');
        define('WP_SITEURL','https://dnaformarketing.com.br/lafaete/');
	break;

    default:
        $dbhost_default = 'localhost';
        $dbname = 'lafaetel_site_bd';
        $dbuser_default = 'lafaetel_user';
        $dbpassword_default = 'DNA#Site$Lafa';
        define('DEV_MODE', false);
        define('WP_HOME','https://www.lafaetelocacao.com.br/novo');
        define('WP_SITEURL','https://www.lafaetelocacao.com.br/novo');
	break;
}

define('WP_MEMORY_LIMIT', '256M');
// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', $dbname );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', $dbuser_default );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', $dbpassword_default );

/** Nome do host do MySQL */
define( 'DB_HOST', $dbhost_default );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@m2>7K&0Dv5*a+tc1ZBruAM{F.wU.OpNg9noO2/kX.)D.42mM1Z9DBU8*|,[Z{Si' );
define( 'SECURE_AUTH_KEY',  '}fdY-vSi}h0P]lKn8+h5b+0Y0&^Dv9+fT0(mP]{Js]1|%,(vU?y||LankUJ#>-S(' );
define( 'LOGGED_IN_KEY',    'GU/}2Bg/<X(3xW@ )-%<I_Y,pSj7893jAhM/OHKPcTznOfQ7Llb<I#|@|n$oTL8f' );
define( 'NONCE_KEY',        '?>N(Rx(3k`Vlg:PqBUc.sid}fP,:B$,5TcT+aIaZY7wWEPC^WPv*m!x[bnK[@<%s' );
define( 'AUTH_SALT',        'sYDC)X--? rPEW[^D%u7E#X$$tSDNf+0w h0`4Qj4-!/3^ *Avc99h<x0h@9*x_Z' );
define( 'SECURE_AUTH_SALT', 't3>u7>{gt3e19M{b6+3w#_?erm(H}Am^GZ8a0f^3 rXMmg^I9pFY6gVU7x8OP[c^' );
define( 'LOGGED_IN_SALT',   'B*bY0I6BINF}K[}:mygjXSxO%t Oa?+@~>0fUn}ctlFt8*:^0r6wyZPVQl~D2_)[' );
define( 'NONCE_SALT',       '69w7ej@-7DKZ[2CQS=Ia6gR!n,l,W~W1es)T_.^gm5$DCS6GOzX_3)x< f5iFSvD' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
