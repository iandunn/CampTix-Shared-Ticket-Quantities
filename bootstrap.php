<?php
/*
Plugin Name: CampTix - Shared Ticket Quantities
Plugin URI:  http://wordpress.org/plugins/camptix-shared-ticket-quantities
Description: An addon for CampTix that can group a set of tickets together so that they all close when their combined quantity reaches a set number.	// todo improve that
Version:     0.1
Author:      Ian Dunn
Author URI:  http://iandunn.name
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

define( 'CSTQ_REQUIRED_PHP_VERSION', '5.3' );    // because of __DIR__
define( 'CSTQ_REQUIRED_WP_VERSION',  '3.5' );    // because of todo

/**
 * Checks if the system requirements are met
 * @return bool True if system requirements are met, false if not
 */
function cstq_requirements_met() {
	global $wp_version;
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

	if ( version_compare( PHP_VERSION, CSTQ_REQUIRED_PHP_VERSION, '<' ) ) {
		return false;
	}

	if ( version_compare( $wp_version, CSTQ_REQUIRED_WP_VERSION, '<' ) ) {
		return false;
	}
	
	if ( ! is_plugin_active( 'camptix/camptix.php' ) ) {
		return false;
	}

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function cstq_requirements_error() {
	global $wp_version;

	require_once( __DIR__ . '/views/requirements-error.php' );
}

/**
 * Check requirements and load the main class
 * 
 * This needs to run after CampTix has been loaded so that CampTix_Addon exists when we try to extend it
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
function cstq_bootstrap() {
	if ( cstq_requirements_met() ) {
		require_once( __DIR__ . '/classes/camptix-shared-ticket-quantities.php' );
		camptix_register_addon( 'CampTix_Shared_Ticket_Quantities' );
	} else {
		add_action( 'admin_notices', 'cstq_requirements_error' );
	}
}
add_action( 'plugins_loaded', 'cstq_bootstrap' );
