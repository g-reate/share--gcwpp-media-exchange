<?php
/**
 * Media Exchange controller.
 *
 * @package  media-exchange/includes
 * @since 5.0.3
 */

/**
 * Admin CSS.
 */
function gcme_admin_enqueue_styles() {
	wp_enqueue_style( 'gcme-admin-styles', GCME_PLUGIN_URL . '/css/gcme-admin.css', '', GCME_VERSION, 'all' );
}
add_action( 'admin_enqueue_scripts', 'gcme_admin_enqueue_styles' );

/**
 * Admin JS.
 */
/*
function gcme_admin_enqueue_scripts() {
	wp_enqueue_script( 'gcme-scripts', GCME_PLUGIN_URL . '/js/gcme-admin.js', array( 'jquery' ), GCME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'gcme_admin_enqueue_scripts' );*/


/**
 * Front CSS.
 */
function gcme_enqueue_styles() {
	$options       = get_option( 'gcme_name' );
	$radio_setting = $options['gcme_radio'];
	if ( ! is_admin() ) {
		wp_enqueue_style( 'gcme-styles', GCME_PLUGIN_URL . '/css/gcme-front.css', '', GCME_VERSION, 'all' );
		if ( 'slick' === $radio_setting ) {
			wp_enqueue_style( 'slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', '', 'all' );
			wp_enqueue_style( 'slick-theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', '', 'all' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'gcme_enqueue_styles' );

/**
 * Front JS.
 */
function gcme_enqueue_scripts() {
	$options       = get_option( 'gcme_name' );
	$radio_setting = $options['gcme_radio'];
	if ( ! is_admin() ) {
		if ( 'slick' === $radio_setting ) {
			wp_enqueue_script( 'slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), GCME_VERSION, true );
			wp_enqueue_script( 'gcme-scripts', GCME_PLUGIN_URL . '/js/gcme-front.js', array( 'jquery' ), GCME_VERSION, true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'gcme_enqueue_scripts' );
