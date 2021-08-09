<?php

if ( !defined( 'ABSPATH' ) ) exit;

// Act on plugin activation
register_activation_hook( YMIE_FILE, "activate_ytmie" );

// Act on plugin de-activation
register_deactivation_hook( YMIE_FILE, "deactivate_ytmie" );

// Activate Plugin
function activate_ytmie() {

	// Execute tasks on Plugin activation

	// Insert DB Tables
	init_db_ytmie();
}

// De-activate Plugin
function deactivate_ytmie() {

	// Execute tasks on Plugin de-activation
}

// Initialize DB Tables
function init_db_ytmie() {

	// WP Globals
	global $table_prefix, $wpdb;

	// Customer Table
	$itemsTable = $table_prefix . 'ymie_items';

	// Create Customer Table if not exist
	if( $wpdb->get_var( "show tables like '$itemsTable'" ) != $itemsTable ) {

		// Query - Create Table
		$sql = "CREATE TABLE `$itemsTable` (
            `id` int(11) NOT NULL,
            `title` varchar(255) DEFAULT NULL,
            `q` varchar(255) NOT NULL,
            `status` int(1) NOT NULL,
            `period` int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
          
          ALTER TABLE `$itemsTable`
            ADD PRIMARY KEY (`id`);
          ALTER TABLE `$itemsTable`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
          COMMIT;
          ";

		// Include Upgrade Script
		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	
		// Create Table
		dbDelta( $sql );
	}
}