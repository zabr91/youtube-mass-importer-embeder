<?php

if( ! class_exists( 'Smashing_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'inc/updater.php' );
}

$updater = new Smashing_Updater( YMIE_FILE);
$updater->set_username( 'zabr91' );
$updater->set_repository( 'youtube-mass-importer-embeder' );

	$updater->authorize( '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' ); // Your auth code goes here for private repos

$updater->initialize();