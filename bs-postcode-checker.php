<?php
/**
 * Plugin Name: Blue Side Postcode Checker
 * Plugin URI: http://www.blueside.nl
 * Description: Let the user check a postal code against an uploaded list
 * Version: 1.0.0
 * Author: Blue Side
 * Author URI: http://www.blueside.nl
 * License: GPL2
 */

require_once( plugin_dir_path(dirname(__FILE__)).'/bs-postcode-checker/view.php' );

function shortcode_callback()
{
    //include plugin_dir_path(dirname(__FILE__)).'/bs-postcode-checker/view.php';
    return render_postcode_checker();
}
add_shortcode( 'bs-postcode-checker', 'shortcode_callback' );

add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );
function ajax_test_enqueue_scripts() {
    wp_enqueue_script( 'postcode_checker', plugins_url( '/script.js', __FILE__ ), array('jquery'), '1.0', true );
    wp_localize_script( 'postcode_checker', 'postcode_checker', array('ajax_url' => admin_url( 'admin-ajax.php' )));
}

add_action( 'wp_ajax_postcodecheck', 'postcode_check' );

function postcode_check()
{
    $csvrows = explode("\n", get_option('postcodes'));
    $postcodes = array();
    foreach($csvrows as $row)
    {
        $comp = preg_split("/[\t]/", $row);
        $postcodes[$comp[0]] = $comp[1];
    }
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) { 
        echo trim($postcodes[$_POST['postcode']]);
	}
	die();
}

/*
 * Admin page
 */
add_action( 'admin_menu', 'plugin_menu' );
function plugin_menu() {
    add_options_page( 'Postcode Checker', 'Postcode Checker', 'manage_options', 'bs-postcode-checker', 'options_page' );
}

function options_page()
{
    include plugin_dir_path(dirname(__FILE__)).'bs-postcode-checker/admin-view.php';
}

add_action( 'admin_init', 'my_admin_init' );
function my_admin_init() {
    register_setting( 'postcode-settings-group', 'postcodes' );
    add_settings_section( 'section-one', 'Postcodes', 'section_render', 'bs-postcode-checker' );
    add_settings_field( 'postcodes', '', 'postcodes_render', 'bs-postcode-checker', 'section-one' );
}

function section_render()
{
    echo 'Open het Excel bestand en plak in het veld hier onder de inhoud.';
}

function postcodes_render()
{
    $setting = esc_attr( get_option( 'postcodes' ) );
    echo "<textarea name='postcodes' rows='40' cols='60'>$setting</textarea>";
}
