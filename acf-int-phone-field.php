<?php

/*
Plugin Name: Advanced Custom Fields: International Phone Field
Plugin URI: https://wordpress.org/
Description: International Phone plugin for ACF
Version: 1.0.0
Author: Andrew Horokhovets
Author URI: https://github.com/andrewhorokhovets
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if class already exists.
if ( class_exists( 'acf_plugin_int_phone' ) ) {
	return;
}

/**
 * Class acf_plugin_int_phone.
 */
class acf_plugin_int_phone {

	/**
	 * Plugin settings.
	 */
	public $settings;

	/**
	 *  Construct the class.
	 *
	 * @param void
	 *
	 * @return    void
	 */
	function __construct() {

		// Init plugin settings.
		$this->settings = [
			'version' => '1.0.0',
			'url'     => plugin_dir_url( __FILE__ ),
			'path'    => plugin_dir_path( __FILE__ ),
		];

		// Include new field type.
		add_action( 'acf/include_field_types', [
			$this,
			'include_field',
		] );
	}


	/*
	*  Include the new field type class to the ACF.
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	function include_field( $version = FALSE ) {
		// Support empty $version.
		if ( ! $version ) {
			$version = 5;
		}

		// Load textdomain.
		load_plugin_textdomain( 'TEXTDOMAIN', FALSE, plugin_basename( dirname( __FILE__ ) ) . '/lang' );

		// Include field class.
		include_once( 'fields/class-zebralab-acf-field-int-phone-v' . $version . '.php' );
	}

}

// Initialize the class.
new acf_plugin_int_phone();

