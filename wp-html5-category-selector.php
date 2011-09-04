<?php
/*
Plugin Name: WP HTML5 Category Selector
Plugin URI: http://www.fullondesign.co.uk/projects/wp-html5-category-selector-wordpress-plugin
Description: Adds a filter input field to the category box on the add/edit post page.
Version: 1.0.2
Author: Mike Rogers
Author URI: http://www.fullondesign.co.uk/
Text Domain: wp_html5_category_selector
License: GPLv2
*/

/*
Copyright 2011 Mike Rogers - http://www.fullondesign.co.uk/

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Define the variables used in the plugin.
define('wp_html5_category_selector_version', '1.0.2');

// Set of up localisation
load_theme_textdomain('wp_html5_category_selector');

// Include the class
require('inc/wp_html5_category_selector.class.php');

// Run the plugin.
$wp_html5_category_selector = new wp_html5_category_selector();
?>