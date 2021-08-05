<?php

/*
Plugin Name: youtube-mass-importer-embeder
Plugin URI: https://github.com/zabr91/youtube-mass-importer-embeder
Description: youtube-mass-importer-embeder
Version: v0
Author: Ivan Zabroda
Author URI: zabr91.github.io
License: MIT
License URI: https://opensource.org/licenses/MIT
Text Domain: youtube-mass-importer-embeder
Domain Path: /assets/lang
Requires PHP: 7
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
  
define( 'YMIE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YMIE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'YMIE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'YMIE_FILE',  __FILE__  );
define( 'YMIE_TEXT_DOMAIN',  'youtube-mass-importer-embeder'  );

require_once('update-config.php');

require_once(YMIE_PLUGIN_DIR.'base/post-types/youtube-video.php');

require_once(YMIE_PLUGIN_DIR.'admin/controllers/Settings.php');
