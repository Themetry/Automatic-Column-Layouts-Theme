<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 * @package Automatic_Column_Layouts
 *
 */

function automatic_column_layouts_body_classes( $classes ) {
	// Adds a class of no-sidebar if the sidebar-1 widget area is not active.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'automatic_column_layouts_body_classes' );
