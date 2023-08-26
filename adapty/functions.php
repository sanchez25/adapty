<?php

function theme_register_nav_menu() {
	register_nav_menu( 'top', 'Меню в шапке' );
	register_nav_menu( 'footer', 'Меню в подвале' );
}
add_action('after_setup_theme', 'theme_register_nav_menu');

add_theme_support( 'post-thumbnails' );

function delete_intermediate_image_sizes( $sizes ){
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}

add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );

function remove_image_size_attributes( $html ) {
	return str_replace('size-full', '', $html);
}

add_filter( 'the_content', 'remove_image_size_attributes' );

function wpassist_remove_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

/*function my_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'my_init');*/

add_action( 'wp_enqueue_scripts', 'style_theme' );
function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.css' );
}

function wrap_content($content){

	$result = str_replace(
		array( '<h2' ), 
		array( '</section><section class="added-dynamic"><h2' ), 
	
	$content);

	$section__counter = 1;
	$header__counter = 1;

	$result = preg_replace_callback('|<section(.*)>|Uis', function($matches) {

		global $section__counter;
		$section__counter++;

		return '<section class="added-dynamic" id="section__'. $section__counter .'">';
	
	}, $result);

	$content = preg_replace_callback('|<h2(.*)</h2>|Uis', function($matches) use (&$headers) {

		$match = trim(strip_tags($matches[1]));
		$match = strstr($match, '>');
		$match = str_replace('>', '', $match);
		$heading = strtolower($match);
		$heading = str_replace(
			array(' ', ',', '!', '?', ':', '.','&nbsp;','(',')','¿'), 
			array('-', '','','','','','','','',''),
			$heading
		);
		
		$dash = (is_numeric($match[0]) ? '_' : '' );

		return '<h2 id="'.$dash.$heading.'">' . $match . '</h2>';
	
	}, $result);

	$content = str_replace('</section><section class="added-dynamic" id="section__1">', '<section class="added-dynamic" id="section__1">', $content );
	$content .= '<div class="emptiness"></div>';
	$content = str_replace('<div class="emptiness"></div>', '<div class="emptiness"></div></section>', $content );
	$content = str_replace('frameborder="0"', '', $content);
	return $content;

}

add_filter('the_content', 'wrap_content');

function content_banner($atts){

		$atts = shortcode_atts( array(
			'name' => 'Price testing',
			'button' => 'Schedule a demo'
		), $atts );

    	$output = '<div class="banner-block">
					<div class="banner-content">
						<div class="banner-text">
							<span class="banner-title">'.$atts['name'].'</span>
							<h1 class="main-title">'.get_the_title().'</h1>
							<a class="banner-btn" href="#">'.$atts['button'].'</a>
						</div>
						<div class="banner-img">
							<img width="688" height="691" src="/wp-content/uploads/2023/08/paywall-set.webp" alt="paywall set">
						</div>
					</div>
				</div>';

    	return $output;

}
add_shortcode( 'content-banner', 'content_banner' );