<?php
/**
 * The BuddyPress Module
 *
 * @since      1.0.32
 * @package    RankMath
 * @subpackage RankMath\BuddyPress
 * @author     Rank Math <support@rankmath.com>
 */

namespace RankMath\BuddyPress;

use RankMath\Helper;
use RankMath\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class
 */
class Admin {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->filter( 'rank_math/settings/title', 'add_title_settings' );
	}

	/**
	 * Add module settings into titles optional panel.
	 *
	 * @param array $tabs Array of option panel tabs.
	 *
	 * @return array
	 */
	public function add_title_settings( $tabs ) {

		$tabs['buddypress'] = [
			'title' => esc_html__( 'BuddyPress:', 'rank-math' ),
			'type'  => 'seprator',
		];

		$tabs['buddypress-groups'] = [
			'icon'  => 'dashicons dashicons-groups',
			'title' => esc_html__( 'Groups', 'rank-math' ),
			'desc'  => esc_html__( 'This tab contains SEO options for BuddyPress Group pages.', 'rank-math' ),
			'file'  => dirname( __FILE__ ) . '/views/options-titles.php',
		];

		return $tabs;
	}
}
