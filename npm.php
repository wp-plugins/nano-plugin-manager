<?php
/*
Plugin Name: Nano Plugin Manager
Plugin URI: http://www.gab.ro/nano/
Description: Nano plugins provide a simple way to add simple functionality to your WordPress site, directly via an administration menu.
Version: 0.9.2
Author: Gab
Author URI: http://www.gab.ro/
License: GPL2

    Copyright 2012  Gabriel Berzescu  (email : mail@gab.ro)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/* START function files (each file contains a function) */

require_once('includes/npm_constants.php'); /* Some constants that are used. */

require_once('includes/npm_files.php'); /* Read the nano plugin files. */
require_once('includes/npm_params.php'); /* Read nano plugin prameters for each file. */

require_once('includes/npm_gets.php'); /* Activate / deactivate / delete the nano plugins. */
require_once('includes/npm_current_url.php'); /* return the current url, without any get variables */
require_once('includes/npm_add_edit.php'); /* Add or edit the nano plugins. */
require_once('includes/npm_clean.php'); /* Clean the option and sort it. */
require_once('includes/npm_core.php'); /* Add the filters and actions. */
require_once('includes/npm_textdomain.php'); /* Add the textdomain. */

require_once('includes/npm_permissions.php'); /* Check if we have appropriate permissions for file operations. */

require_once('includes/npm_menus.php'); /* Add the menu and submenu pages. */
require_once('includes/npm_main_menu.php'); /* Main administration menu. */
require_once('includes/npm_editor_menu.php'); /* The editor menu. */
require_once('includes/npm_import_menu.php'); /* The import menu. */

/* END function files */

/* START actions */

add_action('init', 'npm_constants', 1);
add_action('init', 'npm_textdomain', 2);
add_action('init', 'npm_gets', 3);
add_action('init', 'npm_add_edit', 5);
add_action('init', 'npm_clean', 6);
add_action('init', 'npm_core', 7);
add_action('admin_notices', 'npm_permissions');
add_action('admin_menu', 'npm_menus');

/* END actions */
