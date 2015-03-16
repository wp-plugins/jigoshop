<?php

/**
 * Order Class
 * The JigoShop order class handles order data.
 * DISCLAIMER
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package             Jigoshop
 * @category            Customer
 * @author              Jigoshop
 * @copyright           Copyright © 2011-2014 Jigoshop.
 * @license             GNU General Public License v3
 */
class jigoshop_order extends Jigoshop_Base
{
	public $_data = array();
	public $id;
	public $order_date;
	public $modified_date;
	public $customer_note;
	public $order_key;
	public $user_id;
	public $items;
	public $billing_first_name;
	public $billing_last_name;
	public $billing_company;
	public $billing_euvatno;
	public $billing_address_1;
	public $billing_address_2;
	public $billing_city;
	public $billing_postcode;
	public $billing_country;
	public $billing_state;
	public $billing_email;
	public $billing_phone;
	public $shipping_first_name;
	public $shipping_last_name;
	public $shipping_company;
	public $shipping_address_1;
	public $shipping_address_2;
	public $shipping_city;
	public $shipping_postcode;
	public $shipping_country;
	public $shipping_state;
	public $shipping_method;
	public $shipping_service;
	public $payment_method;
	public $payment_method_title;
	public $order_subtotal;
	public $order_discount_subtotal;
	public $order_shipping;
	public $order_discount;
	public $order_discount_coupons;
	public $order_tax;
	public $order_shipping_tax;
	public $order_total;
	public $order_total_prices_per_tax_class_ex_tax;
	public $formatted_billing_address;
	public $formatted_shipping_address;
	public $status;
	private $order_data;

	/** Get the order if ID is passed, otherwise the order is new and empty */
	public function jigoshop_order($id = '')
	{
		if ($id > 0) {
			apply_filters('jigoshop_get_order', $this->get_order($id), $id, $this);
		}
		do_action('customized_emails_init'); /* load plugins for customized emails */
	}

	/** Gets an order from the database */
	public function get_order($id = 0)
	{
		if (!$id) {
			return false;
		}
		if ($result = get_post($id)) {
			$this->populate($result);

			return true;
		}

		return false;
	}

