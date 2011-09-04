<?php

class wp_html5_category_selector {
	public function __construct() {
		add_action('admin_init', array($this, 'admin_head') );
		add_filter('plugin_row_meta', array($this, 'extra_plugin_links'), 10, 2);
		add_action('add_meta_boxes', array($this, 'add_html5category_boxes'));
	}
	
	// Add the required JavaScript and CSS
	public function admin_head(){
		wp_register_script('wp_html5_category_selector', WP_PLUGIN_URL . '/wp-html5-category-selector/wp-html5-category-selector.js', false, false, true);
		wp_register_style('wp_html5_category_selector', WP_PLUGIN_URL . '/wp-html5-category-selector/admin.css');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('wp_html5_category_selector');
		wp_enqueue_style('wp_html5_category_selector');
	}
	
	// Add some helpful links to the plugin page.
	public function extra_plugin_links($links, $file){
		if ($file == 'wp-html5-category-selector/wp-html5-category-selector.php') {
            $links[] = '<a href="http://twitter.com/#!/rogem002">@Rogem002</a>';
        }
        return $links;
	}
	
	// Add the meta box to the post page.
	public function add_html5category_boxes(){
		add_meta_box(
			'wp_html5_category_selector',
			__( 'HTML5 Category Selector', 'wp_html5_category_selector', 'wp_html5_category_selector'), 
			array($this, 'add_html5category_box'),
			'post', 
			'side'
		);
	}
	
	// The boxes HTML/Javascript
	public function add_html5category_box(){
		?>
		<p><?php _e('You shouldn\'t see this. This box contains the JavaScript to add the filter box.', 'wp_html5_category_selector'); ?></p>
		<div id="category-filter"><label><?php _e('Filter', 'wp_html5_category_selector'); ?>: <input type="text" id="filterCats" placeholder="<?php _e('Type to filter', 'wp_html5_category_selector'); ?>" /></label> <a class="clearThis">Clear</a></div>
		<?php
	}
}
