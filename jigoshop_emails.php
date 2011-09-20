<?php
/**
 * Jigoshop Emails
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package    Jigoshop
 * @category   Core
 * @author     Jigowatt
 * @copyright  Copyright (c) 2011 Jigowatt Ltd.
 * @license    http://jigoshop.com/license/commercial-edition
 */
 
/**
 * Hooks for emails
 **/
add_action('jigoshop_low_stock_notification', 'jigoshop_low_stock_notification');
add_action('jigoshop_no_stock_notification', 'jigoshop_no_stock_notification');
add_action('jigoshop_product_on_backorder_notification', 'jigoshop_product_on_backorder_notification', 1, 3);


/**
 * New order notification email template
 **/
add_action('order_status_pending_to_processing', 'jigoshop_new_order_notification');
add_action('order_status_pending_to_completed', 'jigoshop_new_order_notification');
add_action('order_status_pending_to_on-hold', 'jigoshop_new_order_notification');

function jigoshop_new_order_notification( $order_id ) {

	$order = &new jigoshop_order( $order_id );

	$subject = sprintf(__('[%s] New Customer Order (# %s)','jigoshop'), get_bloginfo('name'), $order->id);

	$message = __("You have received an order from ",'jigoshop') . $order->billing_first_name . ' ' . $order->billing_last_name . __(". Their order is as follows:",'jigoshop') . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('ORDER #: ','jigoshop') . $order->id . '' . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message 	.= $order->email_order_items_list( false, true );  // no download links, show SKU

	if ($order->customer_note) :
		$message .= PHP_EOL . __('Note:','jigoshop') .$order->customer_note . PHP_EOL;
	endif;

	$message .= PHP_EOL . __('Subtotal:','jigoshop') . "\t\t\t" . $order->get_subtotal_to_display() . PHP_EOL;
	if ($order->order_shipping > 0) $message .= __('Shipping:','jigoshop') . "\t\t\t" . $order->get_shipping_to_display() . PHP_EOL;
	if ($order->order_discount > 0) $message .= __('Discount:','jigoshop') . "\t\t\t" . jigoshop_price($order->order_discount) . PHP_EOL;
	if ($order->get_total_tax() > 0) $message .= __('Tax:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->get_total_tax()) . PHP_EOL;
	$message .= __('Total:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->order_total) . ' - via ' . ucwords($order->payment_method) . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('CUSTOMER DETAILS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	if ($order->billing_email) $message .= __('Email:','jigoshop') . "\t\t\t\t" . $order->billing_email . PHP_EOL;
	if ($order->billing_phone) $message .= __('Tel:','jigoshop') . "\t\t\t\t\t" . $order->billing_phone . PHP_EOL;

	$message .= PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('BILLING ADDRESS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message .= $order->billing_first_name . ' ' . $order->billing_last_name . PHP_EOL;
	if ($order->billing_company) $message .= $order->billing_company . PHP_EOL;
	$message .= $order->formatted_billing_address . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('SHIPPING ADDRESS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message .= $order->shipping_first_name . ' ' . $order->shipping_last_name . PHP_EOL;
	if ($order->shipping_company) $message .= $order->shipping_company . PHP_EOL;
	$message .= $order->formatted_shipping_address . PHP_EOL . PHP_EOL;

	$message = html_entity_decode( strip_tags( $message ) );

	wp_mail( get_option('admin_email'), $subject, $message );
}


/**
 * Processing order notification email template
 **/
add_action('order_status_pending_to_processing', 'jigoshop_processing_order_customer_notification');
add_action('order_status_pending_to_on-hold', 'jigoshop_processing_order_customer_notification');

function jigoshop_processing_order_customer_notification( $order_id ) {

	$order = &new jigoshop_order( $order_id );

	$subject = '[' . get_bloginfo('name') . '] ' . __('Order Received','jigoshop');

	$message 	 = __("Thank you, we are now processing your order. Your order's details are below:",'jigoshop') . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message 	.= __('ORDER #: ','jigoshop') . $order->id . '' . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message 	.= $order->email_order_items_list(false, true); // no download links, show SKU

	if ($order->customer_note) :
		$message .= PHP_EOL . __('Note:','jigoshop') .$order->customer_note . PHP_EOL;
	endif;

	$message .= PHP_EOL . __('Subtotal:','jigoshop') . "\t\t\t" . $order->get_subtotal_to_display() . PHP_EOL;
	if ($order->order_shipping > 0) $message .= __('Shipping:','jigoshop') . "\t\t\t" . $order->get_shipping_to_display() . PHP_EOL;
	if ($order->order_discount > 0) $message .= __('Discount:','jigoshop') . "\t\t\t" . jigoshop_price($order->order_discount) . PHP_EOL;
	if ($order->get_total_tax() > 0) $message .= __('Tax:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->get_total_tax()) . PHP_EOL;
	$message .= __('Total:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->order_total) . ' - via ' . ucwords($order->payment_method) . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('CUSTOMER DETAILS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	if ($order->billing_email) $message .= __('Email:','jigoshop') . "\t\t\t\t" . $order->billing_email . PHP_EOL;
	if ($order->billing_phone) $message .= __('Tel:','jigoshop') . "\t\t\t\t\t" . $order->billing_phone . PHP_EOL;

	$message .= PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('BILLING ADDRESS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message .= $order->billing_first_name . ' ' . $order->billing_last_name . PHP_EOL;
	if ($order->billing_company) $message .= $order->billing_company . PHP_EOL;
	$message .= $order->formatted_billing_address . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('SHIPPING ADDRESS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message .= $order->shipping_first_name . ' ' . $order->shipping_last_name . PHP_EOL;
	if ($order->shipping_company) $message .= $order->shipping_company . PHP_EOL;
	$message .= $order->formatted_shipping_address . PHP_EOL . PHP_EOL;

	$message = html_entity_decode( strip_tags( $message ) );

	wp_mail( $order->billing_email, $subject, $message );
}


/**
 * Completed order notification email template - this one includes download links for downloadable products
 **/
add_action('order_status_completed', 'jigoshop_completed_order_customer_notification');

function jigoshop_completed_order_customer_notification( $order_id ) {

	$order = &new jigoshop_order( $order_id );

	$subject = '[' . get_bloginfo('name') . '] ' . __('Order Complete','jigoshop');

	$message 	 = __("Your order is complete. Your order's details are below:",'jigoshop') . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message 	.= __('ORDER #: ','jigoshop') . $order->id . '' . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message 	.= $order->email_order_items_list( true, true ); // show download links and SKU

	if ($order->customer_note) :
		$message .= PHP_EOL . __('Note:','jigoshop') .$order->customer_note . PHP_EOL;
	endif;

	$message .= PHP_EOL . __('Subtotal:','jigoshop') . "\t\t\t" . $order->get_subtotal_to_display() . PHP_EOL;
	if ($order->order_shipping > 0) $message .= __('Shipping:','jigoshop') . "\t\t\t" . $order->get_shipping_to_display() . PHP_EOL;
	if ($order->order_discount > 0) $message .= __('Discount:','jigoshop') . "\t\t\t" . jigoshop_price($order->order_discount) . PHP_EOL;
	if ($order->get_total_tax() > 0) $message .= __('Tax:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->get_total_tax()) . PHP_EOL;
	$message .= __('Total:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->order_total) . ' - via ' . ucwords($order->payment_method) . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('CUSTOMER DETAILS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	if ($order->billing_email) $message .= __('Email:','jigoshop') . "\t\t\t\t" . $order->billing_email . PHP_EOL;
	if ($order->billing_phone) $message .= __('Tel:','jigoshop') . "\t\t\t\t\t" . $order->billing_phone . PHP_EOL;

	$message .= PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('BILLING ADDRESS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message .= $order->billing_first_name . ' ' . $order->billing_last_name . PHP_EOL;
	if ($order->billing_company) $message .= $order->billing_company . PHP_EOL;
	$message .= $order->formatted_billing_address . PHP_EOL . PHP_EOL;

	$message 	.= '=====================================================================' . PHP_EOL;
	$message .= __('SHIPPING ADDRESS','jigoshop') . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message .= $order->shipping_first_name . ' ' . $order->shipping_last_name . PHP_EOL;
	if ($order->shipping_company) $message .= $order->shipping_company . PHP_EOL;
	$message .= $order->formatted_shipping_address . PHP_EOL . PHP_EOL;

	$message = html_entity_decode( strip_tags( $message ) );

	wp_mail( $order->billing_email, $subject, $message );
}


/**
 * Pay for order notification email template - this one includes a payment link
 **/
function jigoshop_pay_for_order_customer_notification( $order_id ) {

	$order = &new jigoshop_order( $order_id );

	$subject = '[' . get_bloginfo('name') . '] ' . __('Pay for Order','jigoshop');

	$customer_message = sprintf( __("An order has been created for you on \"%s\". To pay for this order please use the following link: %s",'jigoshop') . PHP_EOL . PHP_EOL, get_bloginfo('name'), $order->get_checkout_payment_url() );

	$message 	 = '=====================================================================' . PHP_EOL;
	$message 	.= __('ORDER #: ','jigoshop') . $order->id . '' . PHP_EOL;
	$message 	.= '=====================================================================' . PHP_EOL;

	$message 	.= $order->email_order_items_list( false, true );  // no download links, show SKU

	if ($order->customer_note) :
		$message .= PHP_EOL . __('Note:','jigoshop') .$order->customer_note . PHP_EOL;
	endif;

	$message .= PHP_EOL . __('Subtotal:','jigoshop') . "\t\t\t" . $order->get_subtotal_to_display() . PHP_EOL;
	if ($order->order_shipping > 0) $message .= __('Shipping:','jigoshop') . "\t\t\t" . $order->get_shipping_to_display() . PHP_EOL;
	if ($order->order_discount > 0) $message .= __('Discount:','jigoshop') . "\t\t\t" . jigoshop_price($order->order_discount) . PHP_EOL;
	if ($order->get_total_tax() > 0) $message .= __('Tax:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->get_total_tax()) . PHP_EOL;
	$message .= __('Total:','jigoshop') . "\t\t\t\t" . jigoshop_price($order->order_total) . ' - via ' . ucwords($order->payment_method) . PHP_EOL . PHP_EOL;

	$customer_message = html_entity_decode( strip_tags( $customer_message.$message ) );

	wp_mail( $order->billing_email, $subject, $customer_message );
}


/**
 * Low stock notification email
 **/
function jigoshop_low_stock_notification( $product ) {
	$_product = &new jigoshop_product($product);
	$subject = '[' . get_bloginfo('name') . '] ' . __('Product low in stock','jigoshop');
	$message = '#' . $_product->id .' '. $_product->get_title() . ' ('. $_product->sku.') ' . __('is low in stock.', 'jigoshop');
	$message = wordwrap( html_entity_decode( strip_tags( $message ) ), 70 );
	wp_mail( get_option('admin_email'), $subject, $message );
}


/**
 * No stock notification email
 **/
function jigoshop_no_stock_notification( $product ) {
	$_product = &new jigoshop_product($product);
	$subject = '[' . get_bloginfo('name') . '] ' . __('Product out of stock','jigoshop');
	$message = '#' . $_product->id .' '. $_product->get_title() . ' ('. $_product->sku.') ' . __('is out of stock.', 'jigoshop');
	$message = wordwrap( html_entity_decode( strip_tags( $message ) ), 70 );
	wp_mail( get_option('admin_email'), $subject, $message );
}


/**
 * Backorder notification emails
 * an email is sent to the admin notifying which product is backordered with an amount needed to fill the order
 * an email -may- be sent to the customer notifying them of the same
 * if sent, an email is sent to the customer for each item backordered in the order
 *
 * @param string $order_id - the System Order number (ID)
 * @param string $product - the Product ID on backorder
 * @param string $amount - the count of the product needed to fill the order
**/
function jigoshop_product_on_backorder_notification( $order_id, $product, $amount ) {
	// notify the admin
	$_product = &new jigoshop_product($product);
	$subject = '[' . get_bloginfo('name') . '] ' . sprintf(__('Product Backorder on Order #%s','jigoshop'), $order_id );
	$message = sprintf( __( "%s units of #%s %s (#%s) are needed to fill Order #%s.", 'jigoshop' ), abs( $amount ), $_product->id, $_product->get_title(), $_product->sku, $order_id );
	$message = wordwrap( html_entity_decode( strip_tags( $message ) ), 70 );
	wp_mail( get_option('admin_email'), $subject, $message );
	
	// notify the customer if required
	if ( $_product->data['backorders']=='notify') :
		$order = &new jigoshop_order( $order_id );
	
		$subject = '[' . get_bloginfo('name') . '] ' . sprintf(__('Product Backorder on Order #%d','jigoshop'), $order_id );
	
		$message 	 = sprintf(__( "Thank you for your Order #%d. Unfortunately, the following item was found to be on backorder.", 'jigoshop' ), $order_id );
		
		$message	.= PHP_EOL . PHP_EOL;
		$message 	.= '=====================================================================' . PHP_EOL;
		$message 	.= __('ORDER #: ','jigoshop') . $order->id . '' . PHP_EOL;
		$message 	.= '=====================================================================' . PHP_EOL;
	
		$message 	.= sprintf( __( "%d units of #%d %s (#%s) have been backordered.", 'jigoshop' ), abs( $amount ), $_product->id, $_product->get_title(), $_product->sku );
	
		$message	.= PHP_EOL . PHP_EOL;
		if ($order->customer_note) :
			$message .= PHP_EOL . __('Note:','jigoshop') .$order->customer_note . PHP_EOL;
		endif;
	
		$message 	.= '=====================================================================' . PHP_EOL;
		$message .= __('CUSTOMER DETAILS','jigoshop') . PHP_EOL;
		$message 	.= '=====================================================================' . PHP_EOL;
	
		if ($order->billing_email) $message .= __('Email:','jigoshop') . "\t\t\t\t" . $order->billing_email . PHP_EOL;
		if ($order->billing_phone) $message .= __('Tel:','jigoshop') . "\t\t\t\t\t" . $order->billing_phone . PHP_EOL;
	
		$message .= PHP_EOL;
	
		$message 	.= '=====================================================================' . PHP_EOL;
		$message .= __('BILLING ADDRESS','jigoshop') . PHP_EOL;
		$message 	.= '=====================================================================' . PHP_EOL;
	
		$message .= $order->billing_first_name . ' ' . $order->billing_last_name . PHP_EOL;
		if ($order->billing_company) $message .= $order->billing_company . PHP_EOL;
		$message .= $order->formatted_billing_address . PHP_EOL . PHP_EOL;
	
		$message 	.= '=====================================================================' . PHP_EOL;
		$message .= __('SHIPPING ADDRESS','jigoshop') . PHP_EOL;
		$message 	.= '=====================================================================' . PHP_EOL;
	
		$message .= $order->shipping_first_name . ' ' . $order->shipping_last_name . PHP_EOL;
		if ($order->shipping_company) $message .= $order->shipping_company . PHP_EOL;
		$message .= $order->formatted_shipping_address . PHP_EOL . PHP_EOL;
	
		$message = html_entity_decode( strip_tags( $message ) );
	
		wp_mail( $order->billing_email, $subject, $message );
	endif;
}