	/** Populates an order from the loaded post data */
	public function populate($result)
	{
		// Standard post data
		$this->id = $result->ID;
		$this->order_date = $result->post_date;
		$this->modified_date = $result->post_modified;
		$this->customer_note = $result->post_excerpt;
		// Custom field data
		$this->order_key = (string)get_post_meta($this->id, 'order_key', true);
		$this->user_id = (int)get_post_meta($this->id, 'customer_user', true);
		$this->items = (array)get_post_meta($this->id, 'order_items', true);
		$this->order_data = (array)maybe_unserialize(get_post_meta($this->id, 'order_data', true));
		$this->billing_first_name = (string)$this->_fetch('billing_first_name');
		$this->billing_last_name = (string)$this->_fetch('billing_last_name');
		$this->billing_company = (string)$this->_fetch('billing_company');
		$this->billing_euvatno = (string)$this->_fetch('billing_euvatno');
		$this->billing_address_1 = (string)$this->_fetch(array('billing_address_1', 'billing_address'));
		$this->billing_address_2 = (string)$this->_fetch('billing_address_2');
		$this->billing_city = (string)$this->_fetch('billing_city');
		$this->billing_postcode = (string)$this->_fetch('billing_postcode');
		$this->billing_country = (string)$this->_fetch('billing_country');
		$this->billing_state = (string)$this->_fetch('billing_state');
		$this->billing_email = (string)$this->_fetch('billing_email');
		$this->billing_phone = (string)$this->_fetch('billing_phone');
		$this->shipping_first_name = (string)$this->_fetch('shipping_first_name');
		$this->shipping_last_name = (string)$this->_fetch('shipping_last_name');
		$this->shipping_company = (string)$this->_fetch('shipping_company');
		$this->shipping_address_1 = (string)$this->_fetch(array('shipping_address_1', 'shipping_address'));
		$this->shipping_address_2 = (string)$this->_fetch('shipping_address_2');
		$this->shipping_city = (string)$this->_fetch('shipping_city');
		$this->shipping_postcode = (string)$this->_fetch('shipping_postcode');
		$this->shipping_country = (string)$this->_fetch('shipping_country');
		$this->shipping_state = (string)$this->_fetch('shipping_state');
		$this->shipping_method = (string)$this->_fetch('shipping_method');
		$this->shipping_service = (string)$this->_fetch('shipping_service');
		$this->payment_method = (string)$this->_fetch('payment_method');
		$this->payment_method_title = (string)$this->_fetch('payment_method_title');
		$this->order_subtotal = (string)$this->_fetch('order_subtotal');
		$this->order_discount_subtotal = (string)$this->_fetch('order_discount_subtotal');
		$this->order_shipping = (string)$this->_fetch('order_shipping');
		$this->order_discount = (string)$this->_fetch('order_discount');
		$this->order_discount_coupons = $this->_fetch('order_discount_coupons'); //array
		$this->order_tax = $this->get_order_tax_array('order_tax');
		$this->order_shipping_tax = (string)$this->_fetch('order_shipping_tax');
		$this->order_total = (string)$this->_fetch('order_total');
		// array
		$this->order_total_prices_per_tax_class_ex_tax = $this->_fetch('order_total_prices_per_tax_class_ex_tax');
		// Formatted Addresses
		$country = ($this->billing_country && jigoshop_countries::has_country($this->billing_country)) ? jigoshop_countries::get_country($this->billing_country) : $this->billing_country;
		$address = array_map('trim', array(
			$this->billing_address_1,
			$this->billing_address_2,
			$this->billing_city,
			$this->billing_state,
			$country,
			$this->billing_postcode
		));
		$this->formatted_billing_address = implode(', ', array_filter($address));
		if ($this->shipping_address_1) {
			$country = ($this->shipping_country && jigoshop_countries::has_country($this->shipping_country)) ? jigoshop_countries::get_country($this->shipping_country) : $this->shipping_country;
			$address = array_map('trim', array(
				$this->shipping_address_1,
				$this->shipping_address_2,
				$this->shipping_city,
				$this->shipping_state,
				$country,
				$this->shipping_postcode
			));
			$this->formatted_shipping_address = implode(', ', array_filter($address));
		}
		// Taxonomy data
		$this->status = 'new';
		$terms = get_the_terms($this->id, 'shop_order_status');
		if (!is_wp_error($terms) && $terms) {
			$term = current($terms);
			$this->status = $term->slug;
		}
	}

	/**
	 * This function is for internal uses only!
	 *
	 * @internal
	 * @param $key
	 * @return string
	 */
	public function _fetch($key)
	{
		foreach ((array)$key as $item) {
			if (isset($this->order_data[$item])) {
				return $this->order_data[$item];
			}
		}

		return '';
	}

	private function get_order_tax_array($key)
	{
		$array_string = $this->_fetch($key);
		$divisor = $this->_fetch('order_tax_divisor');

		return jigoshop_tax::get_taxes_as_array($array_string, $divisor);
	}

	public static function get_order_statuses_and_names()
	{
		$order_types = array(
			'new' => __('New', 'jigoshop'),
			'pending' => __('Pending', 'jigoshop'),
			'on-hold' => __('On-Hold', 'jigoshop'),
			'waiting-for-payment' => __('Waiting for payment', 'jigoshop'),
			'processing' => __('Processing', 'jigoshop'),
			'completed' => __('Completed', 'jigoshop'),
			'cancelled' => __('Cancelled', 'jigoshop'),
			'refunded' => __('Refunded', 'jigoshop'),
			'failed' => __('Failed', 'jigoshop'), /* can be set from PayPal, not currently shown anywhere -JAP- */
			'denied' => __('Denied', 'jigoshop'), /* can be set from PayPal, not currently shown anywhere -JAP- */
			'expired' => __('Expired', 'jigoshop'), /* can be set from PayPal, not currently shown anywhere -JAP- */
			'voided' => __('Voided', 'jigoshop'), /* can be set from PayPal, not currently shown anywhere -JAP- */
		);

		return apply_filters('jigoshop_filter_order_status_names', $order_types);
	}

