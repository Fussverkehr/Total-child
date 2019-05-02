<?php
/**
 * Header Logo Inner
 *
 * This file displays the image logo or standard text logo
 *
 * @package Total WordPress Theme
 * @subpackage Partials
 * @version 4.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define variables
if (ICL_LANGUAGE_CODE == 'fr') {
$logo_url   = 'https://mobilitepietonne.ch/nos-themes/securite-routiere/chemin-de-lecole/';
} elseif (ICL_LANGUAGE_CODE == 'it') {
$logo_url   = 'https://mobilitapedonale.ch/news-it/in-sicurezza-a-scuola-una-nuova-guida-per-i-genitori/';
} else {
$logo_url   = 'https://fussverkehr.ch/unsere-themen/verkehrssicherheit/schulwege/';
}

$logo_img   = wpex_header_logo_img();
$logo_icon  = wpex_header_logo_icon();
$logo_title = wpex_header_logo_title();

// Overlay Header logo (make sure overlay header is enabled first)
$overlay_logo = wpex_has_overlay_header() ? wpex_overlay_header_logo_img() : '';

// Define output
$output = '';

// Display image logo
if ( $logo_img || $overlay_logo ) {

	// Logo img attributes
	$img_attrs = apply_filters( 'wpex_header_logo_img_attrs', array(
		'src'            => esc_url( $logo_img ),
		'alt'            => esc_attr( $logo_title ),
		'class'          => 'logo-img',
		'data-no-retina' => 'data-no-retina',
		'width'          => intval( wpex_header_logo_img_width() ),
		'height'         => intval( wpex_header_logo_img_height() ),
	) );

	// Custom site-wide image logo
	if ( $logo_img && ! $overlay_logo ) {

		$output .= '<a href="' . esc_url( $logo_url ) . '" target="_blank" rel="home" class="main-logo">';

			$output .= '<img ' . wpex_parse_attrs( $img_attrs ) . ' />';

		$output .= '</a>';

	}

	// Custom header-overlay logo => Must be added on it's own HTML. IMPORTANT!
	if ( $overlay_logo ) {

		$img_attrs['src'] = esc_url( $overlay_logo );

		$output .= '<a href="' . esc_url( $logo_url ) . '" target="_blank" rel="home" class="overlay-header-logo">';

			$output .= '<img ' . wpex_parse_attrs( $img_attrs ) . ' />';

		$output .= '</a>';

	}

}

// Display text logo
else {

	$output .= '<a href="' . esc_url( $logo_url ) . '" target="_blank" rel="home" class="site-logo-text">';

		$output .= $logo_icon . esc_html( $logo_title );

	$output .= '</a>';

}

// Echo logo output
echo apply_filters( 'wpex_header_logo_output', $output );