<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://gloo.tube
 * @since      1.0.0
 *
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */
class Ooohboi_Kinekt {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ooohboi_Kinekt_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Plugin updates
	 */
	public $plugin_slug;
	public $cache_key;
	public $cache_allowed;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'OOOHBOI_KINEKT_VERSION' ) ) {
			$this->version = OOOHBOI_KINEKT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'ooohboi-kinekt';

		// Plugin updates ------------------------------
		$this->plugin_slug = OOOHBOI_KINEKT_SLUG;
		$this->cache_key = 'kinekt_custom_upd';
		$this->cache_allowed = false;
		// ---------------------------------------------

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ooohboi_Kinekt_Loader. Orchestrates the hooks of the plugin.
	 * - Ooohboi_Kinekt_i18n. Defines internationalization functionality.
	 * - Ooohboi_Kinekt_Admin. Defines all hooks for the admin area.
	 * - Ooohboi_Kinekt_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ooohboi-kinekt-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ooohboi-kinekt-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ooohboi-kinekt-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ooohboi-kinekt-public.php';

		$this->loader = new Ooohboi_Kinekt_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ooohboi_Kinekt_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ooohboi_Kinekt_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Ooohboi_Kinekt_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Plugin updates ------------------------------
		add_filter( 'plugins_api', array( $this, 'info' ), 20, 3 );
		add_filter( 'site_transient_update_plugins', array( $this, 'update' ) );
		add_action( 'upgrader_process_complete', array( $this, 'purge' ), 10, 2 );
		// ---------------------------------------------

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Ooohboi_Kinekt_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		add_action( 'init', function() {

			$active_theme = wp_get_theme();
			$theme_text_domain = $active_theme->get( 'TextDomain' );

			if( defined( 'BRICKS_VERSION' ) && 'bricks' === $theme_text_domain ) {
	
				if( class_exists( '\Bricks\Elements' ) && version_compare( BRICKS_VERSION, OOOHBOI_KINEKT_BRICKS_REQUIRED, '>=' ) ) {

					// extend elements
					if ( ! class_exists( 'OoohBoi_Kinekted' ) ) require_once plugin_dir_path( dirname( __FILE__ ) ) . 'bricks/ooohboi-kinekted.php';
					OoohBoi_Kinekted::init();

				} else {

					// raise the notice
					add_action( 'admin_notices', function() {

						if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
						$message = sprintf(
							esc_html__( 'OoohBoi Kinekt plugin requires Bricks Builder version %s or greater.', 'ooohboi-kinekt' ), 
							OOOHBOI_DAWG_REQUIRED_BRICKS
						);
						printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

					} );

				}
	
			}

		}, 11 ); 

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Ooohboi_Kinekt_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Plugin update by Misha Rudrastyh
	 *
	 * @since     1.0.0
	 */
	public function request() {

		$remote = get_transient( $this->cache_key );

		if( false === $remote || ! $this->cache_allowed ) {

			$remote = wp_remote_get(
				'https://updates.ooohboi.space/feeleep/info.json',
				array(
					'timeout' => 10,
					'headers' => array(
						'Accept' => 'application/json'
					)
				)
			);

			if(
				is_wp_error( $remote )
				|| 200 !== wp_remote_retrieve_response_code( $remote )
				|| empty( wp_remote_retrieve_body( $remote ) )
			) {
				return false;
			}

			set_transient( $this->cache_key, $remote, DAY_IN_SECONDS );

		}

		$remote = json_decode( wp_remote_retrieve_body( $remote ) ); 

		return $remote;

	}


	function info( $res, $action, $args ) {

		// do nothing if you're not getting plugin information right now
		if( 'plugin_information' !== $action ) {
			return $res;
		}

		// do nothing if it is not our plugin
		if( $this->plugin_slug !== $args->slug ) {
			return $res;
		}

		// get updates
		$remote = $this->request();

		if( ! $remote ) {
			return $res;
		}

		$res = new stdClass();

		$res->name = $remote->name;
		$res->slug = $remote->slug;
		$res->version = $remote->version;
		$res->tested = $remote->tested;
		$res->requires = $remote->requires;
		$res->author = $remote->author;
		$res->author_profile = $remote->author_profile;
		$res->download_link = $remote->download_url;
		$res->trunk = $remote->download_url;
		$res->requires_php = $remote->requires_php;
		$res->last_updated = $remote->last_updated;

		$res->sections = array(
			'description' => $remote->sections->description,
			'installation' => $remote->sections->installation,
			'changelog' => $remote->sections->changelog
		);

		if( ! empty( $remote->banners ) ) {
			$res->banners = array(
				'low' => $remote->banners->low,
				'high' => $remote->banners->high
			);
		}

		return $res;

	}

	public function update( $transient ) {

		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		$remote = $this->request();

		if(
			$remote
			&& version_compare( $this->version, $remote->version, '<' )
			&& version_compare( $remote->requires, get_bloginfo( 'version' ), '<=' )
			&& version_compare( $remote->requires_php, PHP_VERSION, '<' )
		) {
			$res = new stdClass();
			$res->slug = $this->plugin_slug;
			$res->plugin = OOOHBOI_KINEKT_PLUGIN; 
			$res->new_version = $remote->version;
			$res->tested = $remote->tested;
			$res->package = $remote->download_url;

			$transient->response[ $res->plugin ] = $res;

		}

		return $transient;

	}

	public function purge( $upgrader, $options ) {

		if (
			$this->cache_allowed
			&& 'update' === $options['action']
			&& 'plugin' === $options[ 'type' ]
		) {
			// just clean the cache when new plugin version is installed
			delete_transient( $this->cache_key );
		}

	}

}
