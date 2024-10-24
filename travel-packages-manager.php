<?php
/**
 * Plugin Name: Travel Packages Manager
 * Description: Custom plugin to manage and display travel packages
 * Version: 1.0
 * Author: Saman Yazdannik
 */


if (!defined('ABSPATH')) {
	exit;
}


function register_travel_package_post_type() {
	$labels = array(
		'name' => 'Travel Packages',
		'singular_name' => 'Travel Package',
		'add_new' => 'Add New Package',
		'add_new_item' => 'Add New Travel Package',
		'edit_item' => 'Edit Travel Package',
		'view_item' => 'View Travel Package',
		'search_items' => 'Search Travel Packages',
		'not_found' => 'No travel packages found',
		'not_found_in_trash' => 'No travel packages found in trash'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-palmtree',
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'travel-packages')
	);

	register_post_type('travel_package', $args);
}
add_action('init', 'register_travel_package_post_type');


function add_travel_package_meta_box() {
	add_meta_box(
		'travel_package_details',
		'Package Details',
		'render_travel_package_meta_box',
		'travel_package',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_travel_package_meta_box');


function render_travel_package_meta_box($post) {
	wp_nonce_field('travel_package_meta_box', 'travel_package_meta_box_nonce');

	$price = get_post_meta($post->ID, '_package_price', true);
	$availability = get_post_meta($post->ID, '_package_availability', true);

?>
<p>
	<label for="package_price">Price:</label>
	<input type="number" id="package_price" name="package_price" 
		   value="<?php echo esc_attr($price); ?>" step="0.01" min="0">
</p>
<p>
	<label for="package_availability">Availability:</label>
	<select id="package_availability" name="package_availability">
		<option value="available" <?php selected($availability, 'available'); ?>>
			Available
		</option>
		<option value="booked" <?php selected($availability, 'booked'); ?>>
			Fully Booked
		</option>
		<option value="limited" <?php selected($availability, 'limited'); ?>>
			Limited Spots
		</option>
	</select>
</p>
<?php
}

// MB Data
function save_travel_package_meta_box($post_id) {
	if (!isset($_POST['travel_package_meta_box_nonce'])) {
		return;
	}
	if (!wp_verify_nonce($_POST['travel_package_meta_box_nonce'], 'travel_package_meta_box')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Save the data
	if (isset($_POST['package_price'])) {
		update_post_meta($post_id, '_package_price', 
						 sanitize_text_field($_POST['package_price']));
	}
	if (isset($_POST['package_availability'])) {
		update_post_meta($post_id, '_package_availability', 
						 sanitize_text_field($_POST['package_availability']));
	}
}
add_action('save_post_travel_package', 'save_travel_package_meta_box');


function load_travel_package_template($template) {
	if (is_singular('travel_package')) {
		$custom_template = plugin_dir_path(__FILE__) . 'templates/single-travel-package.php';
		if (file_exists($custom_template)) {
			return $custom_template;
		}
	}
	return $template;
}
add_filter('single_template', 'load_travel_package_template');