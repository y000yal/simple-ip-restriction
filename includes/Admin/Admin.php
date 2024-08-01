<?php
/**
 * Admin.php
 *
 * Admin.php
 *
 * @class    Admin.php
 * @package  SIPR
 * @author   Yoyal Limbu
 */

namespace SIPR\Admin;

use SIPR\Admin\Settings\SiprSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Admin {

	private static int $rate_limit = 60; // Limit to 60 requests
	private static int $default_time_window = 60; // Default time window in seconds (1 minute)

	/**
	 * @var object|null
	 */
	protected static ?object $instance = null;

	/**
	 * Ajax.
	 *
	 * @since 1.0.0
	 *
	 * @var use SIPR\AJAX;
	 */
	public $ajax = null;

	/**
	 * Return an instance of this class.
	 *
	 * @return Admin|null A single instance of this class.
	 */
	public static function get_instance(): Admin|null {
		// If the single instance hasn't been set, set it now.
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		add_action( 'admin_menu', [ $this, 'add_sipr_menu' ] );
		add_action( 'init', [ $this, 'include_classes' ] );

	}

	public static function add_sipr_menu(): void {
		add_menu_page(
			'Simple IP Restriction',
			'Simple IP Restriction',
			'manage_options',
			'simple-ip-restriction',
			[ __CLASS__, 'render_dashboard' ],
			'dashicons-shield-alt',
			60
		);

	}

	public function include_classes(  ): void {
		new SiprSettings();
	}
	public static function render_dashboard(): void {
		 echo '<p>Hi</p>';
	}


}