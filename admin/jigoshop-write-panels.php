<?php
/**
 * Jigoshop Write Panels
 *
 * Sets up the write panels used by products and orders (custom post types)
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package             Jigoshop
 * @category            Admin
 * @author              Jigoshop
 * @copyright           Copyright © 2011-2014 Jigoshop.
 * @license             GNU General Public License v3
 */

include('write-panels/product-data.php');
include('write-panels/product-data-save.php');
include('write-panels/product-types/variable.php');
include('write-panels/order-data.php');
include('write-panels/order-data-save.php');
include('write-panels/coupon-data.php');
include('write-panels/email-data.php');

/**
 * Init the meta boxes
 *
 * Initializes the write panels for both products and orders. Also removes unused default write panels.
 *
 * @since 		1.0
 */
add_action( 'add_meta_boxes', 'jigoshop_meta_boxes' );

function jigoshop_meta_boxes()
{
	add_meta_box('jigoshop-product-data', __('Product Data', 'jigoshop'), 'jigoshop_product_data_box', 'product', 'normal', 'high');

	add_filter('jigoshop_admin_order_billing_fields', 'jigoshop_hide_euvat_field', 10, 2);
	add_meta_box('jigoshop-order-data', __('Order Data', 'jigoshop'), 'jigoshop_order_data_meta_box', 'shop_order', 'normal', 'high');
	add_meta_box('jigoshop-order-items', __('Order Items <small>&ndash; Note: if you edit quantities or remove items from the order you will need to manually change the item\'s stock levels.</small>', 'jigoshop'), 'jigoshop_order_items_meta_box', 'shop_order', 'normal', 'high');
	add_meta_box('jigoshop-order-totals', __('Order Totals', 'jigoshop'), 'jigoshop_order_totals_meta_box', 'shop_order', 'side', 'default');
	add_meta_box('jigoshop-order-attributes', __('Order Variation Attributes / Addons', 'jigoshop'), 'jigoshop_order_attributes_meta_box', 'shop_order', 'side', 'default');

	add_meta_box('jigoshop-order-actions', __('Order Actions', 'jigoshop'), 'jigoshop_order_actions_meta_box', 'shop_order', 'side', 'default');

	remove_meta_box('commentstatusdiv', 'shop_order', 'normal');
	remove_meta_box('slugdiv', 'shop_order', 'normal');

	add_meta_box('jigoshop-coupon-data', __('Coupon Data', 'jigoshop'), 'jigoshop_coupon_data_box', 'shop_coupon', 'normal', 'high');
	add_meta_box('jigoshop-email-data', __('Email Data', 'jigoshop'), 'jigoshop_email_data_box', 'shop_email', 'side', 'default');
	add_meta_box('jigoshop-email-variable', __('Email Variables', 'jigoshop'), 'jigoshop_email_variable_box', 'shop_email', 'normal', 'default');

	remove_meta_box('commentstatusdiv', 'shop_coupon', 'normal');
	remove_meta_box('slugdiv', 'shop_coupon', 'normal');
	remove_post_type_support('shop_coupon', 'editor');
}

function jigoshop_hide_euvat_field($fields, $data)
{
	if (!isset($data['billing_euvatno'])) {
		unset($fields['billing_euvatno']);
	}

	return $fields;
}

/**
 * Save meta boxes
 *
 * Runs when a post is saved and does an action which the write panel save scripts can hook into.
 *
 * @since 		1.0
 */
add_action( 'save_post', 'jigoshop_meta_boxes_save', 1, 2 );

