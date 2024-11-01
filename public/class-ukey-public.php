<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ukey.app
 * @since      1.0.0
 *
 * @package    UKey
 * @subpackage UKey/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    UKey
 * @subpackage UKey/public
 */
class UKey_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function inject_paywall($content) {
		if (! is_single() ) return $content;

		// TODO: See if we are in sandbox mode? Give author control on how to hide/show the content

		$options = get_option( 'ukey_settings' );
		$post_id = get_the_id();

		$new_content = $content .
		    '<ukey-gateway data-ukey-altid="' . $post_id . '"' .
		    'data-ukey-mid="' . $options["ukey_client_id"] . '" data-ukey-callback="ukeyEventHandler"></ukey-gateway>';

		return $new_content;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ukey-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {		

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ukey-public.js', null, $this->version, true );
		wp_enqueue_script( $this->plugin_name . '-sdk', 'https://connect.ukey.co/sdk.js', null, null, true ); 

	}

}
