<?php

ini_set("display_errors",1);

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    micro-tags
 * @subpackage micro-tags/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    micro-tags
 * @subpackage micro-tags/public
 * @author     Alex Neverov <al_neverov@live.ru>
 */

 if (! class_exists('Micro_Tags_Display'))
  require_once(dirname(__FILE__) . "/class-micro-tags-display.php");

class Micro_Tags_Public {

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

		add_shortcode('micro-tags',array(new Micro_Tags_Display, 'micro_tags'));

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Micro_Tags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Micro_Tags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 // wp_enqueue_style( 'easyui-default', plugin_dir_url( __FILE__ ) . '../js/easyui/themes/default/easyui.css', array(), $this->version, 'all' );
     // wp_enqueue_style( 'easyui-icons', plugin_dir_url( __FILE__ ) . '../js/easyui/themes/icon.css', array('easyui-default'), $this->version, 'all' );
     // wp_enqueue_style( 'micro-code-css', plugin_dir_url( __FILE__ ) . 'css/micro-tags-public.css', array('easyui-default'), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Micro_Tags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Micro_Tags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

     // wp_enqueue_script( 'jquery-min', plugin_dir_url( __FILE__ ) . '../js/easyui/jquery.min.js', array( 'jquery' ), $this->version, false );
		 // wp_enqueue_script( 'easyui', plugin_dir_url( __FILE__ ) . '../js/easyui/jquery.easyui.min.js', array( 'jquery' ), $this->version, false );
   	 // wp_enqueue_script( 'micro-tags-editor', plugin_dir_url( __FILE__ ) . 'js/micro-tags-editor.js', array( 'jquery' , 'easyui'), $this->version, false );
     // add_action('wp_head',array($this,'js_variables'));
	}

/*
  function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
        'is_mobile' => wp_is_mobile()
        // Тут обычно какие-то другие переменные
    );
    echo(
        '<script type="text/javascript">window.wp_data = '.
        json_encode($variables).
        ';</script>'
    );
}
*/




}
