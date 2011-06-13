<?php
/**
 * Jigoshop cart
 * @class 		jigoshop_cart
 * 
 * The JigoShop cart class stores cart data and active coupons as well as handling customer sessions and some cart related urls.
 * The cart class also has a price calculation function which calls upon other classes to calcualte totals.
 *
 * @author 		Jigowatt
 * @category 	Classes
 * @package 	JigoShop
 */
class jigoshop_cart {
	
	private static $_instance;
	public static $cart_contents_total;
	public static $cart_contents_total_ex_tax;
	public static $cart_contents_weight;
	public static $cart_contents_count;
	public static $cart_contents_tax;
	public static $cart_contents;
	public static $total;
	public static $subtotal;
	public static $tax_total;
	public static $discount_total;
	public static $shipping_total;
	public static $shipping_tax_total;
	public static $applied_coupons;
	
	/** constructor */
	function __construct() {
		
		self::$applied_coupons = array();
		
		self::get_cart_from_session();
		
		if ( isset($_SESSION['coupons']) ) self::$applied_coupons = $_SESSION['coupons'];

		if (sizeof(self::$cart_contents)>0) self::calculate_totals();
		
	}
	
	/** get class instance */
	public static function get() {
        if (!isset(self::$_instance)) {
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }
	
	/** Gets the cart data from the PHP session */
	function get_cart_from_session() {
		if ( isset($_SESSION['cart']) && $_SESSION['cart'] ) :
			$cart = $_SESSION['cart'];
			
			foreach ($cart as $item_id => $quantity) :
				$_product = &new jigoshop_product( $item_id );
				if ($_product->exists) :
					self::$cart_contents[$item_id]['quantity'] = $quantity;
					self::$cart_contents[$item_id]['data'] = $_product;
				endif;
			endforeach;
			
		else :
			self::$cart_contents = array();
		endif;
	}
	
	/** sets the php session data for the cart and coupon */
	function set_session() {
		$cart = array();
		foreach (self::$cart_contents as $item_id => $values) :
			$cart[$item_id] = $values['quantity'];
		endforeach;
		$_SESSION['cart'] = $cart;
		
		$_SESSION['coupons'] = self::$applied_coupons;
		self::calculate_totals();
	}
	
	/** Empty the cart */
	function empty_cart() {
		unset($_SESSION['cart']);
		unset($_SESSION['coupons']);
	}
	
	/**
	 * Add a product to the cart
	 *
	 * @param   string	product_id	contains the id of the product to add to the cart
	 * @param   string	quantity	contains the quantity of the item to add
	 */
	function add_to_cart( $product_id, $quantity = 1 ) {
		if (isset(self::$cart_contents[$product_id])) :
			$quantity = $quantity + self::$cart_contents[$product_id]['quantity'];
			self::$cart_contents[$product_id]['quantity'] = $quantity;
		else :
			self::$cart_contents[$product_id]['quantity'] = $quantity;
			self::$cart_contents[$product_id]['data'] = &new jigoshop_product( $product_id );
		endif;
		self::set_session();
	}
	
	/**
	 * Set the quantity for an item in the cart
	 *
	 * @param   string	product_id	contains the id of the product to add to the cart
	 * @param   string	quantity	contains the quantity of the item
	 */
	function set_quantity( $product_id, $quantity = 1 ) {
		if ($quantity==0 || $quantity<0) :
			unset(self::$cart_contents[$product_id]);
		else :
			self::$cart_contents[$product_id]['quantity'] = $quantity;
		endif;
		self::set_session();
	}
	
	/**
	 * Returns the contents of the cart
	 *
	 * @return   array	cart_contents
	 */
	function get_cart() {
		return self::$cart_contents;
	}
	
	/**
	 * Gets cross sells based on the items in the cart
	 *
	 * @return   array	cross_sells	item ids of cross sells
	 */
	function get_cross_sells() {
		$cross_sells = array();
		$in_cart = array();
		if (sizeof(self::$cart_contents)>0) : foreach (self::$cart_contents as $item_id => $values) :
			if ($values['quantity']>0) :
				$cross_sells = array_merge($values['data']->get_cross_sells(), $cross_sells);
				$in_cart[] = $item_id;
			endif;
		endforeach; endif;
		$cross_sells = array_diff($cross_sells, $in_cart);
		return $cross_sells;
	}
	
	/** gets the url to the cart page */
	function get_cart_url() {
		$cart_page_id = get_option('jigoshop_cart_page_id');
		if ($cart_page_id) return get_permalink($cart_page_id);
	}
	
	/** gets the url to the checkout page */
	function get_checkout_url() {
		$checkout_page_id = get_option('jigoshop_checkout_page_id');
		if ($checkout_page_id) :
			if (is_ssl()) return str_replace('http:', 'https:', get_permalink($checkout_page_id));
			return get_permalink($checkout_page_id);
		endif;
	}
	
	/** gets the url to remove an item from the cart */
	function get_remove_url( $item_id ) {
		$cart_page_id = get_option('jigoshop_cart_page_id');
		if ($cart_page_id) return add_query_arg('remove_item', $item_id, get_permalink($cart_page_id));
	}
	
	/** looks through the cart to see if shipping is actually required */
	function needs_shipping() {
	
		if (!jigoshop_shipping::$enabled) return false;
	
		$needs_shipping = false;
		
		foreach (self::$cart_contents as $item_id => $values) :
			$_product = $values['data'];
			if ($_product->is_type( 'simple' )) :
				$needs_shipping = true;
			endif;
		endforeach;
		
		return $needs_shipping;
	}
	
	/** Sees if we need a shipping address */
	function ship_to_billing_address_only() {
	
		$ship_to_billing_address_only = get_option('jigoshop_ship_to_billing_address_only');
		
		if ($ship_to_billing_address_only=='yes') return true;
		
		return false;
	}
	
	/** looks at the totals to see if payment is actually required */
	function needs_payment() {
		if ( self::$total > 0 ) return true;
		return false;
	}
	
	/** looks through the cart to check each item is in stock */
	function check_cart_item_stock() {
		$error = new WP_Error();
		foreach (self::$cart_contents as $item_id => $values) :
			$_product = $values['data'];
			if ($_product->managing_stock()) :
				if ($_product->is_in_stock() && $_product->has_enough_stock( $values['quantity'] )) :
					// :)
				else :
					$error->add( 'out-of-stock', sprintf(__('Sorry, we do not have enough "%s" in stock to fulfill your order. Please edit your cart and try again. We apologise for any inconvenience caused.', 'jigoshop'), $_product->get_title() ) );
					return $error;
				endif;
			else :
				if (!$_product->is_in_stock()) :
					$error->add( 'out-of-stock', sprintf(__('Sorry, we do not have enough "%s" in stock to fulfill your order. Please edit your cart and try again. We apologise for any inconvenience caused.', 'jigoshop'), $_product->get_title() ) );
					return $error;
				endif;
			endif;
		endforeach;
		return true;
	}
	
	/** calculate totals for the items in the cart */
	function calculate_totals() {
		
		$_tax = &new jigoshop_tax();

		self::$total = 0;
		self::$cart_contents_total = 0;
		self::$cart_contents_weight = 0;
		self::$cart_contents_count = 0;
		self::$cart_contents_tax = 0;
		self::$tax_total = 0;
		self::$shipping_tax_total = 0;
		self::$subtotal = 0;
		self::$discount_total = 0;
		self::$shipping_total = 0;
		
		if (sizeof(self::$cart_contents)>0) : foreach (self::$cart_contents as $item_id => $values) :
			$_product = $values['data'];
			if ($_product->exists() && $values['quantity']>0) :
				
				self::$cart_contents_count ++;
				
				self::$cart_contents_weight = self::$cart_contents_weight + $_product->get_weight();
				
				self::$cart_contents_total = self::$cart_contents_total + ($_product->get_price() * $values['quantity']);
				self::$cart_contents_total_ex_tax = self::$cart_contents_total_ex_tax + ($_product->get_price_excluding_tax() * $values['quantity']);
				
				if ( get_option('jigoshop_calc_taxes')=='yes') :
					
					$rate = $_tax->get_rate( $_product->data['tax_class'] );
					
					if ( $_product->is_taxable() && $rate>0 ) :
										
						$total_item_price = $_product->get_price() * $values['quantity'];
						
						$tax_amount = $_tax->calc_tax( $total_item_price, $rate ); // This is for calculating tax on all items of this type
						
						self::$cart_contents_tax = self::$cart_contents_tax + $tax_amount;
					
					endif;
					
				endif;
				
				// Product Discounts
				if (self::$applied_coupons) foreach (self::$applied_coupons as $code) :
					$coupon = jigoshop_coupons::get_coupon($code);
					if ($coupon['type']=='fixed_product' && in_array($item_id, $coupon['products'])) :
						self::$discount_total = self::$discount_total + ( $coupon['amount'] * $values['quantity'] );
					endif;
				endforeach;
				
			endif;
		endforeach; endif;
		
		// Cart Shipping
		if (self::needs_shipping()) jigoshop_shipping::calculate_shipping();
		
		self::$shipping_total = jigoshop_shipping::$shipping_total;
		
		self::$shipping_tax_total = jigoshop_shipping::$shipping_tax;
		
		self::$tax_total = self::$cart_contents_tax;
		
		// Subtotal
		self::$subtotal = self::$cart_contents_total;
		
		// Cart Discounts
		if (self::$applied_coupons) foreach (self::$applied_coupons as $code) :
			$coupon = jigoshop_coupons::get_coupon($code);
			if ($coupon['type']=='fixed_cart') :
				self::$discount_total = self::$discount_total + $coupon['amount'];
			elseif ($coupon['type']=='percent') :
				self::$discount_total = self::$discount_total + ( self::$subtotal / 100 ) * $coupon['amount'];
			endif;
		endforeach;
		
		// Total
		if (get_option('jigoshop_prices_include_tax')=='yes') :
			self::$total = self::$subtotal + self::$shipping_tax_total - self::$discount_total + jigoshop_shipping::$shipping_total;
		else :
			self::$total = self::$subtotal + self::$tax_total + self::$shipping_tax_total - self::$discount_total + jigoshop_shipping::$shipping_total;
		endif;
		
		if (self::$total < 0) self::$total = 0;
	}
	
	/** gets the total (after calculation) */
	function get_total() {
		return jigoshop_price(self::$total);
	}
	
	/** gets the cart contens total (after calculation) */
	function get_cart_total() {
		return jigoshop_price(self::$cart_contents_total);
	}
	
	/** gets the sub total (after calculation) */
	function get_cart_subtotal() {
		
		if (get_option('jigoshop_display_totals_tax')=='excluding') :
			
			if (get_option('jigoshop_prices_include_tax')=='yes') :
				
				$return = jigoshop_price(self::$subtotal - self::$tax_total);
				
			else :
				
				$return = jigoshop_price(self::$subtotal);
				
			endif;
			
			if (self::$tax_total>0) :
				$return .= __(' <small>(ex. tax)</small>', 'jigoshop');
			endif;
			return $return;
			
		else :
			
			$return = jigoshop_price(self::$subtotal);
			if (self::$tax_total>0) :
				$return .= __(' <small>(inc. tax)</small>', 'jigoshop');
			endif;
			return $return;
		
		endif;

	}
	
	/** gets the cart tax (after calculation) */
	function get_cart_tax() {
		$cart_total_tax = self::$tax_total + self::$shipping_tax_total;
		if ($cart_total_tax > 0) return jigoshop_price( $cart_total_tax );
		return false;
	}
	
	/** gets the shipping total (after calculation) */
	function get_cart_shipping_total() {
		if (isset(jigoshop_shipping::$shipping_label)) :
			if (jigoshop_shipping::$shipping_total>0) :
			
				if (get_option('jigoshop_display_totals_tax')=='excluding') :
					
					$return = jigoshop_price(jigoshop_shipping::$shipping_total);
					if (self::$shipping_tax_total>0) :
						$return .= __(' <small>(ex. tax)</small>', 'jigoshop');
					endif;
					return $return;
					
				else :
					
					$return = jigoshop_price(jigoshop_shipping::$shipping_total + jigoshop_shipping::$shipping_tax);
					if (self::$shipping_tax_total>0) :
						$return .= __(' <small>(inc. tax)</small>', 'jigoshop');
					endif;
					return $return;
				
				endif;

			else :
				return __('Free!', 'jigoshop');
			endif;
		endif;
	}
	
	/** gets title of the chosen shipping method */
	function get_cart_shipping_title() {
		if (isset(jigoshop_shipping::$shipping_label)) :
			return __('via ','jigoshop') . jigoshop_shipping::$shipping_label;
		endif;
		return false;
	}
	
	/**
	 * Applies a coupon code
	 *
	 * @param   string	code	The code to apply
	 * @return   bool	True if the coupon is applied, false if it does not exist or cannot be applied
	 */
	function add_discount( $coupon_code ) {
		
		if ($the_coupon = jigoshop_coupons::get_coupon($coupon_code)) :
	
			if (jigoshop_cart::has_discount($coupon_code)) :
				jigoshop::add_error( __('Discount code already applied!', 'jigoshop') );
				return false;
			endif;	
			
			if ($the_coupon['individual_use']=='yes') :
				self::$applied_coupons = array();
			endif;
			
			foreach (self::$applied_coupons as $coupon) :
				$coupon = jigoshop_coupons::get_coupon($coupon);
				if ($coupon['individual_use']=='yes') :
					self::$applied_coupons = array();
				endif;
			endforeach;
			
			self::$applied_coupons[] = $coupon_code;
			self::set_session();
			jigoshop::add_message( __('Discount code applied successfully.', 'jigoshop') );
			return true;
		
		else :
			jigoshop::add_error( __('Coupon does not exist!', 'jigoshop') );
			return false;
		endif;
		return false;
		
	}
	
	/** returns whether or not a discount has been applied */
	function has_discount( $code ) {
		if (in_array($code, self::$applied_coupons)) return true;
		return false;
	}
	
	/** gets the total discount amount */
	function get_total_discount() {
		if (self::$discount_total) return jigoshop_price(self::$discount_total); else return false;
	}
	
	/** clears the cart/coupon data and re-calcs totals */
	function clear_cache() {
		self::$cart_contents = array();
		self::$applied_coupons = array();
		unset( $_SESSION['cart'] );
		unset( $_SESSION['coupons'] );
		self::calculate_totals();
	}
	
}