	public function __get($variable)
	{
		return isset($this->_data[$variable]) ? $this->_data[$variable] : null;
	}

	public function __set($variable, $value)
	{
		$this->_data[$variable] = $value;
	}

	/**
	 * Returns the order number for display purposes.
	 *
	 * @access public
	 * @return string Order number.
	 */
	public function get_order_number()
	{
		return apply_filters('jigoshop_order_number', _x('#', 'hash before order number', 'jigoshop').$this->id, $this);
	}

	public function has_compound_tax()
	{
		$ret = false;
		if ($this->get_tax_classes() && is_array($this->get_tax_classes())) :

			foreach ($this->get_tax_classes() as $tax_class) :
				if ($this->order_tax[$tax_class]['compound'] == 'yes') :
					$ret = true;
					break;
				endif;
			endforeach;

		endif;

		return $ret;
	}

	public function get_tax_classes()
	{
		return ($this->order_tax && is_array($this->order_tax) ? array_keys($this->order_tax) : array());
	}

	/** Gets shipping and product tax */
	public function get_total_tax($with_currency = false, $with_price_options = true)
	{
		$order_tax = 0;
		if ($this->get_tax_classes() && is_array($this->get_tax_classes())) {
			foreach ($this->get_tax_classes() as $tax_class) {
				$order_tax += $this->order_tax[$tax_class]['amount'];
			}
			$order_tax += $this->get_shipping_tax();
		}

		if ($with_price_options) {
			return jigoshop_price($order_tax, array('with_currency' => $with_currency));
		} else {
			return number_format((double)$order_tax, 2); // no formatting for pricing options for separators, use defaults
		}
	}

	private function get_shipping_tax()
	{
		$tax = (float)$this->_fetch('order_shipping_tax');
		if ($tax == 0 && isset(jigoshop_session::instance()->chosen_shipping_method_id) && isset(jigoshop_session::instance()->selected_rate_id)) {
			foreach($this->get_tax_classes() as $class) {
				if (isset($this->order_tax[$class][jigoshop_session::instance()->chosen_shipping_method_id.jigoshop_session::instance()->selected_rate_id])) {
					$tax += (float)$this->order_tax[$class][jigoshop_session::instance()->chosen_shipping_method_id.jigoshop_session::instance()->selected_rate_id];
				}
			}
		}

		return $tax;
	}

	public function tax_class_is_not_compound($tax_class)
	{
		return !$this->order_tax[$tax_class]['compound'];
	}

	public function get_tax_class_for_display($tax_class)
	{
		return $this->order_tax[$tax_class]['display'];
	}

	public function show_tax_entry($tax_class)
	{
		return (($this->get_tax_amount($tax_class, false) > 0 && $this->get_tax_rate($tax_class) > 0) || $this->get_tax_rate($tax_class) == 0);
	}

	public function get_tax_amount($tax_class, $has_price = true)
	{
		$tax_amount = $this->order_tax[$tax_class]['amount'];
		$keys = join('|', array_keys($this->order_tax[$tax_class]));
		$shipping_method = $this->_fetch('shipping_method');
		if (!empty($shipping_method) && strpos($keys, $this->_fetch('shipping_method'))) {
			$tax_amount += (float)$this->_fetch('order_shipping_tax');
		}

		return ($has_price ? jigoshop_price($tax_amount) : $tax_amount);
	}

	public function get_tax_rate($tax_class)
	{
		return (float)$this->order_tax[$tax_class]['rate'];
	}

	public function get_price_ex_tax_for_tax_class($tax_class)
	{
		return (isset($this->order_total_prices_per_tax_class_ex_tax[$tax_class]) ? jigoshop_price($this->order_total_prices_per_tax_class_ex_tax[$tax_class]) : jigoshop_price(0));
	}

