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
 */

define( 'TEACHING_PLUGIN_FILE', __FILE__ );
define( 'TEACHING_PLUGIN_DIRECTORY', __DIR__ );

require TEACHING_PLUGIN_DIRECTORY . '/includes/Helper.php';
require TEACHING_PLUGIN_DIRECTORY . '/includes/Database.php';
require TEACHING_PLUGIN_DIRECTORY . '/includes/ListTable.php';
require TEACHING_PLUGIN_DIRECTORY . '/includes/Admin.php';

new Database();
new Admin();
