<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.blueside.nl/
 * @since      1.0.0
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/admin
 * @author     Marlon Peeters <marlon@blueside.nl>
 */
class Bs_Postcode_Checker_Admin {

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

    public function add_menu()
    {
        add_menu_page( 'Postcode Checker', 'Postcode Checker', 'manage_options', $this->plugin_name.'-settings', array($this, 'options_page'));
    }

    public function admin_init()
    {
        register_setting( 'postcode-settings-group', 'postcodes' );
        add_settings_section( 'section-one', 'Postcodes', array($this, 'section_render'), 'bs-postcode-checker' );
        add_settings_field( 'postcodes', '', array($this, 'postcodes_render'), 'bs-postcode-checker', 'section-one' );
    }

    public function section_render()
    {
        echo 'Open het Excel bestand en plak in het veld hier onder de inhoud.';
    }

    public function postcodes_render()
    {
        $setting = esc_attr( get_option( 'postcodes' ) );
        echo "<textarea name='postcodes' rows='40' cols='60'>$setting</textarea>";
    }
    
    public function options_page()
    {
        include_once 'partials/bs-postcode-checker-admin-display.php';
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bs-postcode-checker-admin.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bs-postcode-checker-admin.js', array( 'jquery' ), $this->version, false );
    }

}
