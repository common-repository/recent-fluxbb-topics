<?php 
/*
Plugin Name: Recent FluxBB Topics
Plugin URI: https://wordpress.org/plugins/recent-fluxbb-topics/
Description: This plugin grabs your recent FluxBB topics for you to display in WordPress. Formerly punbb_recent_topics by IG based on the plugin made by Nick [LINICKX] Bettison (release in April 2008).
Version: 0.3
Author: Mister WP
Author URI: https://www.mister-wp.com
*/
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 // The path to the plugin 

define('FLUXBB_RT_PLUGINPATH', (DIRECTORY_SEPARATOR != '/') ? str_replace(DIRECTORY_SEPARATOR, '/', dirname(__FILE__)) : dirname(__FILE__));
 /* * The base class */
 	class fluxbbRecentTopics { 
	/* * The boostrap function */
 		function bootstrap() { 
			// Add the installation and uninstallation hooks 
			$file = FLUXBB_RT_PLUGINPATH . '/' . basename(__FILE__);
 			register_activation_hook($file, array($this, 'install'));
 			register_deactivation_hook($file, array($this, 'uninstall'));
 			// Add the actions 
			// old method for handmade shortcode : add_action('wp_head', array($this, 'DisplayPRTHeader'));
			add_action('admin_menu', array($this,'FLUXBB_RT_add_admin_options'));
 			} 
			/* * The installation function */
 			function install() { } 
			/* * The uninstallation function */
 			function uninstall() { } 
			

			function FLUXBB_RT_add_admin_options() {
    			

            add_submenu_page( 
			'options-general.php', 
			'Fluxbb Recent Topics settings',
			'Fluxbb Recent Topics settings',
			'manage_options',
			'fluxbb-recent-topics-settings',
			'fluxbb_rt_settings_page');


			}
			



} 

function fluxbb_func( $atts ) 
{
    if(isset($atts['limit'])) 
    { 
        $LIMIT_shortcode = $atts['limit']; 
    }
    // Start the cache 
	ob_start();
 	// Add the posts feed
	require(FLUXBB_RT_PLUGINPATH . '/display/display.php');
 	// Get the markup 
	$FLUXBB_RT_html = ob_get_contents();
 	// Cleanup 
	ob_end_clean();
 	return $FLUXBB_RT_html;
}
add_shortcode( 'fluxbb', 'fluxbb_func' );

function fluxbb_rt_settings_page() {
    		// echo 'settings';	
			require(FLUXBB_RT_PLUGINPATH . '/display/admin-options.php');

			}
/* $timer  = VTimer::get($options['magic']);
$timer  = (new VTimer)->get($options['magic']); */

// fluxbbRecentTopics::bootstrap();
(new fluxbbRecentTopics)->bootstrap();


// legacy sidebar function
function fluxbb_topics() {
	require(FLUXBB_RT_PLUGINPATH . '/display/display.php');
}










// Register and load the widget
function fluxbbrt_load_widget() {
    register_widget( 'fluxbbrt_widget' );
}
add_action( 'widgets_init', 'fluxbbrt_load_widget' );
 
// Creating the widget 
class fluxbbrt_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'fluxbbrt_widget', 
 
// Widget name will appear in UI
__('FluxBB Recent Topics Widget', 'fluxbbrt_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Display the last topics of your FluxBB forum.', 'fluxbbrt_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output



// Start the cache 
ob_start();
 // Add the posts feed
require(FLUXBB_RT_PLUGINPATH . '/display/display.php');
 // Get the markup 
$FLUXBB_RT_html = ob_get_contents();
 // Cleanup 
ob_end_clean();

if(isset($FLUXBB_RT_html) && !empty($FLUXBB_RT_html)) {
    echo $FLUXBB_RT_html;
}
else
{
    echo __( 'FluxBB plugin not setup yet!', 'fluxbbrt_widget_domain' );
}

echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Latest posts in our board', 'fluxbbrt_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class fluxbbrt_widget ends here

?>