function jigoshop_meta_boxes_save($post_id, $post)
{
	if (!$_POST) {
		return $post_id;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	if (!isset($_POST['jigoshop_meta_nonce']) || (isset($_POST['jigoshop_meta_nonce']) && !wp_verify_nonce($_POST['jigoshop_meta_nonce'], 'jigoshop_save_data'))) {
		return $post_id;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	if ($post->post_type != 'product' && $post->post_type != 'shop_order' && $post->post_type != 'shop_coupon' && $post->post_type != 'shop_email') {
		return $post_id;
	}

	do_action('jigoshop_process_'.$post->post_type.'_meta', $post_id, $post);
}

/**
 * Product data
 *
 * Forces certain product data based on the product's type, e.g. grouped products cannot have a parent.
 *
 * @since 		1.0
 */
add_filter('wp_insert_post_data', 'jigoshop_product_data');

function jigoshop_product_data($data)
{
	if ($data['post_type'] == 'product' && isset($_POST['product-type'])) {
		$product_type = stripslashes($_POST['product-type']);
		switch ($product_type) {
			case "grouped" :
			case "variable" :
				$data['post_parent'] = 0;
				break;
		}
	}

	return $data;
}

/**
 * Order data
 *
 * Forces the order posts to have a title in a certain format (containing the date)
 *
 * @since 		1.0
 */
add_filter('wp_insert_post_data', 'jigoshop_order_data');

function jigoshop_order_data($data)
{
	if ($data['post_type'] == 'shop_order' && isset($data['post_date'])) {

		$order_title = 'Order';
		if ($data['post_date']) {
			$order_title .= ' &ndash; '.date('F j, Y @ h:i A', strtotime($data['post_date']));
		}

		$data['post_title'] = $order_title;
	}

	return $data;
}


/**
 * Title boxes
 */
add_filter('enter_title_here', 'jigoshop_enter_title_here', 1, 2);

function jigoshop_enter_title_here($text, $post)
{
	if ($post->post_type == 'shop_coupon') {
		return __('Coupon Title (converted to lower case for Code, multiple words will end up hyphenated)', 'jigoshop');
	}

	return $text;
}

/**
 * Save errors
 *
 * Stores error messages in a variable so they can be displayed on the edit post screen after saving.
 *
 * @since 		1.0
 */
add_action( 'admin_notices', 'jigoshop_meta_boxes_save_errors' );

function jigoshop_meta_boxes_save_errors()
{
	$options = Jigoshop_Base::get_options();
	$errors = $options->get('jigoshop_errors');
	if (is_array($errors) && count($errors)) {
		echo '<div id="jigoshop_errors" class="error fade">';
		foreach ($errors as $error) {
			echo '<p>'.$error.'</p>';
		}
		echo '</div>';
		$options->set('jigoshop_errors', '');
	}
}

/**
 * Enqueue scripts
 * Enqueue JavaScript used by the meta panels.
 *
 * @since    1.0
 */
function jigoshop_write_panel_scripts()
{
	$options = Jigoshop_Base::get_options();
	$post_type = jigoshop_get_current_post_type();

	if ($post_type !== 'product' && $post_type !== 'shop_order' && $post_type !== 'shop_coupon' && $post_type !== 'shop_email') {
		return;
	}

	wp_enqueue_script('jquery-ui-datepicker');
	jigoshop_add_script('jigoshop_datetimepicker', JIGOSHOP_URL.'/assets/js/jquery-ui-timepicker-addon.min.js', array('jquery', 'jquery-ui-datepicker'));
	jigoshop_add_script('jigoshop-select2', JIGOSHOP_URL.'/assets/js/select2.min.js', array('jquery'));
	jigoshop_add_script('jigoshop-writepanel', JIGOSHOP_URL.'/assets/js/write-panels.js', array('jquery', 'jigoshop-select2'));
	jigoshop_add_script('jigoshop-bootstrap-tooltip', JIGOSHOP_URL.'/assets/js/bootstrap-tooltip.min.js', array('jquery'), array('version' => '2.0.3'));

	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');

	$params = array(
		'remove_item_notice' => __("Remove this item? If you have previously reduced this item's stock, or this order was submitted by a customer, will need to manually restore the item's stock.", 'jigoshop'),
		'cart_total' => __('Calc totals based on order items and taxes?', 'jigoshop'),
		'copy_billing' => __('Copy billing information to shipping information? This will remove any currently entered shipping information.', 'jigoshop'),
		'prices_include_tax' => $options->get('jigoshop_prices_include_tax'),
		'ID' => __('ID', 'jigoshop'),
		'item_name' => __('Item Name', 'jigoshop'),
		'quantity' => __('Quantity e.g. 2', 'jigoshop'),
		'cost_unit' => __('Cost per unit e.g. 2.99', 'jigoshop'),
		'tax_rate' => __('Tax Rate e.g. 20.0000', 'jigoshop'),
		'meta_name' => __('Meta Name', 'jigoshop'),
		'meta_value' => __('Meta Value', 'jigoshop'),
		'custom_attr_heading' => __('Custom Attribute', 'jigoshop'),
		'display_attr_label' => __('Display on product page', 'jigoshop'),
		'variation_attr_label' => __('Is for variations', 'jigoshop'),
		'confirm_remove_attr' => __('Remove this attribute?', 'jigoshop'),
		'assets_url' => JIGOSHOP_URL,
		'ajax_url' => admin_url('admin-ajax.php'),
		'add_order_item_nonce' => wp_create_nonce('add-order-item')
	);

	jigoshop_localize_script('jigoshop-writepanel', 'jigoshop_params', $params);
}
add_action('admin_enqueue_scripts', 'jigoshop_write_panel_scripts');

/**
 * User Address
 *
 * Shows JSON encoded array with user billing and shipping address.
 *
 * @since        1.13
 */
function jigoshop_get_user_address_data()
{
	if (isset($_GET['load_address']) && is_numeric($_GET['load_address'])) {
		$defaults = array(
			'billing_first_name' => '',
			'billing_last_name' => '',
			'billing_company' => '',
			'billing_address_1' => '',
			'billing_address_2' => '',
			'billing_city' => '',
			'billing_state' => '',
			'billing_postcode' => '',
			'billing_country' => '',
			'billing_phone' => '',
			'billing_email' => '',
			'shipping_first_name' => '',
			'shipping_last_name' => '',
			'shipping_company' => '',
			'shipping_address_1' => '',
			'shipping_address_2' => '',
			'shipping_city' => '',
			'shipping_state' => '',
			'shipping_postcode' => '',
			'shipping_country' => '',
		);

		$data = array_map(function($arg) {
			return $arg[0];
		}, wp_parse_args(get_user_meta($_GET['load_address'], '', true), $defaults));

		echo json_encode($data);
		exit;
	}
}
add_action('init', 'jigoshop_get_user_address_data');

/**
 * Meta scripts
 *
 * Outputs JavaScript used by the meta panels.
 *
 * @since 		1.0
 */
function jigoshop_meta_scripts()
{
	?>
	<script type="text/javascript">
		jQuery(function($){
			<?php do_action('product_write_panel_js'); ?>
		});
	</script>
<?php
}

/**
 * As of Jigoshop 1.3 this class is deprecated and replaced with classes/jigoshop_forms.class.php (Jigoshop_Forms)
 *
 * This is here for backwards compatibility only.
 */
class jigoshop_form
{
	public static function input($ID, $label, $desc = false, $value = null, $class = 'short', $placeholder = null, array $extras = array())
	{
		$args = array(
			'id' => $ID,
			'label' => $label,
			'after_label' => isset($extras['after_label']) ? $extras['after_label'] : null,
			'class' => $class,
			'desc' => $desc,
			'value' => $value,
			'placeholder' => $placeholder,
		);

		return Jigoshop_Forms::input($args);
	}

	public static function select($ID, $label, $options, $selected = false, $desc = false, $class = 'select short')
	{
		$args = array(
			'id' => $ID,
			'label' => $label,
			'class' => $class,
			'desc' => $desc,
			'options' => $options,
			'selected' => $selected
		);

		return Jigoshop_Forms::select($args);
	}

	public static function checkbox($ID, $label, $value = false, $desc = false, $class = 'checkbox')
	{
		$args = array(
			'id' => $ID,
			'label' => $label,
			'class' => $class,
			'desc' => $desc,
			'value' => $value
		);

		return Jigoshop_Forms::checkbox($args);
	}
}