	/** Gets subtotal */
	public function get_subtotal_to_display()
	{
		$subtotal = jigoshop_price($this->order_subtotal);
		if ($this->order_tax > 0 && self::get_options()->get('jigoshop_calc_taxes') == 'yes') {
			$subtotal .= __(' <small>(ex. tax)</small>', 'jigoshop');
		}

		return $subtotal;
	}

	/** Gets shipping */
	public function get_shipping_to_display($inc_tax = false)
	{
		if ($this->order_shipping > 0) {
			$shipping = jigoshop_price($this->order_shipping);
			if ($this->order_shipping_tax > 0) { //tax applied to shipping
				// inc tax used with norway emails
				$shipping = ($inc_tax ? jigoshop_price($this->order_shipping + $this->order_shipping_tax) : $shipping);
				$tax_tag = ($inc_tax ? __('(inc. tax)', 'jigoshop') : __('(ex. tax)', 'jigoshop'));
				$shipping .= sprintf(__(' <small>%s %s</small>', 'jigoshop'), $tax_tag, ucwords($this->shipping_service));
			} else { // when no tax applied to shipping
				$shipping .= sprintf(__(' <small>%s</small>', 'jigoshop'), ucwords($this->shipping_service));
			}
		} else {
			$shipping = __('Free!', 'jigoshop');
		}

		return $shipping;
	}

	/** Output items for display in emails */
	public function email_order_items_list($show_download_links = false, $show_sku = false, $price_inc_tax = false)
	{
		$return = '';
		// validate if any item has cost less than 0. If that's the case, we can't use price including tax
		$use_inc_tax = $price_inc_tax;
		if ($price_inc_tax) {
			foreach ($this->items as $item) {
				$use_inc_tax = ($item['cost_inc_tax'] >= 0);
				if (!$use_inc_tax) {
					break;
				}
			}
		}
		foreach ($this->items as $item) {
			$_product = $this->get_product_from_item($item);
			$return .= $item['qty'].' x '.html_entity_decode(apply_filters('jigoshop_order_product_title', $item['name'], $_product, $item), ENT_QUOTES, 'UTF-8');
			if ($show_sku && self::get_options()->get('jigoshop_enable_sku') == 'yes') {
				$return .= ' (#'.$_product->sku.')';
			}
			if ($use_inc_tax && $item['cost_inc_tax'] >= 0) {
				$return .= ' - '.html_entity_decode(strip_tags(jigoshop_price($item['cost_inc_tax'] * $item['qty'], array('ex_tax_label' => 0))), ENT_COMPAT, 'UTF-8');
			} else {
				$return .= ' - '.html_entity_decode(strip_tags(jigoshop_price($item['cost'], array('ex_tax_label' => 1))), ENT_COMPAT, 'UTF-8');
			}
			if ($_product instanceof jigoshop_product_variation) {
				$return .= PHP_EOL.jigoshop_get_formatted_variation($_product, $item['variation'], true);
			}
			// Very hacky, used for GFORMS ADDONS -Rob
			if (!isset($_product->variation_data) && isset($item['variation'])) {
				if (!empty($item['variation'])) {
					foreach ($item['variation'] as $variation) {
						$return .= PHP_EOL.$variation['name'].': '.$variation['value'];
					}
				}
			}
			//  Check that this filter supplied by OptArt is in use before applying it.
			//  This filter in Jigoshop 1.3 is only used by Jigoshop Product Addons and should be revised because
			//  if that plugin is not active, emails will have a line item with 'Array' on each product description.
			//  TODO: Jigoshop never intends to use $item like this, a filter is incorrect. -JAP-
			global $wp_filter;
			if (isset($wp_filter['jigoshop_display_item_meta_data_email'])) {
				$meta_data = apply_filters('jigoshop_display_item_meta_data_email', $item);
				if ($meta_data != '') {
					$return .= PHP_EOL.$meta_data;
				}
			}
			if (!empty($item['customization'])) {
				$return .= PHP_EOL.apply_filters('jigoshop_customized_product_label', __(' Personal: ', 'jigoshop')).PHP_EOL.$item['customization'];
			}
			if ($show_download_links) {
				if ($_product->exists()) {
					if ($_product->is_type('downloadable')) {
						if ((bool)$item['variation_id']) {
							$product_id = $_product->variation_id;
						} else {
							$product_id = $_product->ID;
						}
						if ($this->get_downloadable_file_url($product_id)) {
							$return .= PHP_EOL.__('Your download link for this file is:', 'jigoshop');
							$return .= PHP_EOL.' - '.apply_filters('downloadable_file_url', $this->get_downloadable_file_url($product_id), $_product, $this).'';
						}
					}
				}
			}
			$return .= PHP_EOL;
		}

		return $return;
	}

