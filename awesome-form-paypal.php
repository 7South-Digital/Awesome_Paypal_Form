<?php
/**
 * Plugin Name: Awesome Form Paypal
 * Description: 
 * Author: 7South Digital
 * Version: 0.1
 * Text Domain: awesome-form-paypal 
 * Author URI: 
 */
defined('ABSPATH') or die('Keep Silent');

if (!class_exists('AwesomeFormPaypal')) :

    final class AwesomeFormPaypal
    {
        protected $_version = '1.0.0';

        protected static $_instance = null;

        /* create the instance of the class of plugin */
        public static function instance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct()
        {
            $this->constants();
            $this->includes();
            $this->hooks();
        }
        /* Upload all constants */
        public function constants()
        {
            $this->define('AFP_PLUGIN_INCLUDE_PATH', trailingslashit(plugin_dir_path(__FILE__) . 'includes'));
            $this->define('AFP_PLUGIN_TEMPLATES_PATH', trailingslashit(plugin_dir_path(__FILE__) . 'template'));
            $this->define('AFP_PLUGIN_TEMPLATES_URI', trailingslashit(plugin_dir_url(__FILE__) . 'template'));
            $this->define('AFP_PLUGIN_LIB_PATH', trailingslashit(plugin_dir_path(__FILE__) . 'lib'));
            $this->define('AFP_PLUGIN_URI', trailingslashit(plugin_dir_url(__FILE__)));
            $this->define('AFP_PLUGIN_VENDOR_PATH', trailingslashit(plugin_dir_path(__FILE__) . 'vendor'));

            $this->define('AFP_PLUGIN_DIRNAME', dirname(plugin_basename(__FILE__)));
            $this->define('AFP_PLUGIN_BASENAME', plugin_basename(__FILE__));
            $this->define('AFP_PLUGIN_FILE', __FILE__);
            $this->define('AFP_IMAGES_URI', trailingslashit(plugin_dir_url(__FILE__) . 'assets/img'));
            $this->define('AFP_ASSETS_URI', trailingslashit(plugin_dir_url(__FILE__) . 'assets'));
        }
        public function hooks()
        {
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 10);
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        }
        public function includes()
        {
            if ($this->is_required_php_version()) {
                require_once $this->include_path('functions.php');
                require_once $this->include_path('hooks.php');
            }
        }
        public function define($name, $value, $case_insensitive = false)
        {
            if (!defined($name)) {
                define($name, $value, $case_insensitive);
            }
        }

        public function include_path($file)
        {
            $file = ltrim($file, '/');

            return AFP_PLUGIN_INCLUDE_PATH . $file;
        }
        public function enqueue_scripts()
        {
            wp_enqueue_style('awesome-form-paypal', $this->assets_uri("/public/style.css"), array(), $this->version());
            wp_enqueue_style('awesome-form-p-bootstrap', $this->assets_uri("/bootstrap4.min.css"), array(), $this->version());
            wp_enqueue_script('awesome-form-p-js', $this->assets_uri("public/init.js"), array('jquery'), $this->version(), true);
            wp_localize_script( 'afp_ajax_vote', 'afp_ajax_reg', array(
                'url' => admin_url( 'admin-ajax.php' ),
                'hook' => 'afp_register_vote',
            ) );
            wp_localize_script( 'apv_ajax_suscribe', 'apv_ajax_sub', array(
                'url' => admin_url( 'admin-ajax.php' ),
                'hook' => 'apv_add_suscriber_mailchip',
            ) );
            $this->add_inline_style();
        }

        public function admin_enqueue_scripts()
        {   
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style('afp-admin-plg', $this->assets_uri("/admin/style.css"), array(), $this->version());
            wp_enqueue_style('awesome-form-p-bootstrap', $this->assets_uri("/bootstrap4.min.css"), array(), $this->version());
            wp_enqueue_script('awesome-form-p-js', $this->assets_uri("/admin/init.js"), array('jquery','wp-color-picker'), $this->version(), true);
            wp_localize_script( 'afp_ajax_delete', 'afp_ajax_del', array(
                'url' => admin_url( 'admin-ajax.php' ),
                'hook' => 'afp_delete',
            ) );
        }
        public function add_inline_style(){
            if ( apply_filters( 'disable_apv_inline_style', false ) ) {
                return;
            }

            ob_start();
            include_once $this->include_path('stylesheet.php');
            $css = ob_get_clean();
            $css = $this->clean_css( $css );
            $css = apply_filters( 'afp_inline_style', $css );
            wp_add_inline_style( 'awesome-form-paypal', $css );
        }
        public function clean_css( $inline_css ) {
            $inline_css = str_ireplace( array( '<style type="text/css">', '</style>' ), '', $inline_css );
            $inline_css = str_ireplace( array( "\r\n", "\r", "\n", "\t" ), '', $inline_css );
            $inline_css = preg_replace( "/\s+/", ' ', $inline_css );
            
            return trim( $inline_css );
        }

        public function assets_uri($file)
        {
            $file = ltrim($file, '/');

            return AFP_ASSETS_URI . $file;
        }
        public function basename()
        {
            return AFP_PLUGIN_BASENAME;
        }

        public function dirname()
        {
            return AFP_PLUGIN_DIRNAME;
        }

        public function version()
        {
            return esc_attr($this->_version);
        }

        public function plugin_path()
        {
            return untrailingslashit(plugin_dir_path(__FILE__));
        }

        public function plugin_uri()
        {
            return untrailingslashit(plugins_url('/', __FILE__));
        }
        public function is_required_php_version()
        {
            return version_compare(PHP_VERSION, '5.6.0', '>=');
        }
        public function plugin_activated()
        {
            global $wpdb;
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            $table = $wpdb->prefix . 'afp_items';
            $sql = "CREATE TABLE $table3 (
                id int(15) NOT NULL AUTO_INCREMENT,
                settings varchar(50) NOT NULL,
                datas text NOT NULL,
                PRIMARY KEY id (id));
                INSERT INTO `wp_afp_settings` (id, setting, datas) VALUES 
                ('1', 'paypal_clientid', ''),
                ('2', 'paypal_secret', ''),
                ('3', 'mail_body_client', ''), 
                ('4', 'mail_subject_client', ''), 
                ('5', 'mail_subject_admin', ''), 
                ('6', 'mail_email_admin', ''), 
                ('7', 'mail_body_admin', ''), 
                ('8', 'form_text_color', ''), 
                ('9', 'form_border_inut', ''), 
                ('10', 'form_label_text_color', ''), 
                ('11', 'form_label_font_size', ''), 
                ('12', 'form_button_color', ''), 
                ('13', 'form_botton_back_color', ''), 
                ('14', 'form_botton_back_color_h', ''), 
                ('15', 'form_botton_border_color', ''), 
                ('16', 'form_button_border_color_h', ''), 
                ('17', 'form_botton_back_color', ''), 
                ('18', 'form_input_font_size', ''), 
                ('19', 'link_terms_conditions', ''), 
                ('20', 'link_privacy_policy', '')";

            dbDelta($sql);
        }
        public function plugin_deactivated()
        {
        }
    }
    function AwesomeFormPaypal()
    {
        return AwesomeFormPaypal::instance();
    }

    add_action('plugins_loaded', 'AwesomeFormPaypal', 51);
    register_activation_hook(__FILE__, array('AwesomeFormPaypal', 'plugin_activated'));
    register_deactivation_hook(__FILE__, array('AwesomeFormPaypal', 'plugin_deactivated'));
endif;