<?php
/**
 * Plugin Name: Simple IP Restriction
 * Plugin URI: https://yoyallimbu.com/
 * Description: An easy-to-use plugin designed to restrict, block, or whitelist IP addresses, providing effective protection against unwanted DDOS attacks. This tool helps enhance your website's security by preventing unauthorized access and guarding against potential threats.
 * Version: 1.0.0
 * Author: Yoyal Limbu
 * Author URI: https://yoyallimbu.com/
 * Text Domain: simple-ip-restriction
 * Domain Path: /languages/
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Simple_IP_Restriction
 */
defined( 'ABSPATH' ) || exit;

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
} else {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		error_log( // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			sprintf(
			/* translators: 1: composer command. 2: plugin directory */
				esc_html__( 'Your installation of the Simple IP restriction plugin is incomplete. Please run %1$s within the %2$s directory.', 'simple-ip-restriction' ),
				'`composer install`',
				'`' . esc_html( str_replace( ABSPATH, '', dirname( __FILE__ ) ) ) . '`'
			)
		);
		/**
		 * Outputs an admin notice if composer install has not been ran.
		 */
		add_action(
			'admin_notices',
			function () {
				?>
                <div class="notice notice-error">
                    <p>
						<?php
						printf(
						/* translators: 1: composer command. 2: plugin directory */
							esc_html__( 'Your installation of the  User Registration Membership plugin is incomplete. Please run %1$s within the %2$s directory.', 'user-registration-membership' ),
							'<code>composer install</code>',
							'<code>' . esc_html( str_replace( ABSPATH, '', dirname( __FILE__ ) ) ) . '</code>'
						);
						?>
                    </p>
                </div>
				<?php
			}
		);

		return;
	}
}

if ( ! defined( 'SIPR_VERSION' ) ) {
	define( 'SIPR_VERSION', '1.0.0' );
}

// Define SIPR_PLUGIN_FILE.
if ( ! defined( 'SIPR_PLUGIN_FILE' ) ) {
	define( 'SIPR_PLUGIN_FILE', __FILE__ );
}

// Define SIPR_DIR.
if ( ! defined( 'SIPR_DIR' ) ) {
	define( 'SIPR_DIR', plugin_dir_path( __FILE__ ) );
}

// Define SIPR_URL.
if ( ! defined( 'SIPR_URL' ) ) {
	define( 'SIPR_URL', plugin_dir_url( __FILE__ ) );
}

// Define SIPR_ASSETS_URL.
if ( ! defined( 'SIPR_ASSETS_URL' ) ) {
	define( 'SIPR_ASSETS_URL', SIPR_URL . 'assets' );
}

\SIPR\Admin\Admin::get_instance();