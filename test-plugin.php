<?php
/**
 * Plugin Name: Test Plugin
 * Plugin URI:  www.tanjila-khan.com
 * Description: Its me tanjila
 * Version:     1.0.0
 * Author:      Tanjila Khan
 * Author URI:  www.facebook.com
 * Text Domain: tanjila
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Requires at least: 5.4
 * Requires PHP: 7.0
 *
 * @package     Test PLugin
 * @author      Tanjila Khan
 * @copyright   2024 TK
 * @license     GPL-2.0+
 */

//hookname     //callback function name
add_action( 'admin_menu', 'load_menu' );

function load_menu() {
    //add menu page function to be used inside 'admin_menu' hook
    add_menu_page(
        __( 'Test Tanjila', 'tanjila' ), //plugin page title
        __( 'Test Plugin', 'tanjila' ), // plugin menu title
        'manage_options', //plugin capability
        'notes-list', //plugin page slug
        null, //plugin menu callback to show output
        'dashicons-universal-access', //plugin menu icon
        5//plugin priority
    );

    add_submenu_page( 'notes-list', __( 'Notes List', 'tanjila' ),
        __( 'Notes List', 'tanjila' ),
        'manage_options',
        'notes-list',
        'output_notes_list',
        6
    );
}

function output_notes_list() {
    require __DIR__ . '/list-table.php';
    $table_class = new ListTable( [] );
    $table_class->prepare_items();
    $table_class->display();
}

function new_note() {
    echo '<h1>New Note</h1>';
}

register_activation_hook( __FILE__, 'create_database_table' );

function create_database_table() {
    $database_creation_sql = "CREATE TABLE notes (
        id int,
        note_title VARCHAR(30) NOT NULL,
        date DATE NOT NULL,
        content VARCHAR(255) NOT NULL,
        time TIME NOT NULL
    );";
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $database_creation_sql );
}
