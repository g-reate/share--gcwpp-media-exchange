<?php
/**
 * Delete plugin.
 *
 * @package media-exchange
 * @since 5.0.3
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option( 'gcme_name' );
