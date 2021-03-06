<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.blueside.nl/
 * @since      1.0.0
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/public
 * @author     Marlon Peeters <marlon@blueside.nl>
 */
class Bs_Postcode_Checker_Public {

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
    public function __construct( $plugin_name, $version )
    {
	$this->plugin_name = $plugin_name;
	$this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bs-postcode-checker-public.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bs-postcode-checker-public.js', array( 'jquery' ), $this->version, false );
        wp_localize_script( $this->plugin_name, 'postcode_checker', array('ajax_url' => admin_url( 'admin-ajax.php' )));
    }

    /**
     * 
     *
     * @since    1.0.0
     */
    public function postcode_check()
    {
        $csvrows = explode("\n", get_option('postcodes'));
        $postcodes = array();
        foreach($csvrows as $row)
        {
            $comp = preg_split("/[\t]/", $row);
            $postcodes[$comp[0]] = $comp[1];
        }
        
        echo trim($postcodes[$_POST['postcode']]);

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) { 
            die();
	}
    }

    public function shortcode_callback()
    {
        ob_start();
        include dirname( __FILE__ ) . '/partials/bs-postcode-checker-public-display.php';
        return ob_get_clean();
    }

}
