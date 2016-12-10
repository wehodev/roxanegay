<?php
/**
 * Custom Menu Fields
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Add custom menu fields to menu
add_filter( 'wp_setup_nav_menu_item', 'adamas_add_custom_nav_fields' );

// Save menu custom fields
add_action( 'wp_update_nav_menu_item', 'adamas_update_custom_nav_fields', 10, 3 );

// Edit menu walker
add_filter( 'wp_edit_nav_menu_walker', 'adamas_edit_walker', 10, 2 );

function adamas_add_custom_nav_fields( $menu_item ) {
	$menu_item->megamenu  = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
	$menu_item->menutitle = get_post_meta( $menu_item->ID, '_menu_item_menutitle', true );
	return $menu_item;
}

/**
 * Save menu custom fields
 * 
 * @since 1.0
 */
function adamas_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
		
	$check = array( 'megamenu', 'menutitle' );
			
	foreach ( $check as $key ) {

		if ( !isset( $_POST['menu-item-'.$key][$menu_item_db_id] ) ) {
			$_POST['menu-item-'.$key][$menu_item_db_id] = '';
		}
		
		$value = $_POST['menu-item-'.$key][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_'.$key, $value );

	}

}

/**
 * Define new Walker edit
 *
 * @since 1.0
 */
function adamas_edit_walker($walker,$menu_id) {
	return 'Walker_Nav_Menu_Edit_Custom';	
}

/**
 * Include custom walker class
 *
 * @since 1.0
 */
require_once ADAMAS_FRAMEWORK_DIR . '/classes/menu/custom_walker.php';

/**
 * Custom WP_NAV_MENU function
 *
 * @since 1.0
 */
class AdamasWalkerMenu extends Walker_Nav_Menu {
	
	/**
	 * Add classes to ul sub-menus
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		$id_field = $this->db_fields['id'];

		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = !empty( $children_elements[$element->$id_field] );
		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * Add main/sub classes to li's and links
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		if ( '' != $item->megamenu ) {
			$item_mega_menu = ' mega-menu';
		} else {
			$item_mega_menu = ' no-mega-menu';
		}
		
		if ( '' != $item->menutitle ) {
			$item_menu_title = ' menu-title';
		} else {
			$item_menu_title = '';
		}

		$active = $current = '';
		
		// Depth dependent classes
		/*if ( ( ( $item->current && $depth == 0 ) ||  ( $item->current_item_ancestor && $depth == 0 ) ) ) {
			$active  = 'active';
			$current = ' class="current"';
		}*/

		// Depth dependent classes
		$el_class = '';
		if ( 0 == $depth ) {
			$el_class = ' class="menu-link"';
		} else {
			$el_class = ' class="menu-link-' . $depth . '"';
		}
	
		// Assed classes
		$classes     = empty( $item->classes ) ? array() : ( array ) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		
		// Build html
		$output .= $indent . '<li id="menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $item_mega_menu . $item_menu_title . '">';
		
		// Link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ' href="' . esc_attr( $item->url ) . '"';
		$attributes .= $el_class;

		$item_output = '';

		if ( isset( $args->before ) ) {
			$item_output = $args->before;
		}

		if ( '' == $item->hide ) {
			$item_output .= '<a' . $attributes . '>';
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
			$item_output .= '</a>';
		}
		
		if ( isset( $args->after ) ) {
			$item_output .= $args->after;
		}
		
		// Build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}