	/** Get a product (either product or variation) */
	public function get_product_from_item($item)
	{
		if (isset($item['variation_id']) && $item['variation_id'] > 0) {
			$_product = new jigoshop_product_variation($item['variation_id']);
		} else {
			$_product = new jigoshop_product($item['id']);
		}

		return $_product;
	}

	/** Gets a downloadable products file url */
	public function get_downloadable_file_url($item_id)
	{
		$user_email = $this->billing_email;
		if ($this->user_id > 0) {
			$user_info = get_userdata($this->user_id);
			if ($user_info->user_email) {
				$user_email = $user_info->user_email;
			}
		}
		return add_query_arg('download_file', $item_id, add_query_arg('order', $this->order_key, add_query_arg('email', $user_email, home_url())));
	}

	/**  Generates a URL so that a customer can checkout/pay for their (unpaid - pending) order via a link */
	public function get_checkout_payment_url()
	{
		$payment_page = apply_filters('jigoshop_get_checkout_payment_url', get_permalink(jigoshop_get_page_id('pay')));
		if (self::get_options()->get('jigoshop_force_ssl_checkout') == 'yes' || is_ssl()) {
			$payment_page = str_replace('http:', 'https:', $payment_page);
		}

		return add_query_arg('pay_for_order', 'true', add_query_arg('order', $this->order_key, add_query_arg('order_id', $this->id, $payment_page)));
	}

	/** Generates a URL so that a customer can cancel their (unpaid - pending) order */
	public function get_cancel_order_url()
	{
		return apply_filters('jigoshop_get_cancel_order', jigoshop::nonce_url('cancel_order', add_query_arg('cancel_order', 'true', add_query_arg('order', $this->order_key, add_query_arg('order_id', $this->id, home_url())))));
	}

	/**
	 * Cancel the order and restore the cart (before payment)
	 *
	 * @param   string $note Optional note to add
	 */
	public function cancel_order($note = '')
	{
		unset(jigoshop_session::instance()->order_awaiting_payment);
		$this->update_status('cancelled', $note);
	}

	/**
	 * Adds a note (comment) to the order
	 *
	 * @param $new_status_slug string Status to change the order to
	 * @param string $note Optional note to add
	 * @param bool $call_actions
	 * @return bool
	 */
	public function update_status($new_status_slug, $note = '')
	{
		if ($this->status === null) {
			$this->status = 'new';
		}
		$old_status = get_term_by('slug', sanitize_title($this->status), 'shop_order_status');
		$new_status = get_term_by('slug', sanitize_title($new_status_slug), 'shop_order_status');
		if ($new_status) {
			wp_set_object_terms($this->id, array($new_status->slug), 'shop_order_status', false);
			if ($this->status != $new_status->slug) {
				// Status was changed
				do_action('order_status_'.$new_status->slug, $this->id);
				do_action('order_status_'.$this->status.'_to_'.$new_status->slug, $this->id);

				$this->add_order_note($note.' '.sprintf(__('Order status changed from %s to %s.', 'jigoshop'), __($old_status->name, 'jigoshop'), __($new_status->name, 'jigoshop')));
				// Date
				if ($new_status->slug == 'completed') {
					update_post_meta($this->id, '_js_completed_date', current_time('mysql'));
					$this->add_sale();
				}
			}
		}

		return false;
	}

