<?php 
/**
 * @package  SocialMediaPlugin
 */
namespace Includes\Base;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'customstyle', $this->plugin_url . '/assets/style.css' );
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . '/assets/main.js' );
    }
}