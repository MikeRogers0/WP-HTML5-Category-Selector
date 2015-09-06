<?php
/*
Plugin Name: WP HTML5 Category Selector
Plugin URI: https://github.com/MikeRogers0/WP-HTML5-Category-Selector
Description: Adds a filter input field to the category box on the add/edit post pages.
Version: 1.3.0
Author: Mike Rogers
Author URI: https://mikerogers.io/
Text Domain: wp_html5_category_selector
License: GPLv2
 */

/*
Copyright 2015 Mike Rogers - https://mikerogers.io/

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

/**
 * Set of up localisation
 */
load_theme_textdomain('wp_html5_category_selector');

/**
 * This holds all the functionality of the WP HTML category selector
 */

class wp_html5_category_selector {
  /**
   * Ques up the requires actions & filters. 
   */
  public function __construct() {
    add_action('admin_init', array($this, 'admin_init') );
  }

  /**
   * Registers the css & javascript to run only in the admin section
   */
  public function admin_init(){
    /**
     * First, set up the js to run in the footer of the page and be localised.
     * Than the css.
     */
    wp_register_script('wp_html5_category_selector', WP_PLUGIN_URL . '/wp-html5-category-selector/wp-html5-category-selector.js', false, false, true);
    wp_localize_script( 'wp_html5_category_selector', 'objectL10n', array(
      'filter' => __('Filter'),
      'type_to_filter' => __('Type to filter'),
      'clear' => __('Clear')
    ));

    wp_register_style('wp_html5_category_selector', WP_PLUGIN_URL . '/wp-html5-category-selector/admin.css');

    /**
     * Now tell them to run with jquery.
     */
    wp_enqueue_script('jquery');
    wp_enqueue_script('wp_html5_category_selector');
    wp_enqueue_style('wp_html5_category_selector');
  }
}


/** 
 * Start the plugin.
 */
$wp_html5_category_selector = new wp_html5_category_selector();
?>
