<?php
/**
 * SiprSettings
 *
 * @class    SiprSettings
 * @package  SIPR
 * @author   Yoyal Limbu
 */

namespace SIPR\Admin\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SiprSettings {

	public function __construct() {
		$this->init();
	}

	public function init(): void {
		add_action( 'admin_menu', [ $this, 'register_settings_menu' ], 70 );
		add_action( 'admin_init', [ $this, 'register_settings' ] );

	}

	public function register_settings_menu(): void {

		add_submenu_page(
			'simple-ip-restriction',
			'IP Restriction Settings',
			'Settings',
			'manage_options',
			'simple-ip-restriction-settings',
			[ __CLASS__, 'render_settings_page' ]
		);
	}

	public static function register_settings() {

		register_setting( 'simple_ip_restriction_settings', 'simple_ip_restriction_time_window' );
		add_settings_section(
			'simple_ip_restriction_main_section',
			'Main Settings',
			null,
			'simple-ip-restriction-settings'
		);

	}

	public static function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
        <div class="wrap">
            <h1>Simple IP Restriction Settings</h1>

        </div>
		<?php
	}

}