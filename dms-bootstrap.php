<?php
/*
Plugin Name: PageLines DMS Bootstrap
Plugin URI: http://www.pagelines.com/
Description: Adds extra functionality to the WordPress hosted version of PageLines DMS.
Version: 0.1
Author: PageLines
Author URI: http://www.pagelines.com
PageLines: true
*/

class DMS_Bootstrap {
	
	function __construct() {
		// boost to max mem during LESS compiling.
		add_action( 'pagelines_max_mem', array( $this, 'less_memory' ) );
		
		// add more shortcodes.
		add_action( 'after_setup_theme', array( $this, 'add_shortcodes' ) );
	}
	
	function add_shortcodes() {
		require_once( 'libs/class.types.php' );
		require_once( 'libs/shortcodes.php' );
		new PLProShortcodes;
	}
	
	function less_memory() {
		@ini_set( 'memory_limit', WP_MAX_MEMORY_LIMIT );
	}
}
new DMS_Bootstrap;