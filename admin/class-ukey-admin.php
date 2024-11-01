<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ukey.app
 * @since      1.0.0
 *
 * @package    UKey
 * @subpackage UKey/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    UKey
 * @subpackage UKey/admin
 */
class UKey_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
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
	public function init_settings() {
		// TODO: Add validation methods.		
		register_setting( 'ukey', 'ukey_settings' );
	 		
		add_settings_section(
			'ukey_settings_section', // Slug-name to identify the section
			'Universal Key (UKey™)',
			array($this, 'include_settings_header'),
			'ukey' // The slug-name of the settings page on which to show the section
		);

		add_settings_field(
			'ukey_client_id', 
			'Client ID',
			array($this, 'include_settings_client_id'),
			'ukey', // The slug-name of the settings page on which to show the section
			'ukey_settings_section', // The slug-name of the section of the settings page in which to show the box
			array(
				'label_for'         => 'ukey_client_id',
				'class'             => 'ukey_row'
			)
		);
	}


	/**
	 * Add a new top level menu.
	 *
	 * @since    1.0.0
	 */
	public function add_page() {
        add_menu_page(
            'UKey',
            'UKey',
            'manage_options',
            'ukey',
            array($this, 'include_settings_page')
        );
	}


    /**
	 * Register the stylesheets for the admin-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
			
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ukey-admin.css', array(), $this->version, 'all' );

	}

    public function include_settings_header($args) {
        require_once plugin_dir_path( __FILE__ ) . 'partials/ukey-admin-settings-header.php';        
    }

    public function include_settings_client_id($args) {
        require_once plugin_dir_path( __FILE__ ) . 'partials/ukey-admin-settings-client-id.php';        
    }

    public function include_settings_page($args) {
        require_once plugin_dir_path( __FILE__ ) . 'partials/ukey-admin-settings-page.php';        
    }
}
