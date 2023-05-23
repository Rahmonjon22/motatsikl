<?php

/**
 * Navigationen definieren
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 */
function bars_theme__nav__register_menus() {
	register_nav_menus(
		array(
			'top-menu' => __('Top Menu'),
			'footer-menu' => __('Footer Menu'),
			'footer-menu2' => __('Footer Menu 2'),
			'footer-menu3' => __('Footer Menu 3'),
			'footer-menu4' => __('Footer Menu 4'),
			'footer-menu5' => __('Footer Menu 5'),
			'meta-menu' => __('Meta Menu'),
		)
	);
}

add_action('init', 'bars_theme__nav__register_menus');


/**
 * Bereinigt die Navigation von unnoetigen Klassen und fuegt Bootstrap Kompatibilitaet hinzu
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 *
 * @param $var
 * @param $menu_item
 * @return array
 */

function bars_theme__nav__clean_up_nav($var, $menu_item) {

	$classes = $var;

	global $post;


	// Entferne alle Klassen bis auf 'current-menu-item'
	if (is_array($var)):
		$classes = array_intersect($var, array('current-menu-item', 'current-menu-parent'));

		// menu-item
		// menu-item-type-post_type
		// menu-item-object-page
		// current-page-ancestor
		// current-menu-ancestor
		// current-menu-parent
		// current-page-parent
		// current_page_parent
		// current_page_ancestor
		// menu-item-has-children
		// menu-item-204

	endif;

	// Fuege die Klasse 'active' hinzu um Bootstrap Kompatibel zu sein
	if (in_array('current-menu-item', $var) ||
		in_array('current-menu-parent', $var) ||
		in_array('current-menu-ancestor', $var)):
		array_push($classes, 'active');
	endif;

	// Fuege die Klasse 'active' hinzu um Bootstrap Kompatibel zu sein
	if (in_array('menu-item-has-children', $var)):
		array_push($classes, 'megamenu-parent megamenu-fullsize d-flex'); //dropdown
	endif;

	// Setzt den Navigationpunkt im Single korrekt
	if (!empty($post)):
		if (is_tax()) {
			$permalink = get_term_link(get_query_var('term'), get_query_var('taxonomy'));
		} elseif (is_post_type_archive()) {
			$permalink = get_post_type_archive_link($post->post_type);
		} else {
			$permalink = get_permalink();
		}
		//if ($menu_item->url == $permalink):
		if ($menu_item->url == get_post_type_archive_link($post->post_type)):
			array_push($classes, 'current-menu-item active');
		endif;
	endif;

	// Gib die Werte aus
	return $classes;
}

add_filter('nav_menu_css_class', 'bars_theme__nav__clean_up_nav', 100, 2);


/**
 * Fuegt jeder Navigation eine ID hinzu.
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 *
 * @param $id
 * @param $item
 * @return string
 */

function bars_theme__nav__id($id, $item) {
	return 'nav-' . bars_theme__nav__slug($item->title);
}

add_filter('nav_menu_item_id', 'bars_theme__nav__id', 10, 2);


/**
 * Gibt einen vereinfachten Slug zurueck
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 *
 * @param $val
 * @return mixed|string
 */

function bars_theme__nav__slug($val) {
	$val = preg_replace('/[^a-zA-Z0-9s]/', '', $val);
	$val = str_replace(' ', '-', $val);
	$val = strtolower($val);

	return $val;
}


/**
 * Biegt die Sub Navigations Klasse um, damit diese Bootstrap kompatibel ist
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 *
 * Class WPDocs_Walker_Nav_Menu
 */