	/**
	 * Adds a note (comment) to the order
	 *
	 * @param string $note Note to add
	 * @param int $private Currently unused
	 * @return int
	 */
	public function add_order_note($note, $private = 1)
	{
		$comment = array(
			'comment_post_ID' => $this->id,
			'comment_author' => __('Jigoshop', 'jigoshop'),
			'comment_author_email' => '',
			'comment_author_url' => '',
			'comment_content' => $note,
			'comment_type' => 'order_note',
			'comment_agent' => __('Jigoshop', 'jigoshop'),
			'comment_parent' => 0,
			'comment_date' => current_time('mysql'),
			'comment_date_gmt' => current_time('mysql', 1),
			'comment_approved' => true
		);
		$comment_id = wp_insert_comment($comment);
		add_comment_meta($comment_id, 'private', $private);

		return $comment_id;
	}

	/**
	 * Adds a sale to the record
	 */
	public function add_sale()
	{
		if ($this->items) {
			foreach ($this->items as $item) {
				$sales = absint(get_post_meta($item['id'], 'quantity_sold', true));
				$sales += absint($item['qty']);
				update_post_meta($item['id'], 'quantity_sold', $sales);
			}
		}
	}

	/**
	 * When a payment is complete this function is called
	 * Most of the time this should mark an order as 'processing' so that admin can process/post the items
	 * If the cart contains only downloadable items then the order is 'complete' since the admin needs to take no action
	 * Stock levels are reduced at this point
	 */
	public function payment_complete()
	{
		unset(jigoshop_session::instance()->order_awaiting_payment);
		$downloadable_order = false;
		if (sizeof($this->items) > 0) foreach ($this->items as $item) {
			if ($item['id'] > 0) {
				$_product = $this->get_product_from_item($item);
				if ($_product->is_type('downloadable') || $_product->is_type('virtual')) {
					$downloadable_order = true;
					continue;
				}
			}

			$downloadable_order = false;
			break;
		}

		if ($downloadable_order) {
			$this->update_status('completed');
		} else {
			$this->update_status('processing');
		}

		// Payment is complete so reduce stock levels
		$this->reduce_order_stock();
		// Add the sale
		$this->add_sale();
		do_action('jigoshop_payment_complete', $this->id);
	}

	/**
	 * Reduce stock levels
	 */
	public function reduce_order_stock()
	{
		// Reduce stock levels and do any other actions with products in the cart
		if (sizeof($this->items) > 0) foreach ($this->items as $item) {
			if ($item['id'] > 0) {
				$_product = $this->get_product_from_item($item);
				if ($_product instanceof jigoshop_product_variation) {
					if ($_product->stock == '-9999999') {
						// the parent product is used for variation stock tracking
						$_product = new jigoshop_product($_product->id);
					}
				}
				if ($_product->exists && $_product->managing_stock()) {
					$old_stock = $_product->stock;
					$new_quantity = $_product->reduce_stock($item['qty']);
					$this->add_order_note(sprintf(__('Item #%s stock reduced from %s to %s.', 'jigoshop'), $item['id'], $old_stock, $new_quantity));
					if ($new_quantity < 0) {
						do_action('jigoshop_product_on_backorder_notification', $this->id, $_product, $item['qty']);
					}
					// stock status notifications
					if (self::get_options()->get('jigoshop_notify_no_stock') == 'yes' && self::get_options()->get('jigoshop_notify_no_stock_amount') >= 0 && self::get_options()->get('jigoshop_notify_no_stock_amount') >= $new_quantity) {
						do_action('jigoshop_no_stock_notification', $_product);
					} elseif (self::get_options()->get('jigoshop_notify_low_stock') == 'yes' && self::get_options()->get('jigoshop_notify_low_stock_amount') && self::get_options()->get('jigoshop_notify_low_stock_amount') >= $new_quantity) {
						do_action('jigoshop_low_stock_notification', $_product);
					}
				}
			}
		}
		$this->add_order_note(__('Order item stock reduced successfully.', 'jigoshop'));
	}
}
