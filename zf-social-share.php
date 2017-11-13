<?php
/*
* Plugin Name: ZF Social Share Links
* Description: Twitter, Facebook, LinkedIn and Pinterest social share links. Use with zfss_social_share(); inside template file.
* Version: 1.2
* Author: Zeeland Family
* License: GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: zf-social-share
*
*/


/**
 * Block direct access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Customizer settings.
 */
require_once( plugin_dir_path( __FILE__ ) . 'zf-social-share-customizer.php' );


/**
 * Load styles.
 */
function zfss_share_styles() {

	wp_enqueue_style( 'zf-share-css', plugins_url( '/assets/styles/css/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'zfss_share_styles' );


/**
 * pinit.js for Pinterest.
 */
function zfss_pinterest_js() {

	wp_enqueue_script( 'zf-share-pinterest-js', '//assets.pinterest.com/js/pinit.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'zfss_pinterest_js' );


/**
 * Add SVG definitions to the footer (code from Twenty Seventeen theme).
 */
function zfss_share_svg_icons() {

	// Define SVG sprite file.
	$svg_icons = plugin_dir_path( __FILE__ ) . '/assets/img/svg-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'zfss_share_svg_icons', 9999 );


/**
 * Return SVG markup (code from Twenty Seventeen theme).
 *
 */
function zfss_share_get_svg( $args = array() ) {

	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'zf-social-share' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'zf-social-share' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	// Display the icon.
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}


/*
* Output (based on https://10up.github.io/wp-component-library/component/social-links/index.html).
*/
function zfss_social_share() {

	include( plugin_dir_path( __FILE__ ) . 'zf-social-share-template.php' );

}
