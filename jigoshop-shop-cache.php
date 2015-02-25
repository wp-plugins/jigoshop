<?php
/**
 * Plugin Name:         Jigoshop Shop Cache
 * Plugin URI:          http://www.jigoshop.com/
 * Description:         Extends Jigoshop, adds simple HTML cache for whole shop list contents.
 * Author:              Jigoshop
 * Author URI:          http://www.jigoshop.com
 * Version:             1.0
 * Requires at least:   3.8
 * Tested up to:        4.1
 */

$jigoshopCacheIsProductList = false;
add_action('jigoshop_before_main_content', function() use (&$jigoshopCacheIsProductList){
	$jigoshopCacheIsProductList = is_product_list();
	if (!$jigoshopCacheIsProductList) {
		return;
	}

	ob_start();
	$html = get_transient('jigoshop_loop_cache');
	if ($html === false || is_search()) {
		return;
	}

	/** @var $wp_query \WP_Query */
	global $wp_query;
	$wp_query->post_count = 0;
	$wp_query->is_post_type_archive = false;
	$wp_query->is_page = false;
}, 1);
add_action('jigoshop_after_main_content', function() use ($jigoshopCacheIsProductList){
	if (!$jigoshopCacheIsProductList) {
		return;
	}

	if (is_search()) {
		echo ob_get_clean();
		return;
	}

	$content = ob_get_clean();
	$html = get_transient('jigoshop_loop_cache');

	if ($html === false) {
		set_transient('jigoshop_loop_cache', $content);
		echo $content;
		return;
	}

	echo 'loaded';
	ob_start();
	jigoshop::show_messages();
	$messages = ob_get_clean();

	preg_match('@<div class="(.*?)main-content(.*?)"(.*?)>@', $html, $beginnings);
	$tag = '<div class="'.$beginnings[1].'main-content'.$beginnings[2].'"'.$beginnings[3].'>';
	$html = preg_replace('@_n=.*?"@', '_n='.wp_create_nonce('jigoshop-add_to_cart').'"', $html);
	echo str_replace($tag, $tag.$messages, $html);
}, 1);
add_action('save_post_product', function(){
	delete_transient('jigoshop_loop_cache');
});