class bars_theme__walker__sub_nav extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * Adds classes to the unordered list sub-menus.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of arguments. @see wp_nav_menu()
	 */

	private $parent;
	private $showParentMenuItem;
	function start_lvl(&$output, $depth = 0, $args = array()) {
		// Depth-dependent classes.
		$display_depth = ($depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'submenu-lvl-' . $display_depth
		);
		$class_names = implode( ' ', $classes );
		//$class_names = '';

		//$this->showParentMenuItem = false;

		// Build HTML for output.
		if (isset($args->megamenu) && $args->megamenu) {

			if($display_depth < 2 ) {
				$output .= '<div class="megamenu js--w-100vw m-x-auto ' . $class_names . '">';
				$output .= '	<div class="megamenu-in">';
				$output .= '		<div class="container">';
				$output .= '			<div class="row">';

				if($this->parent->hasHighlight) {
					$output .=  '<div class="g-9">';
					$output .=  '	<div class="row">';
					//$output .=  '</div>';
				}
				$menuDescriptionShow = get_field('a_menu-description-show',$this->parent->object_id);
				if($menuDescriptionShow) {
					$this->showParentMenuItem = TRUE;
					$parentUrl = (! empty( $this->parent->url ) ? $this->parent->url : "");
					$menuDescription = get_field('a_menu-description',$this->parent->object_id);
					$output .= "<div class='".($this->parent->hasHighlight ? 'g-4':'g-3')." d-flex flex-column megamenu-column megamenu-column--heading'>";
					$output .="<a href='".$parentUrl."'>".$this->parent->title."</a>";
					$output .= $menuDescription;
					$menuLink = get_field('a_menu-link',$this->parent->object_id);
					if($menuLink) {
						$output .="<a href='".$menuLink["url"]."'>".$menuLink["title"]."</a>";
					}
					$output .= "</div>";
					$output .= "<div class=\"".($this->parent->hasHighlight ? 'g-8':'g-9')." p-x-0\">";
				}

			}

			if($display_depth > 1) {
				$output .= '<ul class="megamenu-content">';
			}
		}else{
			$output .= '<ul class="' . $class_names . '">';
		}
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$display_depth = ($depth + 1); // because it counts the first submenu as 0
		if (isset($args->megamenu) && $args->megamenu) {

			if($display_depth > 1) {
				$output .= '</ul>';
			}

			if($display_depth < 2 ) {
				$menuDescriptionShow = get_field('a_menu-description-show',$this->parent->object_id);
				if($menuDescriptionShow) {
					$this->showParentMenuItem = FALSE;
					$output .= '</div>';
				}

				if($this->parent->hasHighlight) {
					$output .= '	</div>';
					$output .= '</div>';
					$highlightEle = $this->parent->highlightItem["element"];
					$output .= '<div class="g-3 m-l-auto">';
					$output .= '	<div class="menu-highlight">';
					$output .= '	    <a href="'.$highlightEle->url.'"  '.($highlightEle->target ? 'target="'.$highlightEle->target.'"':'').' '.($highlightEle->attr_title?'title="'.$highlightEle->attr_title.'"':'').' '.($highlightEle->current?'class="active':'').' ">';
					$output .= getDefaultImageStr($this->parent->highlightItem["img"]);
					$output .= '			<span class="menu-highlight-title">'.$highlightEle->title.'</span>';
					$output .= '		</a>';
					$output .= '	</div>';
					$output .= '</div>';
				}

				$output .= '			</div>';
				$output .= '		</div>';
				$output .= '	</div>';
				$output .= '</div>';
			}
		}
	}

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}

		$id_field = $this->db_fields['id'];
		$id       = $element->$id_field;

		// Display this element.
		$this->has_children = ! empty( $children_elements[ $id ] );
		if ( isset( $args[0] ) && is_array( $args[0] ) ) {
			$args[0]['has_children'] = $this->has_children; // Back-compat.
		}
		if($depth == 0) {
			$this->parent = $element;
			$hasHighlight = FALSE;
			foreach ($children_elements as $children_element) {
				foreach($children_element as $item) {
					if($item->menu_item_parent == $element->ID && get_field('a-highlight', $item->ID)) {
						$hasHighlight = TRUE;
						break;
					}
				}
			}
			$this->parent->hasHighlight = $hasHighlight;
		}
		$isHighLight = $depth == 1 && get_field('a-highlight',$element->ID);
		if($depth == 1 && !$isHighLight) {
			$output .= "<div class='".($this->showParentMenuItem? ($this->parent->hasHighlight?'g-6':'g-4'): ($this->parent->hasHighlight ? 'g-4' : 'g-3'))." d-flex flex-column megamenu-column ".(in_array('menu-item-has-children', $element->classes)?'megamenu-column--has-children':'')."'>";
			$output .=  "<div>";
		}
		if($isHighLight) {
			$this->parent->highlightItem = array(
				"element"=>$element,
				"img"=>get_field('a-highlight-img', $element->ID)
			);
		}
		else {
			$this->start_el( $output, $element, $depth, ...array_values( $args ) );

			// Descend only when the depth is right and there are children for this element.
			if ( ( 0 == $max_depth || $max_depth > $depth + 1 ) && isset( $children_elements[ $id ] ) ) {

				foreach ( $children_elements[ $id ] as $child ) {

					if ( ! isset( $newlevel ) ) {
						$newlevel = true;
						// Start the child delimiter.
						$this->start_lvl( $output, $depth, ...array_values( $args ) );
					}
					$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
				}
				unset( $children_elements[ $id ] );
			}

			if ( isset( $newlevel ) && $newlevel ) {
				// End the child delimiter.
				$this->end_lvl( $output, $depth, ...array_values( $args ) );
			}

			// End this element.
			$this->end_el( $output, $element, $depth, ...array_values( $args ) );
			if($depth == 1) {
				$output .= "	</div>";
				$output .= "</div>";
			}
		}
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		if($depth !== 1) {
			$output .= '<li' . $id . $class_names . '>';
		}

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['class'] = ($item->current ? 'active' : '').(get_field('a-is-column', $item->ID) ? ' link-column':'');


		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );


		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}


	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if($depth !== 1) {
			$output .= "</li>";
		}
	}

}


add_filter('nav_menu_link_attributes', 'add_class_to_items_link', 10, 3);

function add_class_to_items_link($atts, $item, $args) {
	// check if the item has children
	if ($args->theme_location === 'footer-menu') {
		$atts['class'] = 'link link--inverse';
	}

	return $atts;
}


function pd__showMenu($name,$options=array()){
	if (has_nav_menu($name)) {
		wp_nav_menu(array(
			'theme_location' => $name,
			'container' => '',
			'container_class' => '',
			'container_id' => '',
			'menu_id' => uniqid($name),
			'menu_class' => isset($options['menu_class']) ? $options['menu_class'] : 'list-unstyled m-t-half',
			'depth' => isset($options['depth']) ? $options['depth'] : 0
		));
	}
}
