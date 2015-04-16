<?php

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('Jigoshop_Report_Stock')) {
	require_once('stock.class.php');
}

class Jigoshop_Report_Most_Stocked extends Jigoshop_Report_Stock
{
	/**
	 * Get Products matching stock criteria
	 */
	public function get_items($current_page, $per_page)
	{
		global $wpdb;

		$this->max_items = 0;
		$this->items = array();

		$options = Jigoshop_Base::get_options();
		$stock = absint(max($options->get('jigoshop_notify_low_stock_amount'), 0));

		$query_from = "FROM {$wpdb->posts} as posts
			INNER JOIN {$wpdb->postmeta} AS postmeta ON posts.ID = postmeta.post_id
			INNER JOIN {$wpdb->postmeta} AS postmeta2 ON posts.ID = postmeta2.post_id
			WHERE 1=1
			AND posts.post_type IN ( 'product', 'product_variation' )
			AND posts.post_status = 'publish'
			AND ((posts.post_type = 'product' AND postmeta2.meta_key = 'manage_stock' AND postmeta2.meta_value = '1') OR (posts.post_type = 'product_variation'))
			AND postmeta.meta_key = 'stock' AND CAST(postmeta.meta_value AS SIGNED) > '{$stock}'
		";

		$query_from = apply_filters('jigoshop_report_most_stocked_query_from', $query_from);

		$this->items = $wpdb->get_results($wpdb->prepare("SELECT posts.ID as id, posts.post_parent as parent {$query_from} GROUP BY posts.ID ORDER BY CAST(postmeta.meta_value AS SIGNED) DESC LIMIT %d, %d;", ($current_page - 1) * $per_page, $per_page));
		$this->max_items = $wpdb->get_var("SELECT COUNT( DISTINCT posts.ID ) {$query_from};");
	}
}
