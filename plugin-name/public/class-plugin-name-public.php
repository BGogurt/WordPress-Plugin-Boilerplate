<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Shortcode handler function.
	 *
	 * Params:
	 * - $atts — An associative array of attributes. If you do not define any attributes, it will default to an empty string.
	 * - $content — The enclosed content, if you are defining an enclosing shortcode (e.g. [shortcode]content[/shortcode]).
	 * - $tag — The shortcode's tag value (e.g. shortcode_name). If two or more shortcodes share the same callback function (which is valid), the $tag value will help determine which shortcode triggered the handler function.
	 * 
	 * @param array $atts 		Shortcode attributes. Default empty.
	 * @param string $content	Shortcode content. Default null.
	 * @param string $tag		Shortcode tag (name). Default empty.
	 * @return string
	 * 
	 * @since 1.0.0
	 * @see https://developer.wordpress.org/plugins/shortcodes/
	 */
	public function plugin_name_shortcode_func($atts=[], $content=null, $tag='') {
		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );
		$a = shortcode_atts( array(
				'title' => 'Example.com',
				), $atts, $tag
			);

		// start box
		$o = '<div class="plugin-name-box">';
 
		// title
		$o .= '<h2>' . esc_html__( $a['title'], 'plugin-name' ) . '</h2>';

		// enclosing tags
		if ( !is_null( $content ) ) {
			// secure output by executing the_content filter hook on $content
			$o .= apply_filters( 'the_content', $content );
		
			// run shortcode parser recursively
			$o .= do_shortcode( $content );
		}

		// end box
		$o .= '</div>';
	
		// return output
		return $o;
	}

}